
@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Modifier Etudiant</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('student/list') }}">Etudiant</a></li>
                                <li class="breadcrumb-item active">Modifier Etudiant</li>
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
                            <form action="{{ route('student/update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control" name="id" value="{{ $studentEdit->id }}" readonly>
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
                                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $studentEdit->first_name }}">
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
                                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $studentEdit->last_name }}">
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
                                            <input class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" type="text"  value="{{ $studentEdit->date_of_birth }}">
                                            @error('date_of_birth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>CIN </label>
                                            <input class="form-control @error('cin') is-invalid @enderror" type="text" name="cin" value="{{ $studentEdit->cin }}">
                                            @error('cin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Paiement <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('payment') is-invalid @enderror" name="payment">
                                                <option selected disabled>Paiement Tranche 2 </option>
                                                <option value="Oui" {{ $studentEdit->payment == 'Oui' ? "selected" :""}}>Oui</option>
                                                <option value="Non" {{ $studentEdit->payment == 'Non' ? "selected" :""}}>Non</option>
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
                                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email"  value="{{ $studentEdit->email }}">
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
                                                <option selected disabled>Please Select Class </option>
                                                <option value="G1" {{ $studentEdit->groupe == 'G1' ? "selected" :""}}>G1</option>
                                                <option value="G2" {{ $studentEdit->groupe == 'G2' ? "selected" :""}}>G2</option>
                                                <option value="G3" {{ $studentEdit->groupe == 'G3' ? "selected" :""}}>G3</option>
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
                                                <option selected disabled>Please Select Section </option>
                                                <option value="Diagnostic mécanique auto et moto" {{ $studentEdit->formation == 'Diagnostic mécanique auto et moto' ? "selected" :""}}>Diagnostic mécanique auto et moto</option>
                                                <option value="Réparation et programmation de calculateur auto" {{ $studentEdit->formation == 'Réparation et programmation de calculateur auto' ? "selected" :""}}>Réparation et programmation de calculateur auto</option>
                                                <option value="Carrosserie, tôlerie et peinture" {{ $studentEdit->formation == 'Carrosserie, tôlerie et peinture' ? "selected" :""}}>Carrosserie, tôlerie et peinture</option>
                                                <option value="Mécanique poids lourds" {{ $studentEdit->formation == 'Mécanique poids lourds' ? "selected" :""}}>Mécanique poids lourds</option>
                                                <option value="Technique de soudage" {{ $studentEdit->formation == 'Technique de soudage' ? "selected" :""}}>Technique de soudage</option>
                                                <option value="Plomberie chaud et froid" {{ $studentEdit->formation == 'Plomberie chaud et froid' ? "selected" :""}}>Plomberie chaud et froid</option>
                                                <option value="Electricité industriel et bâtiment" {{ $studentEdit->formation == 'Electricité industriel et bâtiment' ? "selected" :""}}>Electricité industriel et bâtiment</option>
                                                <option value="Camera de surveillance" {{ $studentEdit->formation == 'Camera de surveillance' ? "selected" :""}}>Camera de surveillance</option>
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
                                            <input class="form-control @error('phone_number') is-invalid @enderror" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" name="phone_number" value="{{ $studentEdit->phone_number }}">
                                            @error('phone_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="student-submit">
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
