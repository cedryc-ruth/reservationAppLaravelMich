@extends('layouts.master')



@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Enregistrement</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ route('spectacles') }}">Spectacles<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ route('register') }}">Enregistrement</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->



    <!--================SIGN UP Box Area =================-->

    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="img-fluid" src="{{ asset('img/login.jpg') }}" alt="">
                        <div class="hover">
                            <h4>Déjà un compte?</h4>
                            <a class="primary-btn" href="{{ route('login') }}">Login</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Enregistrement</h3>
                        <form class="row login_form" action="{{ route('register') }}" method="POST" id="contactForm"
                            novalidate="novalidate" method="POST">
                            @csrf
                            <div class="col-md-12 form-group">
                                <input type="name" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" placeholder="Votre nom & prénom" value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" placeholder="Votre e-mail" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Votre mot de passe">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" id="password-confirm"
                                    name="password_confirmation" placeholder="Confirmez votre mot de passe" required
                                    autocomplete="new-password">
                            </div>

                            <div class="col-md-12 form-group">
                                <select class="form-select" name="language_id" id="language_id">
                                    <option selected>Choisisser votre langue</option>
                                    @foreach ($languages as $language)
                                        <option value="{{ $language->id }}">{{ $language->language }}</option>
                                    @endforeach
                                </select>
                                @error('language_id')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="primary-btn">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
