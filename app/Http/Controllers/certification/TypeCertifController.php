<?php

namespace App\Http\Controllers\certification;
use App\Models\certification\TypeCertif;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeCertifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $typecertifs= TypeCertif::all();
        return view('pages.certif.typeCertif',compact('typecertifs'));
        //
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
            $type_certif = new \App\Models\certification\TypeCertif();
            $type_certif->gratuite = $request->gratuite;
            $type_certif->libelle = $request->libelle;
        
            
      
            $type_certif->save();
        return redirect()->route('typecertif.index');
          } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }
    }

    /**
     * Display the specified resource.
     *@param App\Models\certification\TypeCertif  $Typecertif //create a new model instance
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Typecertif $Typecertif )
    {
        return view('pages.certif.show', compact('Typecertif'));
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

            $type_certif = TypeCertif::findOrFail($request->id);
      
            $type_certif->update([
            $type_certif->libelle = $request->libelle,
            $type_certif->gratuite = $request->gratuite,
            ]);
            return redirect()->route('typecertif.index');
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
            $type_certif = TypeCertif::findOrFail($request->id)->delete();
            return redirect()->route('typecertif.index');
          }
          catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }
    }
}
