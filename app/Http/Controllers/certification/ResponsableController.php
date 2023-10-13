<?php

namespace App\Http\Controllers\certification;

use App\Models\certification\Certif;
use App\Models\certification\ResponsableCertif;
use App\Models\UserPublic;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $responsables= ResponsableCertif::with(['Users'])->get();
    $list_certifs= Certif::all();
    $list_respos= UserPublic::all();
    
    return view('pages.certif.responsable',compact('responsables','list_certifs','list_respos'));
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
            $responsable = new ResponsableCertif();
  
            $responsable->date_débutaffectation = $request->date_débutaffectation;
            $responsable->date_finaffectation = $request->date_finaffectation;
            $responsable->valide = $request->valide;
            $responsable->certifs_id = $request->certifs_id;
            $responsable->user_id = $request->user_id;
            $responsable->save();
        return redirect()->route('responsablecertif.index');
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

            $responsable = ResponsableCertif::findOrFail($request->id);
      
            $responsable->update([
                $responsable->date_débutaffectation = $request->date_débutaffectation,
                $responsable->date_finaffectation = $request->date_finaffectation,
                $responsable->valide = $request->valide,
                $responsable->certifs_id = $request->certifs_id,
                $responsable->user_id = $request->user_id,
            ]);
            return redirect()->route('responsablecertif.index');
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
            $responsable = ResponsableCertif::findOrFail($request->id)->delete();
            return redirect()->route('responsablecertif.index');
          }
          catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }
    }
}
