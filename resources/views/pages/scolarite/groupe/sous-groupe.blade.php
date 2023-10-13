@extends('layouts.master')
@section('css')

@section('title')
    groupe 1
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Geni logiciele / 1ere annee /
                @if (!empty($groupe[0]))
                    {{ $groupe[0] }}
                @endif
            </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">


            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="accordion gray plus-icon round">
                        @foreach ($typesousgroupes as $typesousgroupe)
                            @foreach ($typesousgroupe->SousGroupes as $sousgroupe)
                                @if ($sousgroupe->groupe_id == $groupe_id)
                                    <div class="acd-group">
                                        <a href="#" class="acd-heading">Type Sous Groupe |
                                            {{ $typesousgroupe->libelle }}</a>
                                        <div class="acd-des">
                                            <div class="row">
                                                <div class="col-xl-12 mb-30">
                                                    <div class="card card-statistics h-100">
                                                        <div class="card-body">
                                                            <div class="d-block d-md-flex justify-content-between">
                                                                <div class="d-block">
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <a class="button x-small" href="#"
                                                                    data-toggle="modal"
                                                                    data-target="#exampleModal{{ $typesousgroupe->id }}">
                                                                    Affectation Etudiants</a>
                                                            </div>
                                                            <div class="table-responsive mt-15">
                                                                <table class="table center-aligned-table mb-0">
                                                                    <thead>
                                                                        <tr class="text-dark">
                                                                            <th>#</th>
                                                                            </th>
                                                                            <th>Groupe</th>
                                                                            <th>Nombre Etudiants</th>
                                                                            <th>Processus</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $i = 0;?>
                                                                        @foreach ($typesousgroupe->SousGroupes as $sousgroupe)
                                                                            @if ($sousgroupe->groupe_id == $groupe_id)
                                                                                <tr>
                                                                                    <?php $i++; ?>
                                                                                    <td>{{ $i }}</td>
                                                                                    <td>{{ $sousgroupe->libelle }}</td>
                                                                                    <?php $nb_etudiants = 0; ?>
                                                                                    @foreach ($sousgroupe->SousGroupesAffectation as $count)
                                                                                        <?php $nb_etudiants++; ?>
                                                                                    @endforeach
                                                                                    <td>{{ $nb_etudiants }}</td>
                                                                                    <td>
                                                                                        <button type="button"
                                                                                            class="btn btn-info btn-sm"
                                                                                            data-toggle="modal"
                                                                                            data-target="#"
                                                                                            title="modifier">modifier <i
                                                                                                class="fa fa-edit"></i></button>
                                                                                    </td>
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--   Affectation Etudiant -->
                                    <div class="modal fade" id="exampleModal{{ $typesousgroupe->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel{{ $typesousgroupe->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                                                        id="exampleModalLabel">
                                                        Affectation Etudiants</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table center-aligned-table mb-0">
                                                        <thead>
                                                            <tr class="text-dark">
                                                                <th>#</th>
                                                                </th>
                                                                <th>matricule</th>
                                                                <th>nom</th>
                                                                <th>prenom</th>
                                                                <th>affecter</th>
                                                                <th>sous groupe</th>
                                                                <th>Processus</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 0;
                                                            $affecter = 'non';
                                                            ?>
                                                            @foreach ($list_groupes as $list_groupe)
                                                                @foreach ($list_groupe->Etudiants as $list_etudiant)
                                                                    <tr>
                                                                        <?php $i++; ?>
                                                                        <td>{{ $i }}</td>
                                                                        <td>{{ $list_etudiant->matricule }}</td>
                                                                        <td>{{ $list_etudiant->nom }}</td>
                                                                        <td>{{ $list_etudiant->prenom }}</td>
                                                                        
                                                                        @foreach ($sousgroupe->SousGroupesAffectation as $sousgroupeaffectation)

                                                                            @if ($sousgroupeaffectation->etudiant_id == 2 && $sousgroupeaffectation->sous_groupe_id == 10)
                                                                                <?php $affecter = 'oui'; ?>
                                                                            @endif
                                                                        @endforeach
                                                                        <td>{{ $affecter }}</td>
                                                                        <form
                                                                            action="{{ route('sousgroupeaffectation.store') }}"
                                                                            method="POST">
                                                                            {{ csrf_field() }}
                                                                            <td> <select name="sous_groupe_id"
                                                                                    class="custom-select">
                                                                                    <option value="select_filiere"
                                                                                        selected>
                                                                                        Selecte Filiere...
                                                                                        {{ $typesousgroupe->id }}
                                                                                    </option>
                                                                                    <!--placeholder-->
                                                                                    @foreach ($list_groupe->SousGroupes as $list_sousgroupe)
                                                                                        @if ($list_sousgroupe->type_sous_groupe_id == $sousgroupe->TypeSousGroupe->id)
                                                                                            <option
                                                                                                value="{{ $list_sousgroupe->id }}">
                                                                                                {{ $list_sousgroupe->libelle }}
                                                                                            </option>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </select></td>
                                                                            <td>
                                                                                <input type="hidden" name="etudiant_id"
                                                                                    value="{{ $list_etudiant->id }}">
                                                                                <button type="submit"
                                                                                    class="btn btn-info btn-sm">Affecter</button>
                                                                        </form>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @break
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
