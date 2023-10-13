@if($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
        @endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>
                <div class="form-row">
                    <div class="col">
                        <label for="title">Nom</label>
                        <input type="text" wire:model="nom_parent" class="form-control">
                        @error('nom_parent')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">Prenom</label>
                        <input type="text" wire:model="prenom_parent" class="form-control">
                        @error('prenom_parent')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div> <br>
                <div class="form-row">
                    <div class="col">
                        <label for="title">Cin</label>
                        <input type="text" wire:model="cin_parent" class="form-control">
                        @error('cin_parent')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">Email Personnel</label>
                        <input type="text" wire:model="email_personnel_parent" class="form-control">
                        @error('email_personnel_parent')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div> <br>

                <div class="form-row">
                    <div class="col">
                        <label for="title">Telephone</label>
                        <input type="text" wire:model="telephone_parent" class="form-control">
                        @error('telephone_parent')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">Date De Naissance</label>
                        <input type="text" wire:model="date_de_naissance_parent" class="form-control">
                        @error('date_de_naissance_parent')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div><br>
                <div class="form-row">
                    <div class="col">
                        <label for="title">Numero Passeport</label>
                        <input type="text" wire:model="numero_passeport_parent" class="form-control">
                        @error('numero_passeport_parent')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">Date Passeport</label>
                        <input type="text" wire:model="date_passeport_parent" class="form-control">
                        @error('date_passeport_parent')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div> 
                </div><br>
                <div class="form-row">
                    <div class="col">
                        <label for="title">Ville</label>
                        <input type="text" wire:model="ville_parent" class="form-control">
                        @error('ville_parent')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">Adresse</label>
                        <input type="text" wire:model="adresse_parent" class="form-control">
                        @error('adresse_parent')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div><br>
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="button"
                        wire:click="secondStepSubmit">Suivant</button>

                <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" wire:click="back(1)">
                    Précédent
                </button>
            </div>
        </div>
    </div>
