@extends('layouts.master')
@section('css')

@section('title')
    Plan Étude
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Plan Étude</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Accueil</a></li>
                <li class="breadcrumb-item active">Plan Étude</li>
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
            <div class="card-body">
                <a class="button x-small" href="#" data-toggle="modal" data-target="#exampleModal">
                    Ajouter Plan Étude</a>
            </div>

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
                        @foreach ($departements as $departement)
                            <div class="acd-group">
                                <a href="#" class="acd-heading">Departement | {{ $departement->libelle }}</a>
                                <div class="acd-des">
                                    <div class="row">
                                        <div class="col-xl-12 mb-30">
                                            <div class="card card-statistics h-100">
                                                <div class="card-body">
                                                    <div class="d-block d-md-flex justify-content-between">
                                                        <div class="d-block">
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive mt-15">
                                                        <table class="table center-aligned-table mb-0">
                                                            <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th>Plan Etude</th>
                                                                    <th>Date Plan</th>
                                                                    <th>Filiere</th>
                                                                    <th>Niveau</th>
                                                                    <th>Processus</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i = 0; ?>
                                                                @foreach ($departement->Planetudes as $list_planetudes)
                                                                    <tr>
                                                                        <?php $i++; ?>
                                                                        <td>{{ $i }}</td>
                                                                        <td>{{ $list_planetudes->libelle }}</td>
                                                                        <td>{{ $list_planetudes->date_plan }}</td>
                                                                        <td>{{ $list_planetudes->Ecoles->libelle }}</td>
                                                                        <td>{{ $list_planetudes->Niveaux->libelle }}</td>
                                                                        <td>
                                                                            <button type="button"
                                                                                class="btn btn-info btn-sm"
                                                                                data-toggle="modal"
                                                                                data-target="#edit{{ $list_planetudes->id }}"
                                                                                title="modifier">modifier <i
                                                                                    class="fa fa-edit"></i></button>
                                                                            <button type="button"
                                                                                class="btn btn-danger btn-sm"
                                                                                data-toggle="modal"
                                                                                data-target="#delete{{ $list_planetudes->id }}"
                                                                                title="supprimer">supprimer <i
                                                                                    class="fa fa-trash"></i></button>
                                                                        </td>
                                                                    </tr>


                                                                    <!--تعديل قسم جديد -->
                                                                    <div class="modal fade"
                                                                        id="edit{{ $list_planetudes->id }}"
                                                                        tabindex="-1" role="dialog"
                                                                        aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        style="font-family: 'Cairo', sans-serif;"
                                                                                        id="exampleModalLabel">
                                                                                        Mise a jour
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                        class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">

                                                                                    <form
                                                                                        action="{{ route('planetude.update', 'test') }}"
                                                                                        method="POST">
                                                                                        {{ method_field('patch') }}
                                                                                        {{ csrf_field() }}
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                <label for="inputName"
                                                                                                class="control-label">Plan Etude
                                                                                                </label>
                                                                                                <input type="text"
                                                                                                    name="libelle"
                                                                                                    class="form-control"
                                                                                                    value="{{ $list_planetudes->libelle }}">
                                                                                                <input id="id"
                                                                                                    type="hidden"
                                                                                                    name="id"
                                                                                                    class="form-control"
                                                                                                    value="{{ $list_planetudes->id }}">
                                                                                            </div>
                                                                                            <div class="col">
                                                                                                <label for="inputName"
                                                                                                class="control-label">Date Plan
                                                                                                </label>
                                                                                                <input type="text"
                                                                                                    name="date_plan"
                                                                                                    class="form-control"
                                                                                                    value="{{ $list_planetudes->date_plan }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                class="control-label">Ecole
                                                                                                </label>
                                                                                            <select
                                                                                                name="ecole_id"
                                                                                                class="custom-select">
                                                                                                <!--placeholder-->

                                                                                                @foreach ($list_ecoles as $list_ecole)
                                                                                                    <option
                                                                                                        value="{{ $list_ecole->id }}">
                                                                                                        {{ $list_ecole->libelle }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                class="control-label">Departement</label>
                                                                                            <select
                                                                                                name="departement_id"
                                                                                                class="custom-select">
                                                                                                <!--placeholder-->

                                                                                                @foreach ($list_departements as $list_departement)
                                                                                                    <option
                                                                                                        value="{{ $list_departement->id }}">
                                                                                                        {{ $list_departement->libelle }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                class="control-label">FIliere</label>
                                                                                            <select
                                                                                                name="filiere_id"
                                                                                                class="custom-select">
                                                                                                <!--placeholder-->

                                                                                                @foreach ($list_filieres_niveaux as $list_filiere_niveau)
                                                                                                    <option
                                                                                                        value="{{ $list_filiere_niveau->id }}">
                                                                                                        {{ $list_filiere_niveau->libelle }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                   class="control-label">Niveau</label>
                                                                                            <select name="niveau_id" class="custom-select">
                                                                                        
                                                                                            </select>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-dismiss="modal">Anuller</button>
                                                                                    <button type="submit"
                                                                                        class="btn btn-danger">Confirmer</button>
                                                                                </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <!-- delete_modal_Grade -->
                                                                    <div class="modal fade"
                                                                        id="delete{{ $list_planetudes->id }}"
                                                                        tabindex="-1" role="dialog"
                                                                        aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 style="font-family: 'Cairo', sans-serif;"
                                                                                        class="modal-title"
                                                                                        id="exampleModalLabel">
                                                                                        Suprimer
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                        class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form
                                                                                        action="{{ route('planetude.destroy', 'test') }}"
                                                                                        method="post">
                                                                                        {{ method_field('Delete') }}
                                                                                        @csrf
                                                                                        tu es 
                                                                                        <input id="id"
                                                                                            type="hidden"
                                                                                            name="id"
                                                                                            class="form-control"
                                                                                            value="{{ $list_planetudes->id }}">
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                class="btn btn-secondary"
                                                                                                data-dismiss="modal">Anuller</button>
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
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!--اضافة قسم جديد -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">
                                Ajouter Filière</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('planetude.store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col">
                                        <label for="type_filiere" class="control-label">Plan Etude</label>
                                        <input type="text" name="libelle" class="form-control"
                                            placeholder="test">
                                    </div>
                                    <div class="col">
                                        <label for="type_filiere" class="control-label">Date Plan</label>
                                        <input type="text" name="date_plan" class="form-control"
                                            placeholder="test">
                                    </div>
                                </div>
                                <br>
                                <div class="col">
                                    <label for="type_filiere" class="control-label">Ecole</label>
                                    <select name="ecole_id" class="custom-select">
                                        <!--placeholder-->
                                        @foreach ($list_ecoles as $list_ecole)
                                            <option value="{{ $list_ecole->id }}">
                                                {{ $list_ecole->libelle }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <div class="col">
                                    <label for="type_filiere" class="control-label">Departement</label>
                                    <select name="departement_id" class="custom-select">
                                        <!--placeholder-->
                                        @foreach ($list_departements as $list_departement)
                                            <option value="{{ $list_departement->id }}">
                                                {{ $list_departement->libelle }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <div class="col">
                                    <label for="type_filiere" class="control-label">Filiere</label>
                                    <select name="filiere_id" class="custom-select"  onchange="console.log($(this).val())">
                                        <!--placeholder-->
                                        @foreach ($list_filieres_niveaux as $list_filiere_niveau)
                                            <option value="{{ $list_filiere_niveau->id }}">
                                                {{ $list_filiere_niveau->libelle }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div><br>
                                <div class="col">
                                    <label for="inputName"
                                           class="control-label">Niveau</label>
                                    <select name="niveau_id" class="custom-select">
                                
                                    </select>
                                </div><br>
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
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('select[name="filiere_id"]').on('change', function () {

            var filiere_id = $(this).val();
            if (filiere_id) {
                $.ajax({
                    url: "{{ URL::to('getniveau') }}/" + filiere_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {

                        $('select[name="niveau_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="niveau_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
@endsection
