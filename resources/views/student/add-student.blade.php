
@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Ajouter Etudiants</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('student/list') }}">Etudiant</a></li>
                                <li class="breadcrumb-item active">Ajouter Etudiants</li>
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
                            <form action="{{ route('student/add/save') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title student-info">Information Etudiant
                                            <span>
                                                <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Nom <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" placeholder="Entrer le nom" value="{{ old('first_name') }}">
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Prénom <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" placeholder="Entrer le prenom" value="{{ old('last_name') }}">
                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms calendar-icon">
                                            <label>Date de naissance <span class="login-danger">*</span></label>
                                            <input class="form-control datetimepicker @error('date_of_birth') is-invalid @enderror" name="date_of_birth" type="text" placeholder="DD-MM-YYYY" value="{{ old('date_of_birth') }}">
                                            @error('date_of_birth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>CIN <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('cin') is-invalid @enderror" name="cin" placeholder="Entrer Numéro CIN" value="{{ old('cin') }}">
                                            @error('cin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Paiement Tranche 2 <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('payment') is-invalid @enderror" name="payment">
                                                <option selected disabled>Selectionner Paiement </option>
                                                <option value="Oui" {{ old('payment') == 'Oui' ? "selected" :""}}>Oui</option>
                                                <option value="Non" {{ old('payment') == 'Non' ? "selected" :""}}>Non</option>
                                            </select>
                                            @error('payment')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>E-Mail <span class="login-danger">*</span></label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Entrer l'email" value="{{ old('email') }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Groupe <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('groupe') is-invalid @enderror" name="groupe">
                                                <option selected disabled>Selectionner le groupe </option>
                                                <option value="G1" {{ old('groupe') == 'G1' ? "selected" :""}}>G1</option>
                                                <option value="G2" {{ old('groupe') == 'G2' ? "selected" :""}}>G2</option>
                                                <option value="G3" {{ old('groupe') == 'G3' ? "selected" :""}}>G3</option>
                                            </select>
                                            @error('groupe')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Formation <span class="login-danger">*</span></label>
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
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Téléphone </label>
                                            <input class="form-control @error('phone_number') is-invalid @enderror" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" name="phone_number" placeholder="Entrer num telephone" value="{{ old('phone_number') }}">
                                            @error('phone_number')
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
