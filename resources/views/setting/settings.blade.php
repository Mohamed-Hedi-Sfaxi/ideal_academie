@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Paramètres</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('setting/page') }}">Paramètres</a></li>
                            <li class="breadcrumb-item active">Paramètres Généraux</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="settings-menu-links">
                <ul class="nav nav-tabs menu-tabs">
                    <li class="nav-item active">
                        <a class="nav-link" href="settings.html">Paramètres Généraux</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Détails Basiques Du Site Web</h5>
                        </div>
                        <div class="card-body pt-0">
                            <form>
                                <div class="settings-form">
                                    <div class="form-group">
                                        <label>Nom Du Site Web <span class="star-red">*</span></label>
                                        <input type="text" class="form-control" placeholder="Entrer Le Nom Du Site Web">
                                    </div>
                                    <div class="form-group">
                                        <p class="settings-label">Logo <span class="star-red">*</span></p>
                                        <div class="settings-btn">
                                            <input type="file" accept="image/*" name="image" id="file"
                                                onchange="loadFile(event)" class="hide-input">
                                            <label for="file" class="upload">
                                                <i class="feather-upload"></i>
                                            </label>
                                        </div>
                                        <h6 class="settings-size">La taille d’image recommandée est <span>150px x
                                                150px</span></h6>
                                        <div class="upload-images">
                                            <img src="{{ URL::to('assets/img/logo.png') }}" alt="Image">
                                            <a href="javascript:void(0);" class="btn-icon logo-hide-btn">
                                                <i class="feather-x-circle"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <div class="settings-btns">
                                            <button type="submit" class="btn btn-orange">Mettre à jour</button>
                                            <button type="submit" class="btn btn-grey">Annuler</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Coordonnées</h5>
                        </div>
                        <div class="card-body pt-0">
                            <form>
                                <div class="settings-form">
                                    <div class="form-group">
                                        <label>Adresse Ligne 1 <span class="star-red">*</span></label>
                                        <input type="text" class="form-control" placeholder="Entrer Adresse Ligne 1">
                                    </div>
                                    <div class="form-group">
                                        <label>Adresse Ligne 2 <span class="star-red">*</span></label>
                                        <input type="text" class="form-control" placeholder="Entrer Adresse Ligne 2">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Ville <span class="star-red">*</span></label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>État/Province <span class="star-red">*</span></label>
                                                <select class="select form-control">
                                                    <option selected="selected">Choisir</option>
                                                    <option>Ariana</option>
                                                    <option>Béja</option>
                                                    <option>Ben Arous</option>
                                                    <option>Bizerte</option>
                                                    <option>Gabés</option>
                                                    <option>Gafsa</option>
                                                    <option>Jendouba</option>
                                                    <option>Kairouan</option>
                                                    <option>Kasserine</option>
                                                    <option>Kebili</option>
                                                    <option>Kef</option>
                                                    <option>Mahdia</option>
                                                    <option>Manouba</option>
                                                    <option>Mednine</option>
                                                    <option>Monastir</option>
                                                    <option>Nabeul</option>
                                                    <option>Sfax</option>
                                                    <option>Sidi Bouzid</option>
                                                    <option>Siliana</option>
                                                    <option>Sousse</option>
                                                    <option>Tataouine</option>
                                                    <option>Tozeur</option>
                                                    <option>Tunis</option>
                                                    <option>Zaghouan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Code Postal <span class="star-red">*</span></label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <div class="settings-btns">
                                            <button type="submit" class="btn btn-orange">Mettre à jour</button>
                                            <button type="submit" class="btn btn-grey">Annuler</button>
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