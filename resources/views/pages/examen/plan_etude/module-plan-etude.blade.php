@extends('layouts.master')
@section('css')

@section('title')
    Module Plan Étude
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Module Plan Étude</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Accueil</a></li>
                <li class="breadcrumb-item active">Module Plan Étude</li>
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
                    Ajouter Module Plan Étude</a>
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

                        @foreach ($planetudes as $planetude)
                            <div class="acd-group">
                                <a href="#" class="acd-heading">{{ $planetude->libelle }}</a>
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
                                                                    <th>Module</th>
                                                                    <th>Coefficient</th>
                                                                    <th>Filiere</th>
                                                                    <th>Niveau</th>
                                                                    <th>Processus</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i = 0; ?>
                                                                @foreach ($planetude->ModulesPlanEtudes as $list_modules_plan_etudes)
                                                                    <tr>
                                                                        <?php $i++; ?>
                                                                        <td>{{ $i }}</td>
                                                                        <td>{{ $list_modules_plan_etudes->libelle }}</td>
                                                                        <td>{{ $list_modules_plan_etudes->coefficient }}</td>
                                                                        <td>{{ $list_modules_plan_etudes->PlanEtudes->Filieres->libelle }}</td>
                                                                        <td>{{ $list_modules_plan_etudes->PlanEtudes->Niveaux->libelle }}</td>
                                                                        <td>
                                                                            <button type="button"
                                                                                class="btn btn-info btn-sm"
                                                                                data-toggle="modal"
                                                                                data-target="#edit{{ $list_modules_plan_etudes->id }}"
                                                                                title="modifier">modifier <i
                                                                                    class="fa fa-edit"></i></button>
                                                                            <button type="button"
                                                                                class="btn btn-danger btn-sm"
                                                                                data-toggle="modal"
                                                                                data-target="#delete{{ $list_modules_plan_etudes->id }}"
                                                                                title="supprimer">supprimer <i
                                                                                    class="fa fa-trash"></i></button>
                                                                        </td>
                                                                    </tr>


                                                                    <!--تعديل قسم جديد -->
                                                                    <div class="modal fade"
                                                                        id="edit{{ $list_modules_plan_etudes->id }}"
                                                                        tabindex="-1" role="dialog"
                                                                        aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        style="font-family: 'Cairo', sans-serif;"
                                                                                        id="exampleModalLabel">
                                                                                        Mis a jour
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
                                                                                        action="{{ route('moduleplanetude.update', 'test') }}"
                                                                                        method="POST">
                                                                                        {{ method_field('patch') }}
                                                                                        {{ csrf_field() }}
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                <input type="text"
                                                                                                    name="libelle"
                                                                                                    class="form-control"
                                                                                                    value="{{ $list_modules_plan_etudes->libelle }}">
                                                                                                    <input type="text"
                                                                                                    name="coefficient"
                                                                                                    class="form-control"
                                                                                                    value="{{ $list_modules_plan_etudes->coefficient }}">
                                                                                                <input id="id"
                                                                                                    type="hidden"
                                                                                                    name="id"
                                                                                                    class="form-control"
                                                                                                    value="{{ $list_modules_plan_etudes->id }}">
                                                                                            </div>

                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                class="control-label">Plan Etude</label>
                                                                                            <select name="plan_etude_id"
                                                                                                class="custom-select">
                                                                                                @foreach ($list_planetudes as $list_planetude)
                                                                                                    <option
                                                                                                        value="{{ $list_planetude->id }}">
                                                                                                        {{ $list_planetude->libelle }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <br>
                                        

                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-dismiss="modal">anuller</button>
                                                                                    <button type="submit"
                                                                                        class="btn btn-danger">confirme</button>
                                                                                </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <!-- delete_modal_Grade -->
                                                                    <div class="modal fade"
                                                                        id="delete{{ $list_modules_plan_etudes->id }}"
                                                                        tabindex="-1" role="dialog"
                                                                        aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 style="font-family: 'Cairo', sans-serif;"
                                                                                        class="modal-title"
                                                                                        id="exampleModalLabel">
                                                                                        suprimer
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
                                                                                        action="{{ route('moduleplanetude.destroy', 'test') }}"
                                                                                        method="post">
                                                                                        {{ method_field('Delete') }}
                                                                                        @csrf
                                                                                        tu es sur
                                                                                        <input id="id"
                                                                                            type="text"
                                                                                            name="id"
                                                                                            class="form-control"
                                                                                            value="{{ $list_modules_plan_etudes->libelle }}">
                                                                                        <input id="id"
                                                                                            type="hidden"
                                                                                            name="id"
                                                                                            class="form-control"
                                                                                            value="{{ $list_modules_plan_etudes->id }}">
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                class="btn btn-secondary"
                                                                                                data-dismiss="modal">Anuller</button>
                                                                                            <button type="submit"
                                                                                                class="btn btn-danger">Confermer</button>
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
                                ajouter</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('moduleplanetude.store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col">
                                        <label for="inputName" class="control-label">Module</label>
                                        <input type="text" name="libelle" class="form-control" placeholder="Module">
                                    </div>
                                    <div class="col">
                                        <label for="inputName" class="control-label">Coefficient</label>
                                        <input type="text" name="coefficient" class="form-control" placeholder="Coefficient">
                                    </div>
                                </div>
                                <br>
                                <div class="col">
                                    <label for="inputName" class="control-label">Plan Etude</label>
                                    <select name="plan_etude_id" class="custom-select">
                                        @foreach ($list_planetudes as $list_planetude)
                                            <option value="{{ $list_planetude->id }}"> {{ $list_planetude->libelle }}
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
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
