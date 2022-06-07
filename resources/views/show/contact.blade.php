@extends('layouts.master')
@section('content')
    <!-- Start Banner Area -->
    {{ Breadcrumbs::render('contact') }}
    <!-- End Banner Area -->

    <!--================Contact Area =================-->
    <section class="contact_area section_gap_bottom">
        <div class="container my-5">
            <h4 class="text-center my-4">Envoyez-nous une message</h4>
            <div class="row">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible col-lg-12" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                @endif
                <div class="col-lg-12">
                    <form class="row contact_form" action="{{ route('show.mailing') }}" method="post" id="contactForm"
                        novalidate="novalidate">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Entrez votre nom" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Entrez votre nom'">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Entrez votre adresse email" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Entrez votre adresse email'">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject"
                                    placeholder="Entrez un sujet" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Entrez un sujet'">
                                @error('subject')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 my-4">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Tapez votre message"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tapez votre message'"></textarea>
                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="btn btn-primary">Envoyez votre message</button>
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
