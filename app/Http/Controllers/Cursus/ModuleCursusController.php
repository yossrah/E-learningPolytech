<?php 

namespace App\Http\Controllers\Cursus;
use App\Http\Controllers\Controller;

use App\Models\ModulePlanEtude;
use App\Models\Cursus;
use App\Models\Semestre;
use App\Models\ModuleCursus;

use Illuminate\Http\Request;

class ModuleCursusController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $moduleplanetudes= ModulePlanEtude::with(['ModuleCursus'])->get();
    $list_moduleplanetudes= ModulePlanEtude::all();
    $list_cursus= Cursus::all();
    $list_semestres= Semestre::all();
    return view('pages.compus.cursus.module-cursus',compact('moduleplanetudes','list_moduleplanetudes','list_cursus','list_semestres'));
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    try {
      $modulecursus = new ModuleCursus();

      $modulecursus->cursus_id = $request->cursus_id;

      $modulecursus->module_plan_etude_id = $request->module_plan_etude_id;

      $modulecursus->semestre_id = $request->semestre_id;

      $modulecursus->commentaire = $request->commentaire;

      $modulecursus->save();
  return redirect()->route('modulecursus.index');
    } catch (\Exception $e) {
  return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request)
  {
    try {

      $modulecursus = ModuleCursus::findOrFail($request->id);

      $modulecursus->update([
      $modulecursus->cursus_id = $request->cursus_id,
      $modulecursus->module_plan_etude_id = $request->module_plan_etude_id,
      $modulecursus->semestre_id = $request->semestre_id,
      $modulecursus->commentaire = $request->commentaire,
      ]);
      return redirect()->route('modulecursus.index');
        }
    catch(\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
    try {
      $modulecursus = ModuleCursus::findOrFail($request->id)->delete();
      return redirect()->route('modulecursus.index');
    }
    catch(\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }
  
}

?>