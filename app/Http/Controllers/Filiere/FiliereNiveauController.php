<?php 

namespace App\Http\Controllers\Filiere;
use App\Http\Controllers\Controller;

use App\Models\Filiere;
use App\Models\Niveau;

use Illuminate\Http\Request;

class FiliereNiveauController extends Controller 
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
    return view('pages.compus.filiere.filiere-niveau',compact('filieres','list_filieres'));
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
      $filiereniveau = new Niveau();

      $filiereniveau->libelle = $request->libelle;

      $filiereniveau->filiere_id = $request->filiere_id;

      $filiereniveau->save();
  return redirect()->route('filiereniveau.index');
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

      $filiereniveau = Niveau::findOrFail($request->id);

      $filiereniveau->update([
      $filiereniveau->libelle = $request->libelle,
      $filiereniveau->filiere_id = $request->filiere_id,
      ]);
      return redirect()->route('filiereniveau.index');
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
      $filiereniveau = Niveau::findOrFail($request->id)->delete();
      return redirect()->route('filiereniveau.index');
    }
    catch(\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }
  
}

?>