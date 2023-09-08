
@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Ajouter Formations</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('formation/list') }}">Formation</a></li>
                                <li class="breadcrumb-item active">Ajouter Formations</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{-- message --}}
            {!! Toastr::message() !!}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card comman-shadow">
                        <div class="card-body">
                            <form action="{{ route('formation/add/save') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Détails Formation</span></h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Nom de formation <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Saisir nom de formation" value="{{ old('name') }}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Frais d'inscription <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('sub_cost') is-invalid @enderror" name="sub_cost" placeholder="Saisir frais d'inscription" value="{{ old('sub_cost') }}">
                                            @error('sub_cost')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Frais d'examen <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('exam_cost') is-invalid @enderror" name="exam_cost" placeholder="Saisir frais d'examen" value="{{ old('exam_cost') }}">
                                            @error('exam_cost')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Frais de formation <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('form_cost') is-invalid @enderror" name="form_cost" placeholder="Saisir frais de formation" value="{{ old('form_cost') }}">
                                            @error('form_cost')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Durée <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('period') is-invalid @enderror" name="period" placeholder="Saisir durée" value="{{ old('period') }}">
                                            @error('period')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Description <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Saisir description" value="{{ old('description') }}">
                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    </div>
                                        <div class="formation-submit">
                                            <button type="submit" class="btn btn-primary">Ajouter</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection