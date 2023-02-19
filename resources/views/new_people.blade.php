@extends('app.app')

@section('content')
    <!-- Contact Section-->
    <section class="masthead page-section" id="contact">
        <div class="container">
            <!-- People Successful Added Message-->
                @if (isset($_GET['message']))
                    <div class="alert alert-success" role="alert">
                        <b>{{ $_GET['message'] }}</b>, został/została poprawnie dodana.
                    </div>
                @endif
            @if (isset($_GET['error']) && $_GET['error'] == 1)
                <div class="alert alert-warning" role="alert">
                    Ta osoba jest już na liście.
                </div>
            @endif
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Dodaj Nową Osobę</h2>
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
                    <form action="{{ route('add.people') }}" method="POST" id="contactForm" name="sentMessage" novalidate="novalidate">
                        {{ csrf_field() }}
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Imię</label>
                                <input class="form-control" id="name" name="name" type="text" placeholder="Imię"/>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Nazwisko</label>
                                <input class="form-control" id="surname" name="surname" type="text" placeholder="Nazwisko" required="required" data-validation-required-message="Proszę podać Nazwisko"/>
                                <p class="help-block text-danger"></p>
                                @if (isset($_GET['error']) && $_GET['error'] == 2)
                                    <div class="alert alert-danger" role="alert">
                                        Nazwisko jest wymagane!
                                    </div>
                                @endif
                            </div>
                        </div>
                            <br />
                                <div id="success"></div>
                        <div class="form-group"><button class="btn btn-primary btn-xl" id="sendMessageButton" type="submit">Dodaj Osobę</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
