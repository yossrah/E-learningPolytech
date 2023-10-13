@extends('layouts.master')
@section('css')

@section('title')
     Certif
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">Certification</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Accueil</a></li>
                <li class="breadcrumb-item active">Certification</li>
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
                    Ajouter Certificat</a>
            </div>

            @if ($errors->any())
                    <div class="alert alert-danger col-xl-12 mb-30">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="accordion gray plus-icon round">

                        @foreach ($certifs as $certif)
                            <div class="acd-group">
                                <a href="#" class="acd-heading">certif | {{ $certif->libelleSType }}</a>
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
                                                                    <th>ID</th>
                                                                    <th>certificat</th>
                                                                    <th>Processus</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i = 0; ?>
                                                                
                                                                @foreach ($certif->Certifs as $list_certifs)
                                                                <?php $i++; ?>
                                                                    <tr>
                                                                        <?php $i++; ?>
                                                                        <td>{{ $i }}</td>
                                                                        <td>{{ $list_certifs->libelleCertif }}</td>
                                                                        <td>
                                                                            <button type="button"
                                                                                class="btn btn-info btn-sm"
                                                                                data-toggle="modal"
                                                                                data-target="#edit{{ $list_certifs->id }}"
                                                                                title="modifier">modifier <i
                                                                                    class="fa fa-edit"></i></button>
                                                                            <button type="button"
                                                                                class="btn btn-danger btn-sm"
                                                                                data-toggle="modal"
                                                                                data-target="#delete{{ $list_certifs->id }}"
                                                                                title="supprimer">supprimer <i
                                                                                    class="fa fa-trash"></i></button>
                                                                        </td>
                                                                    </tr>


                                                                    <!--تعديل قسم جديد -->
                                                                    <div class="modal fade"
                                                                        id="edit{{ $list_certifs->id }}"
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
                                                                                        action="{{ route('certif.update', 'test') }}"
                                                                                        method="POST">
                                                                                        {{ method_field('patch') }}
                                                                                        {{ csrf_field() }}
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                <input type="text"
                                                                                                    name="libelleCertif"
                                                                                                    class="form-control"
                                                                                                    value="{{ $list_certifs->libelleCertif }}">
                                                                                                <input id="id"
                                                                                                    type="hidden"
                                                                                                    name="id"
                                                                                                    class="form-control"
                                                                                                    value="{{ $list_certifs->id }}">
                                                                                            </div>

                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                class="control-label">SousType certif</label>
                                                                                            <select name="sousTypeCert_id"
                                                                                                class="custom-select">
                                                                                                <option
                                                                                                    value="{{ $list_certifs->id }}">
                                                                                                    {{ $list_certifs->libelleSType }}
                                                                                                </option>
                                                                                                @foreach ($list_soustypes as $list_soustype)
                                                                                                      <option value="{{ $list_soustype->id }}">
                                                                                                         {{ $list_soustype->libelleSType }}
                                                                                                      </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                                
                                                                                           </select>
                                                                                        </div>
                                                                                        <br>
                                                                                        {{-- <div class="col">
                                                                                            <div class="form-check">

                                                                                                @if ($list_Sections->Status === 1)
                                                                                                    <input
                                                                                                        type="checkbox"
                                                                                                        checked
                                                                                                        class="form-check-input"
                                                                                                        name="Status"
                                                                                                        id="exampleCheck1">
                                                                                                @else
                                                                                                    <input
                                                                                                        type="checkbox"
                                                                                                        class="form-check-input"
                                                                                                        name="Status"
                                                                                                        id="exampleCheck1">
                                                                                                @endif
                                                                                                <label
                                                                                                    class="form-check-label"
                                                                                                    for="exampleCheck1">{{ trans('Sections_trans.Status') }}</label>
                                                                                            </div>
                                                                                        </div> --}}

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
                                                                        id="delete{{ $list_certifs->id }}"
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
                                                                                        action="{{ route('certif.destroy', 'test') }}"
                                                                                        method="post">
                                                                                        {{ method_field('Delete') }}
                                                                                        @csrf
                                                                                        tu es sur
                                                                                        <input id="id"
                                                                                            type="text"
                                                                                            name="id"
                                                                                            class="form-control"
                                                                                            value="{{ $list_certifs->libelleCertif }}">
                                                                                        <input id="id"
                                                                                            type="hidden"
                                                                                            name="id"
                                                                                            class="form-control"
                                                                                            value="{{ $list_certifs->id }}">
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
                                ajouter certif</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('certif.store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col">
                                        <label for="inputName" class="control-label">Libelle</label>
                                        <input type="text" name="libelleCertif" class="form-control" placeholder="photoshop">
                                    </div>
                                </div>
                                <br>
                                <div class="col">
                                    <label for="inputName" class="control-label"></label>
                                    <select name="sousTypeCert_id" class="custom-select">
                                        @foreach ($list_soustypes as $list_soustype)
                                            <option value="{{ $list_soustype->id }}"> {{ $list_soustype->libelleSType }}
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
