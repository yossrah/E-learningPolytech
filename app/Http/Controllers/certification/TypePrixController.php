<?php

namespace App\Http\Controllers\certification;
use App\Models\certification\TypePrix;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypePrixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeprix= TypePrix::all();
        return view('pages.certif.typeprix',compact('typeprix'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $type_prix = new \App\Models\certification\TypePrix();
            $type_prix ->libelle = $request->libelle;
        
            
      
            $type_prix->save();
        return redirect()->route('typeprix.index');
          } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $type_prix = TypePrix::findOrFail($request->id);
      
            $type_prix->update([
            $type_prix->libelle = $request->libelle,
            ]);
            return redirect()->route('typeprix.index');
              }
          catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
              }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $type_prix = TypePrix::findOrFail($request->id)->delete();
            return redirect()->route('typeprix.index');
          }
          catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }
    }
}
