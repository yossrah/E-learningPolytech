@extends('layouts.master')
@section('css')

@section('title')
    Prix Certification
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">Prix Certification</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Accueil</a></li>
                <li class="breadcrumb-item active">Prix Certification</li>
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
                    Ajouter Prix Certif
                </button>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Prix Certification</th>
                                <th>processus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($typesprix as $type_prix)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $type_prix->libelle }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $type_prix->id }}" title="modifier">modifier <i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $type_prix->id }}" title="supprimer">supprimer <i
                                                class="fa fa-trash"></i></button>                                         
                                    </td>
                                </tr>


                                <!-- edit_modal_type_filiere -->
                                <div class="modal fade" id="edit{{ $type_prix->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    Mettre à Jour
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{ route('prixcertif.update', 'test') }}" method="post">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="nom" class="mr-sm-2">Type Filière
                                                                :</label>
                                                            <input id="libelle" type="text" name="libelle"
                                                                class="form-control" value="{{ $type_prix->libelle }}"
                                                                required>
                                                            <input id="id" type="hidden" name="id"
                                                                class="form-control" value="{{ $type_prix->id }}">
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Annuler</button>
                                                        <button type="submit"
                                                            class="btn btn-success">Confirmer</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- delete_modal_Année_Universitaire -->
                                <div class="modal fade" id="delete{{ $type_prix->id }}" tabindex="-1" role="dialog"
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
                                                <form action="{{ route('prixcertif.destroy','test') }}" method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    Etes sûr du processus de suppression
                                                    <label for="libelle" class="mr-sm-2">type Filière
                                                        :</label>
                                                    <input id="id" type="text" name="libelle"
                                                        class="form-control" value="{{ $type_prix->libelle }}">
                                                    <input id="id" type="hidden" name="id"
                                                        class="form-control" value="{{ $type_prix->id }}">
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
                                ajouter Prix certification</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('prixcertif.store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col">
                                        <label for="inputName" class="control-label">Prix certif</label>
                                        <input type="text" name="libelle" class="form-control" placeholder="#">
                                    </div>
                                </div>
                                <br>
                                <div class="col">
                                    <label for="inputName" class="control-label">Type prix</label>
                                    <select name="type_prixes_id" class="custom-select">
                                        @foreach ($list_typesprix as $list_type)
                                            <option value="{{ $list_type->id }}"> {{ $list_type->libelle }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <br><br>
                                <div class="col">
                                    <label for="inputName" class="control-label">Certification</label>
                                    <select name="certifs_id" class="custom-select">
                                        @foreach ($list_certifs as $list_cert)
                                            <option value="{{ $list_cert->id }}"> {{ $list_cert->libelleCertif }}
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
