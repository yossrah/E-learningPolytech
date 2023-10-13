<?php 

namespace App\Http\Controllers\SousGroupe;
use App\Http\Controllers\Controller;

use App\Models\Filiere;
use App\Models\Niveau;
use App\Models\Classe;
use App\Models\Groupe;
use App\Models\SousGroupe;
use App\Models\TypeSousGroupe;
use App\Models\SousGroupeAffectation;

use Illuminate\Http\Request;

class SousGroupeController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(Request $request)
  {
    /**
    $typesousgroupes= TypeSousGroupe::with(['SousGroupes'])->whereIn('id', [1,2])->get();
    $groupe= SousGroupe::where('groupe_id',$request->groupe_id)->pluck('libelle');
    $groupe_id = $request->groupe_id;
    $niveaux= Niveau::Niveau
    $list_groupes= Groupe::with(['Etudiants'])->where('id',$request->groupe_id)->get();
    $list_sousgroupeaffectations = SousGroupe::with(['SousGroupesAffectation'])->get(); 
    */
    $list_sousgroupes= SousGroupe::where('niveau_id',$request->niveau_id)->get();
    return view('pages.scolarite.groupe.groupee',compact('list_sousgroupes'));
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
      for ($i=1; $i <= $request->type_sous_groupe ; $i++) { 
        $sousgroupe = new SousGroupe();

        $remove_on = str_replace("on", "",$request->list_groupes_ajouter);
        $groupe = str_replace(",", "",$remove_on);

        $sousgroupe->libelle = $request->type_sous_groupe."G".$groupe.".".$i;
        $sousgroupe->list_groupe = $groupe;
        $sousgroupe->niveau_id = $request->niveau_id;
        $sousgroupe->type_sous_groupe_id =$request->type_sous_groupe;

        $sousgroupe->save();
      };
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
  public function destroy($id)
  {
    
  }
  public function getclass($filiere_id,$niveau_id)
  {
      $lists_class = Classe::where("filiere_id", $filiere_id)->where("niveau_id", $niveau_id)->pluck("libelle", "id");

      return $lists_class;
  }
  public function getgroupe($class_id)
  {
      $lists_groupe = Groupe::where("class_id", $class_id)->pluck("libelle", "id");

      return $lists_groupe;
  }
  
}

?>