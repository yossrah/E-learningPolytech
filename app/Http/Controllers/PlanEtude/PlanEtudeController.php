<?php 

namespace App\Http\Controllers\PlanEtude;
use App\Http\Controllers\Controller;

use App\Models\Departement;
use App\Models\Ecole;
use App\Models\Niveau;
use App\Models\PlanEtude;
use App\Models\Filiere;


use Illuminate\Http\Request;

class PlanEtudeController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $departements= Departement::with(['Planetudes'])->get();
    $list_departements= Departement::all();
    $list_ecoles= Ecole::all();
    $list_filieres_niveaux= Filiere::all();
    return view('pages.examen.plan_etude.plan-etude',compact('departements','list_departements','list_ecoles','list_filieres_niveaux'));
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

      $planetude = new PlanEtude();

      $planetude->libelle = $request->libelle;
      $planetude->date_plan = $request->date_plan;
      $planetude->ecole_id = $request->ecole_id;
      $planetude->departement_id = $request->departement_id;
      $planetude->filiere_id = $request->filiere_id;
      $planetude->niveau_id = $request->niveau_id;
      $planetude->save();

      return redirect()->route('planetude.index');
  }

  catch (\Exception $e){
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
   
      $planetude = PlanEtude::findOrFail($request->id);

      $planetude->libelle = $request->libelle;
      $planetude->date_plan = $request->date_plan;
      $planetude->ecole_id = $request->ecole_id;
      $planetude->departement_id = $request->departement_id;
      $planetude->filiere_id = $request->filiere_id;
      $planetude->niveau_id = $request->niveau_id;

      $planetude->save();

      return redirect()->route('planetude.index');
  }
  catch
  (\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(request $request)
  {

    PlanEtude::findOrFail($request->id)->delete();

    return redirect()->route('planetude.index');

  }
  public function getniveau($id)
  {
      $lists_nivaux = Niveau::where("filiere_id", $id)->pluck("libelle", "id");

      return $lists_nivaux;
  }
  
}

?>