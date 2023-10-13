<?php

namespace App\Http\Controllers\certification;

use App\Models\certification\PrixCertif;
use App\Models\certification\CertifUser;
use App\Models\AnneUniversitaire;
use App\Models\certification\ResponsableCertif;
use App\Models\certification\Certif;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CertifUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certifss= CertifUser::with(['Certif'])->get();
    $list_prix= PrixCertif::all();

    $list_respos= ResponsableCertif::all();
    $list_années= AnneUniversitaire::all();
    return view('pages.certif.certifuUser',compact('certifss','list_prix','list_respos','list_années'));
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
            $certifuser = new CertifUser();
  
            $certifuser->certifs_id = $request->certifs_id;
            $certifuser->prix_certifs = $request->prix_certifs;
            $certifuser->annes_universitaire = $request->annes_universitaire;
            $certifuser->user_id = $request->user_id;
            $certifuser->save();
        return redirect()->route('certifuser.index');
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

            $certifuser = CertifUser::findOrFail($request->id);
      
            $certifuser->update([
            $certifuser->certifs_id = $request->certifs_id,
            $certifuser->prix_certifs = $request->prix_certifs,
            $certifuser->annes_universitaire = $request->annes_universitaire,
            $certifuser->user_id = $request->user_id,
            ]);
            return redirect()->route('certifuser.index');
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
            $certifuser = CertifUser::findOrFail($request->id)->delete();
            return redirect()->route('certifuser.index');
          }
          catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }
    }
}
