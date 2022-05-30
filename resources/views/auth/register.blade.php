@extends('layouts.master')
@section('content')
    <!-- Start Banner Area -->
    {{ Breadcrumbs::render('enregistrement') }}
    <!-- End Banner Area -->



    <!--================SIGN UP Box Area =================-->

    <section class="login_box_area section_gap">
        <div class="container">
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img h-100">
                        <img class="img-fluid h-100" src="{{ asset('img/login.jpg') }}" alt="">
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
                           method="POST">
                            @csrf
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control @error('firstname') is-invalid @enderror"
                                    id="firstname" name="firstname" placeholder="Votre prénom"
                                    value="{{ old('firstname') }}">
                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control @error('lastname') is-invalid @enderror"
                                    id="lastname" name="lastname" placeholder="Votre nom" value="{{ old('lastname') }}">
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <input type="hidden" class="form-control" name="name">


                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control @error('login') is-invalid @enderror" id="login"
                                    name="login" placeholder="Votre login" value="{{ old('login') }}">
                                @error('login')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" placeholder="Votre adresse email" value="{{ old('email') }}">
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

                            <div class="col-md-12 form-group mt-2">
                                <select class="form-select" name="language_id" id="language_id">
                                    <option selected value="null">Choisissez votre langue</option>
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
