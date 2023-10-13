<?php 

namespace App\Http\Controllers\AnneeUniversitaire;
use App\Http\Controllers\Controller;
use App\Models\AnneUniversitaire;

use Illuminate\Http\Request;

class AnneUniversitaireController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $annes_universitaire = AnneUniversitaire::all();
    return view('pages.compus.ecole.annes-universitaire',compact('annes_universitaire'));
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
    try{
      $anneuniversitaire = new AnneUniversitaire();
      $anneuniversitaire->annee_universitaire = $request->annee_universitaire;
      $anneuniversitaire->annee = $request->annee;
      $anneuniversitaire->save();
      return redirect()->route('anneeuniversitaire.index');
    }catch(\Exception $e){
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    };
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
    try{
      $anneuniversitaire = AnneUniversitaire::findOrFail($request->id)->update(['annee_universitaire' => $request->annee_universitaire ,'annee'=> $request->annee]);
      return redirect()->route('anneeuniversitaire.index');
    }catch(\Exception $e){
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    };
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
    try{
      $anneuniversitaire = AnneUniversitaire::findOrFail($request->id)->delete();
      return redirect()->route('anneeuniversitaire.index');
    }catch(\Exception $e){
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    };
  }
  
}

?>