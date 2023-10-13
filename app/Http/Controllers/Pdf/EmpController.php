<?php

namespace App\Http\Controllers\Pdf;
use App\Http\Controllers\Controller;


use App\Models\Etudiant;
use App\Models\Filiere;
use App\Models\Classe;
use App\Models\Niveau;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class EmpController extends Controller
{
    public function getAllEtudiants(){
        $class= Classe::where('filiere_id',1)->where('niveau_id',1)->with(['Groupes'])->get();
        $filiere= Filiere::where('id',1)->pluck('libelle'); //filiere_id
        $niveau= Niveau::where('id',1)->pluck('libelle');   //filiereniveau_id
        $etudiants = Etudiant::where('filiere_id',1)->where('niveau_id',1)->get();
        return view('pdf.etudiants',compact('etudiants','filiere','niveau','class'));
    }

    public function getEtudiantsFiliere(Request $request){
        $filiere= Filiere::where('id',$request->filiere_id)->pluck('libelle'); //filiere_id
        $niveau= Niveau::where('id',$request->filiereniveau_id)->pluck('libelle');   //filiereniveau_id  
        $class= Classe::where('filiere_id',$request->filiere_id)->where('niveau_id',$request->filiereniveau_id)->with(['Groupes'])->get();
        $pdf = Pdf::loadView('pdf.etudiants',compact('filiere','niveau','class'));
        return $pdf->download('etudiants.pdf');
    }
}
