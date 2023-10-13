<?php 

namespace App\Http\Controllers\Filiere;
use App\Http\Controllers\Controller;

use App\Models\TypeFiliere;

use Illuminate\Http\Request;

class TypeFiliereController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $type_filieres= TypeFiliere::all();
    return view('pages.compus.filiere.type-filiere',compact('type_filieres'));
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
      $typefiliere = new TypeFiliere();

      $typefiliere->libelle = $request->libelle;

      $typefiliere->save();
  return redirect()->route('typefiliere.index');
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

      $typefiliere = TypeFiliere::findOrFail($request->id);

      $typefiliere->update([
      $typefiliere->libelle = $request->libelle,
      ]);
      return redirect()->route('typefiliere.index');
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
      $typefiliere = TypeFiliere::findOrFail($request->id)->delete();
      return redirect()->route('typefiliere.index');
    }
    catch(\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }
  
}

?>