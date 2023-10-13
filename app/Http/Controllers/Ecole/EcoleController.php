<?php 

namespace App\Http\Controllers\Ecole;
use App\Http\Controllers\Controller;

use App\Models\Ecole;

use Illuminate\Http\Request;

class EcoleController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $ecoles = Ecole::all();
    return view('pages.compus.ecole.ecole',compact('ecoles'));
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
      $ecole = new Ecole();
      $ecole->libelle = $request->libelle;
      $ecole->save();
      return redirect()->route('ecole.index');
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
      $ecole = Ecole::findOrFail($request->id)->update(['libelle' => $request->libelle]);
      return redirect()->route('ecole.index');
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
      $ecole = Ecole::findOrFail($request->id)->delete();
      return redirect()->route('ecole.index');
    }catch(\Exception $e){
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    };
  }
  
}

?>