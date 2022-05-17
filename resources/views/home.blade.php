@extends('layouts.master')
@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Home Page</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ route('spectacles') }}">Spectacles<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ route('home') }}">Home Page</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <section class="home_area">
        <div class="container mt-2 mb-2">
            @if (Session::has('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('status') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('error') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if ($errors)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ $error }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endforeach
            @endif
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-4 text-center">Vos informations personnelles</h3>
                    <form method="POST" action="#">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label for="name">Votre nom et prenom</label>
                            <input type="text" class="form-control" id="name" value="{{ $user->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Votre adresse e-mail</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="language_id" class="form-label">Votre langue préférée</label>
                            <select class="form-select" name="language_id" id="language_id">
                                @foreach ($languages as $language)
                                    <option value="{{ $language->id }}"
                                        {{ $language->id === $user->language->id ? 'selected' : '' }}>
                                        {{ $language->language }}</option>
                                @endforeach
                            </select>
                            @error('language_id')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Mettre à jour</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h3 class="mb-4 text-center">Changement de mot de passe</h3>
                    <form method="POST" action="{{ route('changePasswordPost') }}">
                        @csrf
                        <div class="form-group {{ $errors->has('current-password') ? ' has-error' : '' }}">
                            <label for="current-password" class="form-label">Votre mot de passe actuel</label>
                            <input type="password" class="form-control" id="current-password" name="current-password">
                            @if ($errors->has('current-password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('current-password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="control-label">Nouveau mot de passe</label>

                            <input id="new-password" type="password" class="form-control" name="new-password" required>

                            @if ($errors->has('new-password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('new-password') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group">
                            <label for="new-password-confirm" class="control-label">Confirmer le nouveau mot de
                                passe</label>
                            <input id="new-password-confirm" type="password" class="form-control"
                                name="new-password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Changer le mot de passe</button>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection
