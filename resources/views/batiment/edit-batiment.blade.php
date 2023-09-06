
@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Modifier Batiment</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('batiment/list') }}">Batiment</a></li>
                                <li class="breadcrumb-item active">Modifier Batiment</li>
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
                            <form action="{{ route('batiment/update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control" name="id" value="{{ $batimentEdit->id }}" readonly>
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title batiment-info">Information Batiment</h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>État/Province <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ $batimentEdit->state }}">
                                            @error('state')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Ville <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $batimentEdit->city }}">
                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Adresse </label>
                                            <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" value="{{ $batimentEdit->address }}">
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="batiment-submit">
                                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
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
