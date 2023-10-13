@extends('layouts.master')
@section('css')

@section('title')
    Année Universitaire
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">Année Universitaire</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="/" class="default-color">Accueil</a></li>
                <li class="breadcrumb-item active">Année Universitaire</li>
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
                    Ajouter Année Universitaire
                </button>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>année universitaire</th>
                                <th>année</th>
                                <th>Processus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($annes_universitaire as $anne_universitaire)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $anne_universitaire->annee_universitaire }}</td>
                                    <td>{{ $anne_universitaire->annee }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $anne_universitaire->id }}" title="modifier">modifier <i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $anne_universitaire->id }}" title="supprimer">supprimer <i
                                                class="fa fa-trash"></i></button>                                         
                                    </td>
                                </tr>


                                <!-- edit_modal_Année_Universitaire -->
                                <div class="modal fade" id="edit{{ $anne_universitaire->id }}" tabindex="-1" role="dialog"
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
                                                <form action="{{ route('anneeuniversitaire.update', 'test') }}" method="post">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="nom" class="mr-sm-2">Année Universitaire
                                                                :</label>
                                                            <input id="libelle" type="text" name="annee_universitaire"
                                                                class="form-control" value="{{ $anne_universitaire->annee_universitaire }}"
                                                                required>
                                                            <input id="id" type="hidden" name="id"
                                                                class="form-control" value="{{ $anne_universitaire->id }}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="annee" class="mr-sm-2">Année
                                                                :</label>
                                                            <input id="annee" type="text" name="annee"
                                                                class="form-control" value="{{ $anne_universitaire->annee }}"
                                                                required>
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
                                <div class="modal fade" id="delete{{ $anne_universitaire->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    Supprimer Ecole
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('anneeuniversitaire.destroy','test') }}" method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    Etes sûr du processus de suppression
                                                    <label for="annee_universitaire" class="mr-sm-2">Année Universitaire
                                                        :</label>
                                                    <input id="id" type="text" name="annee_universitaire"
                                                        class="form-control" value="{{ $anne_universitaire->annee_universitaire }}">
                                                    <input id="id" type="hidden" name="id"
                                                        class="form-control" value="{{ $anne_universitaire->id }}">
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
                            <tr>
                                <th>#</th>
                                <th>année universitaire</th>
                                <th>année</th>
                                <th>Processus</th>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- add_modal_Année_Universitaire -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        Ajouter Année Universitaire
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('anneeuniversitaire.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="annee_universitaire" class="mr-sm-2">Année Universitaire
                                    :</label>
                                <input id="annee_universitaire" type="text" name="annee_universitaire" class="form-control" placeholder="2022-2023" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="annee" class="mr-sm-2">Année
                                    :</label>
                                <input id="annee" type="text" name="annee" class="form-control" placeholder="2022" required>
                            </div>
                        </div>
                        <br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Confirmer</button>
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
