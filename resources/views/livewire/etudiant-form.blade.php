@if($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-1">
        @endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>
                <div class="form-row">
                    <div class="col">
                        <label for="title">Nom</label>
                        <input type="email" wire:model="nom_etudiant"  class="form-control">
                        @error('nom_etudiant')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">Prenom</label>
                        <input type="text" wire:model="prenom_etudiant" class="form-control" >
                        @error('prenom_etudiant')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div> <br>

                <div class="form-row">
                    <div class="col">
                        <label for="title">Cin</label>
                        <input type="text" wire:model="cin_etudiant" class="form-control" >
                        @error('cin_etudiant')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">Email Personnel</label>
                        <input type="text" wire:model="email_personnel_etudiant" class="form-control" >
                        @error('email_personnel_etudiant')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div><br>

                <div class="form-row">
                    <div class="col-md-3">
                        <label for="title">Telephone</label>
                        <input type="text" wire:model="telephone_etudiant" class="form-control">
                        @error('telephone_etudiant')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="title">Date De Naissance</label>
                        <input type="text" wire:model="date_de_naissance_etudiant" class="form-control">
                        @error('date_de_naissance_etudiant')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="title">Numero Passeport</label>
                        <input type="text" wire:model="numero_passeport_etudiant" class="form-control">
                        @error('numero_passeport_etudiant')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="title">Date Passeport</label>
                        <input type="text" wire:model="date_passeport_etudiant" class="form-control">
                        @error('date_passeport_etudiant')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>    
                </div><br>

                <div class="form-row">
                    <div class="col">
                        <label for="title">Bac</label>
                        <input type="text" wire:model="bac" class="form-control">
                        @error('bac')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">Annee Bac</label>
                        <input type="text" wire:model="annee_bac_etudiant" class="form-control">
                        @error('annee_bac_etudiant')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">Lycee Bac</label>
                        <input type="text" wire:model="lycee_bac_etudiant" class="form-control">
                        @error('lycee_bac_etudiant')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">Mention Bac</label>
                        <input type="text" wire:model="mention_bac_etudiant" class="form-control">
                        @error('mention_bac_etudiant')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="inputCity">Ville</label>
                        <input type="text" wire:model="ville_etudiant" class="form-control">
                        @error('ville_etudiant')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div><br>

                <div class="form-row">
                    <div class="form-group col">
                        <label for="inputState">Adresse</label>
                        <input type="text" wire:model="adresse_etudiant" class="form-control">
                        @error('adresse_etudiant')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div><br>
                <div class="form-row">
                    <div class="col">
                        <label for="title">Filiere</label>
                        <select name="filiere_id" wire:model.defer="filiere_id" class="custom-select">
                            <option value="select_filiere_etudiant" selected>
                                Selecte Filiere...
                            </option>
                            <!--placeholder-->
                            @foreach ($list_filieres as $list_filiere)
                                <option value="{{ $list_filiere->id }}" >
                                    {{ $list_filiere->libelle }}
                                </option>
                            @endforeach
                        </select>
                        @error('filiere_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="inputName" class="control-label">Niveau</label>
                        <select name="niveau_id" wire:model.defer="niveau_id"  class="custom-select">
                            <option value="select_niveau" selected>
                                Selecte Niveau...
                            </option>
                        </select>
                        @error('niveau_id_etudiant')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div><br>
                    <div class="col">
                        <label for="inputName" class="control-label">Class</label>
                        <select name="class_id" wire:model.defer="class_id" class="custom-select">
                            <option value="select_class" selected>
                                Selecte Class...
                            </option>
                        </select>
                        @error('class_id_etudiant')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div><br>
                    <div class="col">
                        <label for="inputName" class="control-label">Groupe</label>
                        <select name="groupe_id" wire:model.defer="groupe_id" class="custom-select" required>
                            <option value="select_groupe" selected>
                                Selecte Groupe...
                            </option>

                        </select>
                        @error('groupe_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div><br>
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                        type="button">Suivant
                </button>

            </div>
        </div>
    </div>

    