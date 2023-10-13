<?php

namespace App\Http\Controllers\certification;

use App\Models\certification\SousTypeCertif;
use App\Models\certification\Certif;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CertifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certifs= SousTypeCertif::with(['Certifs'])->get();
        $list_soustypes= SousTypeCertif::all();
        return view('pages.certif.certif',compact('certifs','list_soustypes'));
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
        $certif = new Certif();

        $certif->libelleCertif = $request->libelleCertif;

        $certif->sousTypeCert_id = $request->sousTypeCert_id;

        $certif->save();
    return redirect()->route('certif.index');
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

            $certif = Certif::findOrFail($request->id);
      
            $certif->update([
            $certif->libelleCertif = $request->libelleCertif,
            $certif->sousTypeCert_id = $request->sousTypeCert_id,
            ]);
            return redirect()->route('soustypecertif.index');
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
            $certif = Certif::findOrFail($request->id)->delete();
            return redirect()->route('certif.index');
          }
          catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }
    }
}
