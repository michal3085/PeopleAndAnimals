@extends('app.app')

@section('content')
    <!-- Contact Section-->
    <section class="masthead page-section" id="contact">
        <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Edycja dla {{$people->name}} {{ $people->surname }}</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Contact Section Form-->
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                    <form action="{{ route('edit.people', ['id' => $people->id]) }}" method="POST" id="contactForm" name="sentMessage" novalidate="novalidate">
                        {{ csrf_field() }}
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Imię</label>
                                <input class="form-control" id="name" name="name" type="text" value="{{ $people->name }}"/>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Nazwisko</label>
                                <input class="form-control" id="surname" name="surname" type="text" value="{{ $people->surname }}" required="required" data-validation-required-message="Proszę podać Nazwisko"/>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br />
                        <div id="success"></div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-xl" id="sendMessageButton" type="submit">Zapisz zmiany</button>
                            <a href="{{ route('index') }}"><button class="btn btn-primary btn-xl" id="sendMessageButton" type="button" style="float: right; background-color: #dc3545">Powrót</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
