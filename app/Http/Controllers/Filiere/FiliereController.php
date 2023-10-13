<?php 

namespace App\Http\Controllers\Filiere;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\TypeFiliere;
use App\Models\Departement;
use App\Models\Filiere;

class FiliereController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $typefilieres= TypeFiliere::with(['Filieres'])->get();
    $list_typefilieres= TypeFiliere::all();
    $list_departements= Departement::all();

    return view('pages.compus.filiere.filiere',compact('typefilieres','list_departements','list_typefilieres'));
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
      $filiere = new Filiere();

      $filiere->libelle = $request->libelle;

      $filiere->type_filiere_id = $request->type_filiere_id;

      $filiere->departement_id = $request->departement_id;

      $filiere->save();
  return redirect()->route('filiere.index');
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

      $filiere = Filiere::findOrFail($request->id);

      $filiere->update([
      $filiere->libelle = $request->libelle,
      $filiere->type_filiere_id = $request->type_filiere_id,
      $filiere->departement_id = $request->departement_id,
      ]);
      return redirect()->route('filiere.index');
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
      $filiere = Filiere::findOrFail($request->id)->delete();
      return redirect()->route('filiere.index');
    }
    catch(\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }
  
}

?>