<?php

namespace App\Http\Controllers\certification;

use App\Models\certification\Certif;
use App\Models\certification\PrixCertif;
use App\Models\certification\TypePrix;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrixCertifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $typesprix= PrixCertif::with(['Typeprix'])->get();
    $list_typesprix= TypePrix::all();
    $list_certifs= Certif::all();
    return view('pages.certif.prixCertif',compact('typesprix','list_typesprix','list_certifs'));
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
            $prixcertif = new PrixCertif();
  
            $prixcertif->libelle = $request->libelle;
  
            $prixcertif->certifs_id = $request->certifs_id;
  
            $prixcertif->type_prixes_id = $request->type_prixes_id;
  
            $prixcertif->save();
        return redirect()->route('prixcertif.index');
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

            $prixcertif = PrixCertif::findOrFail($request->id);
      
            $prixcertif->update([
            $prixcertif->libelle = $request->libelle,
            $prixcertif->certifs_id = $request->certifs_id,
            $prixcertif->type_prixes_id = $request->type_prixes_id,
            ]);
            return redirect()->route('prixcertif.index');
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
            $prixcertif = PrixCertif::findOrFail($request->id)->delete();
            return redirect()->route('prixcertif.index');
          }
          catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }
    }
}
