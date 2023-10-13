<?php 

namespace App\Http\Controllers\Cursus;
use App\Http\Controllers\Controller;

use App\Models\PlanEtude;
use App\Models\AnneUniversitaire;
use App\Models\Cursus;

use Illuminate\Http\Request;

class CursusController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $plaetudes= PlanEtude::with(['Cursus'])->get();
    $list_plaetudes= PlanEtude::all();
    $list_annee_universitaires= AnneUniversitaire::all();
    return view('pages.compus.cursus.cursus',compact('plaetudes','list_plaetudes','list_annee_universitaires'));
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
          $cursus = new Cursus();

          $cursus->libelle = $request->libelle;

          $cursus->plan_etude_id = $request->plan_etude_id;

          $cursus->annee_universitaire_id = $request->annee_universitaire_id;

          $cursus->save();
      return redirect()->route('cursus.index');
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

      $cursus = Cursus::findOrFail($request->id);

      $cursus->update([
      $cursus->libelle = $request->libelle,
      $cursus->plan_etude_id = $request->plan_etude_id,
      $cursus->annee_universitaire_id = $request->annee_universitaire_id,
      ]);
      return redirect()->route('cursus.index');
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
      $cursus = Cursus::findOrFail($request->id)->delete();
      return redirect()->route('cursus.index');
    }
    catch(\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }
  
}


?>