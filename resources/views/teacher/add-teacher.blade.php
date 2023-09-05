
@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Ajouter Formateurs</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="teachers.html">Formateurs</a></li>
                        <li class="breadcrumb-item active">Ajouter Formateurs</li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- message --}}
        {!! Toastr::message() !!}
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('teacher/save') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Détails De Base</span></h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Nom & Prénom <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" placeholder="Entrer le nom" value="{{ old('full_name') }}">
                                        @error('full_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>Date De Naissance <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control datetimepicker @error('date_of_birth') is-invalid @enderror" name="date_of_birth" placeholder="DD-MM-YYYY" value="{{ old('date_of_birth') }}">
                                        @error('date_of_birth')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Téléphone <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" placeholder="Entrer téléphone" value="{{ old('mobile') }}">
                                        @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>Date D'adhésion <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control datetimepicker @error('joining_date') is-invalid @enderror" name="joining_date" placeholder="DD-MM-YYYY" value="{{ old('joining_date') }}">
                                        @error('joining_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Formateur de : <span class="login-danger">*</span></label>
                                        <select class="form-control select @error('formation') is-invalid @enderror" name="formation">
                                            <option selected disabled>Selectionner la formation </option>
                                            <option value="Diagnostic mécanique auto et moto" {{ old('formation') == 'Diagnostic mécanique auto et moto' ? "selected" :""}}>Diagnostic mécanique auto et moto</option>
                                            <option value="Réparation et programmation de calculateur auto" {{ old('formation') == 'Réparation et programmation de calculateur auto' ? "selected" :""}}>Réparation et programmation de calculateur auto </option>
                                            <option value="Carrosserie, tôlerie et peinture" {{ old('formation') == 'Carrosserie, tôlerie et peinture' ? "selected" :""}}>Carrosserie, tôlerie et peinture</option>
                                            <option value="Mécanique poids lourds" {{ old('formation') == 'Mécanique poids lourds' ? "selected" :""}}>Mécanique poids lourds</option>
                                            <option value="Technique de soudage" {{ old('formation') == 'Technique de soudage' ? "selected" :""}}>Technique de soudage</option>
                                            <option value="Plomberie chaud et froid" {{ old('formation') == 'Plomberie chaud et froid' ? "selected" :""}}>Plomberie chaud et froid</option>
                                            <option value="Electricité industriel et bâtiment" {{ old('formation') == 'Electricité industriel et bâtiment' ? "selected" :""}}>Electricité industriel et bâtiment</option>
                                            <option value="Camera de surveillance" {{ old('formation') == 'Camera de surveillance' ? "selected" :""}}>Camera de surveillance</option>
                                        </select>
                                        @error('formation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5 class="form-title"><span>Identifiants</span></h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Nom D'utilisateur <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Entrer nom d'utilisateur" value="{{ old('username') }}">
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Email <span class="login-danger">*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Entrer email" value="{{ old('email') }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Mot De Passe <span class="login-danger">*</span></label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Entrer mot de passe" value="{{ old('password') }}">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Répéter Mot De Passe <span class="login-danger">*</span></label>
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Répéter mot de passe" value="{{ old('password_confirmation') }}">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5 class="form-title"><span>Adresse</span></h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Adresse <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Entrer adresse" value="{{ old('address') }}">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Ville <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" placeholder="Entrer ville" value="{{ old('city') }}">
                                        @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Etat <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('state') is-invalid @enderror" name="state" placeholder="Entrer état" value="{{ old('state') }}">
                                        @error('state')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Code Postal <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" placeholder="Entrer code postal" value="{{ old('zip_code') }}">
                                        @error('zip_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="student-submit">
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
