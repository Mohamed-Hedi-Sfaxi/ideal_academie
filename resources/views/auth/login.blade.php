
@extends('layouts.app')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}
<div class="login-right">
    <div class="login-right-wrap">
        <h1>Bienvenue a Idéal Academie</h1>
        <p class="account-subtitle">Besoin d'un compte ? <a href="{{ route('register') }}">S'inscrire</a></p>
        <h2>connectez-vous</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Email<span class="login-danger">*</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
                <span class="profile-views"><i class="fas fa-envelope"></i></span>
            </div>
            <div class="form-group">
                <label>Mot De Passe <span class="login-danger">*</span></label>
                <input type="password" class="form-control pass-input @error('password') is-invalid @enderror" name="password">
                <span class="profile-views feather-eye toggle-password"></span>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">connexion</button>
            </div>
        </form>
    </div>
</div>

@endsection
