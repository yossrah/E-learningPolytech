@extends('layouts.master')
@section('css')

@section('title')
    École
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">École</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="/" class="default-color">Accueil</a></li>
                <li class="breadcrumb-item active">École</li>
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
                    Ajouter École
                </button>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Écoles</th>
                                <th>Processus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($ecoles as $ecole)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $ecole->libelle }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $ecole->id }}" title="modifier">modifier <i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $ecole->id }}" title="supprimer">supprimer <i
                                                class="fa fa-trash"></i></button>                                         
                                    </td>
                                </tr>


                                <!-- edit_modal_École -->
                                <div class="modal fade" id="edit{{ $ecole->id }}" tabindex="-1" role="dialog"
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
                                                <form action="{{ route('ecole.update', 'test') }}" method="post">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="nom" class="mr-sm-2">École
                                                                :</label>
                                                            <input id="libelle" type="text" name="libelle"
                                                                class="form-control" value="{{ $ecole->libelle }}"
                                                                required>
                                                            <input id="id" type="hidden" name="id"
                                                                class="form-control" value="{{ $ecole->id }}">
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
                                <!-- delete_modal_École -->
                                <div class="modal fade" id="delete{{ $ecole->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    Supprimer École
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('ecole.destroy','test') }}" method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    <p>
                                                    Etes sûr du processus de suppression</p>
                                                    <label for="libelle" class="mr-sm-2">École
                                                        :</label>
                                                    <input id="libelle" type="text" name="libelle"
                                                        class="form-control" value="{{ $ecole->libelle }}">
                                                    <input id="id" type="hidden" name="id"
                                                        class="form-control" value="{{ $ecole->id }}">
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
                                <th>Écoles</th>
                                <th>Processus</th>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- add_modal_École -->
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
                    <form action="{{ route('ecole.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="ecole" class="mr-sm-2">Ecole
                                    :</label>
                                <input id="ecole" type="text" name="libelle" class="form-control" placeholder="polytechnique" required>
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
