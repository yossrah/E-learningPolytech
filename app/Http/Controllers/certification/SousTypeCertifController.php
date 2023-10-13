<?php

namespace App\Http\Controllers\certification;
use App\Models\certification\SousTypeCertif;
use App\Models\certification\TypeCertif;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SousTypeCertifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typescertifs= TypeCertif::with(['SousTypeCertifs'])->get();
        $list_types= TypeCertif::all();
        return view('pages.certif.sousTypeCer',compact('typescertifs','list_types'));
        
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
            $soustype = new SousTypeCertif();
  
            $soustype->libelleSType = $request->libelleSType;
  
            $soustype->type_certifs_id = $request->type_certifs_id;
  
            $soustype->save();
        return redirect()->route('soustypecertif.index');
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

            $soustype = SousTypeCertif::findOrFail($request->id);
      
            $soustype->update([
            $soustype->libelleSType = $request->libelleSType,
            $soustype->type_certifs_id = $request->type_certifs_id,
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
            $soustype = SousTypeCertif::findOrFail($request->id)->delete();
            return redirect()->route('soustypecertif.index');
          }
          catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }
    }
}
