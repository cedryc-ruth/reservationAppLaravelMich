@extends('layouts.master')
@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Checkout</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ route('show.index') }}">Spectacles<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ route('checkout.index') }}">Checkout</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            @if (Session::has('danger'))
                <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
                    <strong>{{ Session::get('danger') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3 class="text-center">Vos informations personnelles</h3>
                        <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="firstname" name="firstname">
                                    <span class="placeholder" data-placeholder="Prénom"></span>
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="lastname" name="lastname">
                                    <span class="placeholder" data-placeholder="Nom"></span>
                                </div>

                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="number" name="phone">
                                    <span class="placeholder" data-placeholder="Numéro de téléphone ou de GSM"></span>
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="email" name="email">
                                    <span class="placeholder" data-placeholder="Email"></span>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="add" name="address">
                                    <span class="placeholder" data-placeholder="Adresse"></span>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="city" name="city">
                                    <span class="placeholder" data-placeholder="Ville"></span>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="zip" name="postalcode">
                                    <span class="placeholder" data-placeholder="Code Postal"></span>
                                </div>
                            </div>
                            <div class="card ">
                                <div class="card-header">
                                    <h6 class="card-title text-center">Saisissez le numéro de votre carte</h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">

                                        <input type="hidden" name="payment_method" id="payment_method">
                                        <div id="card-element">
                                            <!-- A Stripe Element will be inserted here. -->
                                        </div>

                                        <div id="card-errors" role="alert"></div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-info" type="submit" id="submit-button"><i
                                                class="fa-solid fa-money-check mx-1"></i>
                                            Procéder au paiement ({{ Cart::total() }} &euro; )</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Votre commande</h2>
                            <ul class="list">
                                <li><a href="#">Spectacle(s) <span>Sous-Total</span></a></li>
                                @foreach (Cart::content() as $representation)
                                    <li><a href="#">{{ $representation->model->show->title }}({{ $representation->model->show->price }}&euro;x{{ $representation->qty }})
                                            <span
                                                class="last">{{ $representation->subtotal() }}&euro;</span></a>
                                    </li>
                                @endforeach

                            </ul>
                            <ul class="list list_2">
                                <li><a href="#">Sous-Total <span>{{ Cart::subtotal() }}&euro;</span></a></li>
                                <li><a href="#">Tva <span>{{ Cart::tax() }}&euro;</span></a></li>
                                <li><a href="#">Total <span>{{ Cart::total() }}&euro;</span></a></li>
                            </ul>
                        </div>
                        <div class="coupon my-3">
                            <div class="code">
                                <p>Have a code?</p>
                                <form action="#" method="POST">
                                    @csrf
                                    <div class="d-flex align-items-center contact_form">
                                        <input type="text" name="coupon_code" id="coupon_code" class="form-control"
                                            placeholder="Coupon code">
                                        <button class="btn btn-primary my-3" type="submit">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->
@endsection



@section('extra-js')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe(" {{ env('STRIPE_KEY') }} ");
        const elements = stripe.elements();
        const cardElement = elements.create('card', {
            classes: {
                base: 'StripeElement bg-light border border-1 p-3 rounded-lg'
            }
        });

        cardElement.mount('#card-element');
        cardElement.addEventListener('change', ({
            error
        }) => {
            const displayError = document.getElementById('card-errors');

            if (error) {
                displayError.classList.add('alert', 'alert-warning');
                displayError.textContent = error.message;
            } else {
                displayError.classList.remove('alert', 'alert-warning');
                displayError.textContent = '';
            }
        });

        const cardButton = document.getElementById('submit-button');
        cardButton.addEventListener('click', async (e) => {
            e.preventDefault();

            const {
                paymentMethod,
                error
            } = await stripe.createPaymentMethod(
                'card', cardElement
            );
            if (error) {
                history.go(-1);
            } else {
                document.getElementById('payment_method').value = paymentMethod.id;
            }

            document.getElementById('payment-form').submit();
        });
    </script>
@endsection
