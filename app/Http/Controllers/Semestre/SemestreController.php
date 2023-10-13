<?php 

namespace App\Http\Controllers\Semestre;
use App\Http\Controllers\Controller;

use App\Models\Semestre;

use Illuminate\Http\Request;

class SemestreController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $semestres = Semestre::all();
    return view('pages.examen.plan_etude.semestre',compact('semestres'));
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
      $semestre = new Semestre();
      $semestre->libelle = $request->libelle;
      $semestre->save();
      return redirect()->route('semestre.index');
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
      $semestre = Semestre::findOrFail($request->id)->update(['libelle' => $request->libelle]);
      return redirect()->route('semestre.index');
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
      $semestre = Semestre::findOrFail($request->id)->delete();
      return redirect()->route('semestre.index');
    }catch(\Exception $e){
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    };
  }
  
}

?>