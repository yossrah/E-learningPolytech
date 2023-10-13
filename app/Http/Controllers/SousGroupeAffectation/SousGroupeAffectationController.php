<?php 

namespace App\Http\Controllers\SousGroupeAffectation;
use App\Http\Controllers\Controller;

use App\Models\SousGroupeAffectation;

use Illuminate\Http\Request;

class SousGroupeAffectationController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    
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

        $sousgroupeaffectation = new SousGroupeAffectation();
        $sousgroupeaffectation->sous_groupe_id= $request->sous_groupe_id;
        $sousgroupeaffectation->etudiant_id= $request->etudiant_id  ;
        $sousgroupeaffectation->save();
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

  public function nbEtudiants(Request $request)
  {
    
  }
  
}

?>