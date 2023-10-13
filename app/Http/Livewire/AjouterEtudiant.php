<?php

namespace App\Http\Livewire;
use App\Models\RolePublic;
use App\Models\Filiere;
use App\Models\Etudiant;
use App\Models\Parents;
use App\Models\PasseportEtudiant;
use App\Models\PasseportParent;
use App\Models\UserPublic;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

use Livewire\Component;

class AjouterEtudiant extends Component
{

    public $successMessage = '';
    public $catchError;
    public $currentStep = 1,
         // Etudiant_INPUTS
         $nom_etudiant, $prenom_etudiant,
         $cin_etudiant, $email_personnel_etudiant,
         $telephone_etudiant, $numero_passeport_etudiant,
         $date_passeport_etudiant, $annee_bac_etudiant,
         $date_de_naissance_etudiant,$mention_bac_etudiant,
         $ville_etudiant,$lycee_bac_etudiant,$adresse_etudiant,$filiere_id,$niveau_id,$class_id,
         $groupe_id,$bac,

         // Etudiant_INPUTS
         $nom_parent, $prenom_parent,
         $cin_parent, $email_personnel_parent,
         $telephone_parent,$date_de_naissance_parent, 
         $numero_passeport_parent,$date_passeport_parent,
         $ville_parent,$adresse_parent
    ;
    /*
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'email_personnel_etudiant' => 'required|email',
            'email_personnel_parent' => 'required|email',
            'cin_etudiant' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'cin_parent' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'telephone_etudiant' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'telephone_parent' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'numero_passeport_etudiant' => 'string|min:10|max:10|regex:/[0-9]{9}/',
            'numero_passeport_parent' => 'string|min:10|max:10|regex:/[0-9]{9}/',
        ]);
    }*/

    public function render()
    {
        return view('livewire.ajouter-etudiant',[
            'list_filieres' => Filiere::all(),
        ]);

    }

    //firstStepSubmit
    public function firstStepSubmit()
    {   
        /*
        $this->validate([
            'nom_etudiant' => 'required',
            'prenom_etudiant' => 'required',
            'cin_etudiant' => 'required',
            'email_personnel_etudiant' => 'required',
            'telephone_etudiant' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'numero_passeport_etudiant' => 'required',
            'date_passeport_etudiant' => 'required',
            'date_de_naissance_etudiant' => 'required',
            'annee_bac_etudiant' => 'required',
            'lycee_bac_etudiant' => 'required',
            'mention_bac_etudiant' => 'required',
            'ville_etudiant' => 'required',
            'adresse_etudiant' => 'required',   
            'filiere_id' => 'required',   
            'niveau_id' => 'required',   
            'class_id' => 'required',   
            'groupe_id' => 'required',   
        ]);*/
        $this->currentStep = 2;
    }

    //secondStepSubmit
    public function secondStepSubmit()
    {
        /*
        $this->validate([
            'nom_parent' => 'required',
            'prenom_parent' => 'required',
            'cin_parent' => 'required',
            'email_personnel_parent' => 'required',
            'telephone_parent' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'numero_passeport_parent' => 'required',
            'date_passeport_parent' => 'required',
            'date_de_naissance_parent' => 'required',
            'ville_parent' => 'required',
            'adresse_parent' => 'required',
        ]);*/
        $this->currentStep = 3;
    }

    

