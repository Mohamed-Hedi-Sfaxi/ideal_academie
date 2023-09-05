
@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Edit User</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="time-table.html">Users</a></li>
                            <li class="breadcrumb-item active">Edit User</li>
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
                            <form action="{{ route('user/update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Edit User</span></h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Nom <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" value="{{ $users->name }}">
                                            <input type="hidden" class="form-control" name="user_id" value="{{ $users->user_id }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Email <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="email" value="{{ $users->email }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Téléphone <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="phone_number" value="{{ $users->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Statut <span class="login-danger">*</span></label>
                                            <select class="form-control select" name="status">
                                                <option disabled>Choisir Statut</option>
                                                <option value="Active" {{ $users->status == 'Active' ? 'selected' : '' }}>Active</option>
                                                <option value="Disactivé" {{ $users->status == 'Disactivé' ? 'selected' : '' }}>Disactivé</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Role <span class="login-danger">*</span></label>
                                            <select class="form-control select" name="role_name">
                                                <option disabled>Choisir Role</option>
                                                <option value="RH" {{ $users->role_name == 'RH' ? 'selected' : '' }}>RH</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Date Mise a Jours <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="updated_at" value="{{ $users->updated_at }}" readonly>
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
