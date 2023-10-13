@extends('layouts.master')
@section('css')

@section('title')
    Certification utilisateur
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">Certification utilisateur</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Accueil</a></li>
                <li class="breadcrumb-item active">Certification utilisateur</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger col-xl-12 mb-30">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    Ajouter Certif utilisateur
                </button>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Certification</th>
                                <th>Prix Certification</th>
                                <th>Responsable</th>
                                <th>Prix Certification</th>
                                <th>Année universitaire</th>
                                <th>processus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($certifss as $certif)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $certif->certifs_id	 }}</td>
                                    <td>{{ $certif->prix_certifs }}</td>
                                    <td>{{ $certif->user_id }}</td>
                                    <td>{{ $certif->annes_universitaire }}</td>
                                    
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $certif->id }}" title="modifier">modifier <i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $certif->id }}" title="supprimer">supprimer <i
                                                class="fa fa-trash"></i></button>                                         
                                    </td>
                                </tr>


                                <!-- edit_modal_type_filiere -->
                                <!-- delete_modal_Année_Universitaire -->
                                <div class="modal fade" id="delete{{ $certif->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    Supprimer 
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('certifuser.destroy','test') }}" method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    Etes sûr du processus de suppression
                                                    <label for="certifs_id" class="mr-sm-2">certif utilisateur
                                                        :</label>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Annuler</button>
                                                        <button type="submit"
                                                            class="btn btn-danger">Confirmer</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                        <tfoot>
                            
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- add_modal_type_filiere -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">
                                ajouter certification utilisateur</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('prixcertif.store') }}" method="POST">
                                {{ csrf_field() }}
                                <br>
                                <div class="col">
                                    <label for="inputName" class="control-label">Certif</label>
                                    <select name="certifs_id" class="custom-select">
                                        @foreach ($certifss as $list_type)
                                            <option value="{{ $list_type->id }}"> {{ $list_type->libelleCertif }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="inputName" class="control-label">Enseignant</label>
                                    <select name="user_id" class="custom-select">
                                        @foreach ($list_respos as $list_type)
                                            <option value="{{ $list_type->id }}"> {{ $list_type->id }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <br><br>
                                <div class="col">
                                    <label for="inputName" class="control-label">Année Universitaire</label>
                                    <select name="annes_universitaire" class="custom-select">
                                        @foreach ($list_années as $list_cert)
                                            <option value="{{ $list_cert->id }}"> {{ $list_cert->annee_universitaire }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="inputName" class="control-label">Prix Certification</label>
                                    <select name="annes_universitaire" class="custom-select">
                                        @foreach ($list_prix as $list_cert)
                                            <option value="{{ $list_cert->id }}"> {{ $list_cert->libelle }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <br><br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuller</button>
                            <button type="submit" class="btn btn-danger">Confirmer</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection