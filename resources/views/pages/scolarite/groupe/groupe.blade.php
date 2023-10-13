@extends('layouts.master')
@section('css')

@section('title')
    Groupe
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Groupe</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Accueil</a></li>
                <li class="breadcrumb-item active">Class</li>
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
                <a class="button x-small" href="#" data-toggle="modal" data-target="#ajouterclass">
                    Ajouter Groupe</a>
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
                        <!-- Filieres -->
                        @foreach ($filieres as $filiere)
                            <div class="acd-group">
                                <a href="#" class="acd-heading">{{ $filiere->libelle }}</a>
                                <div class="acd-des">
                                    <div class="card card-statistics h-100">
                                        <div class="accordion gray plus-icon round">
                                            <div class="card card-statistics h-100">
                                                <!-- Niveau -->
                                                <div class="card card-statistics mb-30">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Telecharger Class PDF</h5>
                                                        @foreach ($filiere->Niveaux as $filiereniveau)
                                                            <div id="accordion">
                                                                <div class="card">
                                                                    <div class="card-header" id="headingOne">
                                                                        <h5 class="mb-0">
                                                                            <button class="btn btn-link"
                                                                                data-toggle="collapse"
                                                                                data-target="#{{ $filiereniveau->id }}"
                                                                                aria-expanded="true"
                                                                                aria-controls="{{ $filiereniveau->id }}">
                                                                                {{ $filiereniveau->libelle }}
                                                                            </button>
                                                                        </h5>
                                                                    </div>
                                                                    <div id="{{ $filiereniveau->id }}"
                                                                        class="collapse show"
                                                                        aria-labelledby="headingOne"
                                                                        data-parent="#accordion">
                                                                        <div class="card-body">
                                                                            <div class="table-responsive mt-15">
                                                                                <table
                                                                                    id="datatable{{ $filiereniveau->id }}"
                                                                                    class="table center-aligned-table mb-0">
                                                                                    <thead>
                                                                                        <tr class="text-dark">
                                                                                            <th><input name="select_all"
                                                                                                    id="example-select-all"
                                                                                                    type="checkbox"
                                                                                                    onclick="CheckAll('box{{ $filiereniveau->id }}', this)" />
                                                                                            </th>
                                                                                            <th>#</th>
                                                                                            <th>groupe</th>
                                                                                            <th>nombre etudiants</th>
                                                                                            <th>nombre sous groupes</th>
                                                                                            <th>Processus</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <?php $i = 0; ?>
                                                                                        <!-- Tableau Class -->
                                                                                        @foreach ($filiereniveau->Class as $list_groupe)
                                                                                            <tr>
                                                                                                <?php $i++; ?>
                                                                                                <td><input
                                                                                                        type="checkbox"
                                                                                                        value="{{ $list_groupe->id }}"
                                                                                                        class="box{{ $filiereniveau->id }}">
                                                                                                </td>
                                                                                                <td>{{ $i }}
                                                                                                </td>
                                                                                                <td>
                                                                                                    <form
                                                                                                        action="{{ route('sousgroupe.index') }}"
                                                                                                        method="GET">
                                                                                                        {{ csrf_field() }}
                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            value="{{ $filiere->libelle }}"
                                                                                                            name="filiere_id">
                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            value="{{ $filiereniveau->id }}"
                                                                                                            name="niveau_id">

                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            value="{{ $list_groupe->id }}"
                                                                                                            name="groupe_id">
                                                                                                        <button
                                                                                                            type="submit"
                                                                                                            class="btn btn-link">{{ $list_groupe->libelle }}</button>
                                                                                                    </form>
                                                                                                </td>
                                                                                                <td>42
                                                                                                </td>
                                                                                                <td>5
                                                                                                </td>
                                                                                                <td>
                                                                                                    <button
                                                                                                        type="button"
                                                                                                        class="btn btn-primary btn-sm"
                                                                                                        data-toggle="modal"
                                                                                                        data-target="#"
                                                                                                        title="detais">detais
                                                                                                        <i
                                                                                                            class="fa fa-trash"></i></button>
                                                                                                    <button
                                                                                                        type="button"
                                                                                                        class="btn btn-danger btn-sm"
                                                                                                        data-toggle="modal"
                                                                                                        data-target="#delete{{ $list_groupe->id }}"
                                                                                                        title="supprimer">supprimer
                                                                                                        <i
                                                                                                            class="fa fa-trash"></i></button>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <!-- delete_modal_class -->
                                                                                            <div class="modal fade"
                                                                                                id="delete{{ $list_groupe->id }}"
                                                                                                tabindex="-1"
                                                                                                role="dialog"
                                                                                                aria-labelledby="exampleModalLabel"
                                                                                                aria-hidden="true">
                                                                                                <div class="modal-dialog"
                                                                                                    role="document">
                                                                                                    <div
                                                                                                        class="modal-content">
                                                                                                        <div
                                                                                                            class="modal-header">
                                                                                                            <h5 style="font-family: 'Cairo', sans-serif;"
                                                                                                                class="modal-title"
                                                                                                                id="exampleModalLabel">
                                                                                                                Suprimer
                                                                                                            </h5>
                                                                                                            <button
                                                                                                                type="button"
                                                                                                                class="close"
                                                                                                                data-dismiss="modal"
                                                                                                                aria-label="Close">
                                                                                                                <span
                                                                                                                    aria-hidden="true">&times;</span>
                                                                                                            </button>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="modal-body">
                                                                                                            <form
                                                                                                                action="{{ route('groupe.destroy', 'test') }}"
                                                                                                                method="post">
                                                                                                                {{ method_field('Delete') }}
                                                                                                                @csrf
                                                                                                                tu es
                                                                                                                <input
                                                                                                                    id="id"
                                                                                                                    type="hidden"
                                                                                                                    name="id"
                                                                                                                    class="form-control"
                                                                                                                    value="{{ $list_groupe->id }}">
                                                                                                                <div
                                                                                                                    class="modal-footer">
                                                                                                                    <button
                                                                                                                        type="button"
                                                                                                                        class="btn btn-secondary"
                                                                                                                        data-dismiss="modal">Anuller</button>
                                                                                                                    <button
                                                                                                                        type="submit"
                                                                                                                        class="btn btn-danger">Confirmer</button>
                                                                                                                </div>
                                                                                                            </form>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <!-- Ajouter sous groupe -->
                                                                                            <div class="modal fade"
                                                                                                id="ajoutersousgroupe{{ $filiereniveau->id }}"
                                                                                                tabindex="-1"
                                                                                                role="dialog"
                                                                                                aria-labelledby="ajoutersousgroupe{{ $filiereniveau->id }}"
                                                                                                aria-hidden="true">
                                                                                                <div class="modal-dialog"
                                                                                                    role="document">
                                                                                                    <div
                                                                                                        class="modal-content">
                                                                                                        <div
                                                                                                            class="modal-header">
                                                                                                            <h5 class="modal-title"
                                                                                                                style="font-family: 'Cairo', sans-serif;"
                                                                                                                id="exampleModalLabel">
                                                                                                                Ajouter
                                                                                                                Sous
                                                                                                                Groupe
                                                                                                            </h5>
                                                                                                            <button
                                                                                                                type="button"
                                                                                                                class="close"
                                                                                                                data-dismiss="modal"
                                                                                                                aria-label="Close">
                                                                                                                <span
                                                                                                                    aria-hidden="true">&times;</span>
                                                                                                            </button>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="modal-body">
                                                                                                            <form
                                                                                                                action="{{ route('sousgroupe.store') }}"
                                                                                                                method="POST">
                                                                                                                {{ csrf_field() }}
                                                                                                                <div
                                                                                                                    class="row">
                                                                                                                    <div class="col">

                                                                                                                        <input class="text" type="text" id="list_groupes_ajouter" name="list_groupes_ajouter" value=''>
                                                                                                                        <input class="text" type="text" name="niveau_id" value='{{ $filiereniveau->id }}'>
                                                                                                                        <div name="list_groupes">

                                                                                                                        </div>                                                                                                                    </div>
                                                                                                                    <br>
                                                                                                                    <div
                                                                                                                        class="col">
                                                                                                                        <label
                                                                                                                            for="inputName"
                                                                                                                            class="control-label">Type
                                                                                                                            Sous
                                                                                                                            Groupe</label>
                                                                                                                        <select
                                                                                                                            name="type_sous_groupe"
                                                                                                                            class="custom-select">
                                                                                                                            @foreach ($list_type_sous_groupes as $type_sous_groupe)
                                                                                                                                <option
                                                                                                                                    value="{{ $type_sous_groupe->id }}">
                                                                                                                                    {{ $type_sous_groupe->libelle }}
                                                                                                                                </option>
                                                                                                                            @endforeach
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                    <br>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="modal-footer">
                                                                                                                    <button
                                                                                                                        type="button"
                                                                                                                        class="btn btn-secondary"
                                                                                                                        data-dismiss="modal">Anuller</button>
                                                                                                                    <button
                                                                                                                        type="submit"
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
                                                                <div class="card-body">
                                                                    <a class="button x-small" href="#"
                                                                        data-toggle="modal" 
                                                                        onclick="test({{ $filiereniveau->id }})">
                                                                        Creation Sous Groupe</a>
                                                                        <form
                                                                            action="{{ route('sousgroupe.index') }}"
                                                                            method="GET">
                                                                            {{ csrf_field() }}
                                                                            <input type="hidden" name="niveau_id" value="{{ $filiereniveau->id }}">
                                                                        <button class="button x-small" type="submit"
                                                                        data-toggle="modal" >
                                                                        Sous Groupe Details</button></form>
                                                                </div>
                                                            </div>
                                                            
                                                        @endforeach
                                                    </div>
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
        </div>
        <!-- Ajouter groupe -->
        <div class="modal fade" id="ajouterclass" tabindex="-1" role="dialog" aria-labelledby="ajouterclass"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">
                            Ajouter Class</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('groupe.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col">
                                    <label for="type_filiere" class="control-label">Filiere</label>
                                    <select name="filiere_id" class="custom-select">
                                        <option value="select_filiere" selected>
                                            Selecte Filiere...
                                        </option>
                                        <!--placeholder-->
                                        @foreach ($list_filieres as $list_filiere)
                                            <option value="{{ $list_filiere->id }}">
                                                {{ $list_filiere->libelle }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <div class="col">
                                    <label for="inputName" class="control-label">Niveau</label>
                                    <select name="niveau_id" class="custom-select">
                                        <option value="select_niveau" selected>
                                            Selecte Niveau...
                                        </option>
                                    </select>
                                </div><br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Anuller</button>
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
    $(document).ready(function() {
        $('select[name="filiere_id"]').on('change', function() {
            var filiere_id = $(this).val();
            if (filiere_id) {
                $.ajax({
                    url: "{{ URL::to('getniveau') }}/" + filiere_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {

                        $('select[name="niveau_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="niveau_id"]').append('<option value="' +
                                key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
    function test(id_filiereniveau) {
        var selected = new Array();
            $("#datatable" + id_filiereniveau + " input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
            });
            if (selected.length > 0) {

                $('#ajoutersousgroupe' + id_filiereniveau).modal('show')
                $('input[id="list_groupes_ajouter"]').val(selected);
                
                for (let i = 0; i < selected.length; i++) {
                    $.ajax({
                    url: "{{ URL::to('getgroupe') }}/" + selected[i],
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('div[name="list_groupes"]').empty();
                        $.each(data, function(key, value) {
                            console.log(value.id);
                            console.log(value.libelle);  
                            $('div[name="list_groupes"]').append('<button value="' + value.id + '">' + value.libelle + '</button>');
                        });
                    },
                    });   
                }

            }
    }
</script>
@endsection
