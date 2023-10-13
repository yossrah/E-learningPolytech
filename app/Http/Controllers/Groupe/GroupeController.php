<?php 

namespace App\Http\Controllers\Groupe;
use App\Http\Controllers\Controller;

use App\Models\Filiere;
use App\Models\Niveau;
use App\Models\groupe;
use App\Models\TypeSousGroupe;

use Illuminate\Http\Request;

class GroupeController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {

    $filieres= Filiere::with(['Niveaux'])->get();
    $list_filieres= Filiere::all();
    $list_type_sous_groupes= TypeSousGroupe::all();
    return view('pages.scolarite.groupe.groupe',compact('filieres','list_filieres','list_type_sous_groupes'));
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
      $groupe= groupe::where('filiere_id',$request->filiere_id)->where('niveau_id',$request->niveau_id)->get();
      $groupeCount = $groupe->count();
      $groupeNumber = $groupeCount + 1 ;

      $groupe = new groupe();
      $groupe->libelle = "groupe ".$groupeNumber;
      $groupe->filiere_id = $request->filiere_id;
      $groupe->niveau_id = $request->niveau_id;
      $groupe->save();
      return redirect()->route('groupe.index');
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
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
    Groupe::findOrFail($request->id)->delete();

    return redirect()->route('groupe.index');
  }

  public function getgroupe(Request $request)
  {
    $list_groupe=Groupe::where('id',$request->id_groupe)->get();

    return $list_groupe;
  }
  
}

?>