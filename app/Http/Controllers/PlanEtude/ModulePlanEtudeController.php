<?php 

namespace App\Http\Controllers\PlanEtude;
use App\Http\Controllers\Controller;

use App\Models\PlanEtude;
use App\Models\ModulePlanEtude;

use Illuminate\Http\Request;

class ModulePlanEtudeController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $planetudes= PlanEtude::with(['ModulesPlanEtudes'])->get();
    $list_planetudes= PlanEtude::all();
    return view('pages.examen.plan_etude.module-plan-etude',compact('planetudes','list_planetudes'));
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
      $moduleplanetude = new ModulePlanEtude();

      $moduleplanetude->libelle = $request->libelle;

      $moduleplanetude->coefficient = $request->coefficient;
      
      $moduleplanetude->plan_etude_id = $request->plan_etude_id;

      $moduleplanetude->save();
  return redirect()->route('moduleplanetude.index');
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

      $moduleplanetude = ModulePlanEtude::findOrFail($request->id);

      $moduleplanetude->update([
      $moduleplanetude->libelle = $request->libelle,
      $moduleplanetude->plan_etude_id  = $request->plan_etude_id ,
      $moduleplanetude->plan_etude_id = $request->plan_etude_id,
      ]);
      return redirect()->route('moduleplanetude.index');
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
      $moduleplanetude = ModulePlanEtude::findOrFail($request->id)->delete();
      return redirect()->route('moduleplanetude.index');
    }
    catch(\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }
  
}

?>