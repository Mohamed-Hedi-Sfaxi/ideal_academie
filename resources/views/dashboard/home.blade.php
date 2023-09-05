
@extends('layouts.master')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Bienvenue {{ Session::get('name') }}!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Page Principale</a></li>
                            <li class="breadcrumb-item active">{{ Session::get('name') }}</li>
                        </ul>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <img src="images/dashboard.jpg" alt="Avatar" style="width:100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