    public function submitForm(){
        $point=".";
        $email="@polytechnicient.tn";
        $filere = strtoupper(substr(Filiere::where('id', $this->filiere_id)->pluck('libelle')[0], 0,2));
        $date = substr(Carbon::now()->year, -2);
        $numberEtudiants = Etudiant::where('filiere_id', $this->filiere_id)->count() + 1;
        $matricule = $date.$filere.$numberEtudiants;
        try {
            // Etudiant_INPUTS
            $etudiant = new Etudiant();
            $etudiant->nom = $this->nom_etudiant;
            $etudiant->prenom = $this->prenom_etudiant;
            $etudiant->cin = $this->cin_etudiant;
            $etudiant->email_personnel = $this->email_personnel_etudiant;
            $etudiant->telephone = $this->telephone_etudiant;
            $etudiant->naissance = $this->date_de_naissance_etudiant;
            $etudiant->bac= $this->bac;
            $etudiant->annee_bac = $this->annee_bac_etudiant;
            $etudiant->lycee_bac = $this->lycee_bac_etudiant;
            $etudiant->mention_bac = $this->mention_bac_etudiant;
            $etudiant->email_polytechnique = $this->nom_etudiant.$point.$this->prenom_etudiant.$email;
            $etudiant->matricule= $matricule; 
            $etudiant->ville = $this->ville_etudiant;
            $etudiant->adresse = $this->adresse_etudiant;
            $etudiant->filiere_id= $this->filiere_id;
            $etudiant->niveau_id= $this->niveau_id;
            $etudiant->class_id= $this->class_id;
            $etudiant->groupe_id= $this->groupe_id;
            $etudiant->save();

            $etudiant_id = Etudiant::where('matricule', 'IF010')->pluck('id');

            // Parent_INPUTS
            $parent = new Parents();
            $parent->nom= $this->nom_parent;
            $parent->prenom= $this->prenom_parent;
            $parent->cin= $this->cin_parent;
            $parent->naissance= $this->date_de_naissance_parent;
            $parent->email_personnel= $this->email_personnel_parent;
            $parent->telephone= $this->telephone_parent;
            $parent->etudiant_id= $etudiant_id[0];
            $parent->email_polytechnique= $this->nom_parent.$point.$this->prenom_parent.$email;
            $parent->ville= $this->ville_parent;
            $parent->adresse= $this->adresse_parent;
            $parent->save();

            $parent_id = Parents::where('etudiant_id', $etudiant_id[0])->pluck('id');

            // Passeport_parent
            $passeport_parent = new PasseportParent();
            $passeport_parent->numero=$this->numero_passeport_parent;
            $passeport_parent->date_passeport=$this->date_passeport_parent;
            $passeport_parent->parent_id=$parent_id[0];
            $passeport_parent->save();

            // Passeport_etudiant
            $passeport_etudiant = new PasseportEtudiant();
            $passeport_etudiant->numero=$this->numero_passeport_etudiant;
            $passeport_etudiant->date_passeport=$this->date_passeport_etudiant;
            $passeport_etudiant->etudiant_id=$etudiant_id[0];
            $passeport_etudiant->save();

            // User_public_etudiant
            $user_public_etudiant = new UserPublic();
            $user_public_etudiant->name=$this->nom_etudiant.$point.$this->prenom_etudiant;
            $user_public_etudiant->email=$this->nom_etudiant.$point.$this->prenom_etudiant.$email;
            $user_public_etudiant->password= Hash::make(Str::random(8));
            $user_public_etudiant->role_public = "etudiant";
            $user_public_etudiant->profile_id= $etudiant_id[0];
            $user_public_etudiant->save();

            // User_public_parent
            $user_public_parent = new UserPublic();
            $user_public_parent->name=$this->nom_parent.$point.$this->prenom_parent;
            $user_public_parent->email=$this->nom_parent.$point.$this->prenom_parent.$email;
            $user_public_parent->password= Hash::make(Str::random(8));
            $user_public_parent->role_public = "parent";
            $user_public_parent->profile_id=$parent_id[0];
            $user_public_parent->save();

            $this->successMessage = trans('messages.success');
            $this->clearForm();
            $this->currentStep = 1;
        }

        catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        };
    }

    public function clearForm()
    {
        // Etudiant_INPUTS
        $this->nom_etudiant = '';
        $this->prenom_etudiant = '';
        $this->cin_etudiant = '';
        $this->email_personnel_etudiant = '';
        $this->telephone_etudiant = '';
        $this->numero_passeport_etudiant = '';
        $this->date_passeport_etudiant ='';
        $this->annee_bac_etudiant = '';
        $this->bac_etudiant = '';
        $this->date_de_naissance_etudiant = '';
        $this->mention_bac_etudiant = '';
        $this->ville_etudiant ='';
        $this->lycee_bac_etudiant ='';
        $this->adresse_etudiant = '';
        $this->filiere_id = '';
        $this->niveau_id = '';
        $this->class_id = '';
        $this->groupe_id ='';

        // Parent_INPUTS
        $this->nom_parent = '';
        $this->prenom_parent = '';
        $this->cin_parent = '';
        $this->email_personnel_parent = '';
        $this->telephone_parent = '';
        $this->date_de_naissance_parent = '';
        $this->numero_passeport_parent = '';
        $this->date_passeport_parent ='';
        $this->ville_parent ='';
        $this->adresse_parent ='';
    }

    //back
    public function back($step)
    {
        $this->currentStep = $step;
    }

}