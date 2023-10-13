@extends('layouts.master')
@section('css')

@section('title')
    Insecription Etudiant
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    Insecription Etudiant
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <livewire:ajouter-etudiant />
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
    @livewireScripts
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
        $(document).ready(function() {
            $('select[name="niveau_id"]').on('change', function() {
                var filiere_id = $('select[name="filiere_id"]').val();
                var niveau_id = $(this).val();
                if (niveau_id) {
                    $.ajax({
                        url: "{{ URL::to('getclass') }}/" + niveau_id + "/" + filiere_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
    
                            $('select[name="class_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="class_id"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
        $(document).ready(function() {
            $('select[name="class_id"]').on('change', function() {
                var class_id = $(this).val();
                if (class_id) {
                    $.ajax({
                        url: "{{ URL::to('getgroupe') }}/" + class_id ,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
    
                            $('select[name="groupe_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="groupe_id"]').append('<option value="' +
                                    key + '">' + value + '</option>');
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