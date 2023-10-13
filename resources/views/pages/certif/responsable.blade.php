@extends('layouts.master')
@section('css')

@section('title')
    Responsable
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">Responsable</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Accueil</a></li>
                <li class="breadcrumb-item active">Responsable</li>
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
                    Ajouter Responsable
                </button>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Responsable</th>
                                <th>date début affectation</th>
                                <th>date fin affectation</th>
                                <th>valide/non</th>
                                <th>processus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($responsables as $respo)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $respo->id }}</td>
                                    <td>{{ $respo->date_débutaffectation }}</td>
                                    <td>{{ $respo->date_finaffectation }}</td>
                                    <td>{{ $respo->valide }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $respo->id }}" title="modifier">modifier <i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $respo->id }}" title="supprimer">supprimer <i
                                                class="fa fa-trash"></i></button>                                         
                                    </td>
                                </tr>


                                <!-- edit_modal_type_filiere -->
                                <div class="modal fade" id="edit{{ $respo->id }}" tabindex="-1" role="dialog"
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
                                                <form action="{{ route('responsablecertif.update', 'test') }}" method="post">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="nom" class="mr-sm-2">Type Filière
                                                                :</label>
                                                            <input id="date_débutaffectation" type="text" name="date_débutaffectation"
                                                                class="form-control" value="{{ $respo->date_débutaffectation }}"
                                                                required>
                                                                <input id="date_finaffectation" type="text" name="date_finaffectation"
                                                                class="form-control" value="{{ $respo->date_finaffectation }}"
                                                                required>
                                                                <input id="valide" type="text" name="valide"
                                                                class="form-control" value="{{ $respo->valide }}"
                                                                required>
                                                                <input id="certifs_id" type="text" name="certifs_id"
                                                                class="form-control" value="{{ $respo->certifs_id }}"
                                                                required>
                                                            <input id="id" type="hidden" name="id"
                                                                class="form-control" value="{{ $respo->id }}">
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
                                <div class="modal fade" id="delete{{ $respo->id }}" tabindex="-1" role="dialog"
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
                                                <form action="{{ route('responsablecertif.destroy','test') }}" method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    Etes sûr du processus de suppression
                                                    
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
                                ajouter un responsable</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('responsablecertif.store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col">
                                        <label for="inputName" class="control-label">Date début affectation</label>
                                        <input type="text" name="date_débutaffectation" class="form-control" placeholder="jj/mm/aa">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="inputName" class="control-label">Date fin affectation</label>
                                        <input type="text" name="date_finaffectation" class="form-control" placeholder="jj/mm/aa">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="inputName" class="control-label">Valide/non</label>
                                        <input type="text" name="valide" class="form-control" placeholder="o/n">
                                    </div>
                                </div>
                                <br>
                                <div class="col">
                                    <label for="inputName" class="control-label">Enseignant</label>
                                    <select name="user_id" class="custom-select">
                                        @foreach ($list_respos as $list_type)
                                            <option value="{{ $list_type->id }}"> {{ $list_type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <br><br>
                                <div class="col">
                                    <label for="inputName" class="control-label">Certificat</label>
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
