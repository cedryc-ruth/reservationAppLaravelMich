@extends('layouts.master')
@section('content')

    {{-- <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Contact Us</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Contact</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area --> --}}

    {{ Breadcrumbs::render('contact') }}

    <!--================Contact Area =================-->
    <section class="contact_area section_gap_bottom">
        <div class="container mt-5">
            <div class="d-flex justify-content-center">
                <h2 class="mb-5">Contactez-nous</h2>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form class="row contact_form" action="contact_process.php" method="post" id="contactForm"
                        novalidate="novalidate">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Votre nom et prénom">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Votre adresse email" >
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Sujet">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Votre message ici"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="primary-btn">Envoyez</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--================Contact Area =================-->

    <!--================Contact Success and Error message Area =================-->
    <div id="success" class="modal modal-message fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                    <h2>Thank you</h2>
                    <p>Your message is successfully sent...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals error -->

    <div id="error" class="modal modal-message fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                    <h2>Sorry !</h2>
                    <p> Something went wrong </p>
                </div>
            </div>
        </div>
    </div>
    <!--================End Contact Success and Error message Area =================-->
@endsection
