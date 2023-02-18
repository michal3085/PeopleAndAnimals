@extends('app.app')

@section('content')
    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-4 mb-sm-5">
                    <div class="card card-style1 border-0">
                        <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                            <div class="row align-items-center">
                                <div class="col-lg-6 mb-4 mb-lg-0">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="...">
                                </div>
                                <div class="col-lg-6 px-xl-10">
                                    <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded" data-bs-toggle="modal" data-bs-target="#userEditModal">
                                        <h3 class="h2 text-white mb-0">{{ $user->name }} {{ $user->surname }}</h3>
                                    </div>
                                        <br>
                                    <span>Naciśnij nazwę użytkownika, aby edytować.</span>
{{--                                    <ul class="list-unstyled mb-1-9">--}}
{{--                                        <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Position:</span> Coach</li>--}}
{{--                                        <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Experience:</span> 10 Years</li>--}}
{{--                                        <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Email:</span> edith@mail.com</li>--}}
{{--                                        <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Website:</span> www.example.com</li>--}}
{{--                                        <li class="display-28"><span class="display-26 text-secondary me-2 font-weight-600">Phone:</span> 507 - 541 - 4567</li>--}}
{{--                                    </ul>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{ route('add.animal', ['id' => $user->id]) }}" method="POST">
                    {{ csrf_field() }}
                    <label>Nowe zwierzę:</label>
                    <div class="input-group">
                        <span class="input-group-text">Nazwa Zwierzęcia</span>
                        <input type="text" class="form-control" name="name" id="name"
                               placeholder="Wprowadź nazwę..." />
                        <span class="input-group-text"
                              style="border-left: 0; border-right: 0;">Gatunek</span>
                        <input type="text" class="form-control" name="genre" id="genre"
                               placeholder="Wprowadź gatunek..." />
                        <button type="submit">Dodaj</button>
                    </div>
                </form>
                <div class="col-lg-12 mb-4 mb-sm-5">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 mb-4 mb-sm-5">
                            <div class="container">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nazwa Zwierzęcia</th>
                                        <th scope="col">Gatunek</th>
                                        <th scope="col">Edytuj</th>
                                        <th scope="col">Usuń</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($animals as $animal)
                                        <tr>
                                            <th scope="row">{{$animal->id}}</th>
                                            <td><a href="">{{$animal->name}}</a></td>
                                            <td><a href="">{{$animal->genre}}</a></td>
                                            <td><a href="" class="btn btn-outline-primary">Edytuj</a></td>
                                            <form method="POST" action="">
                                                @csrf
                                                @method('delete')
                                                <td><button type="submit" class="btn btn-danger">Usuń</button></td>
                                            </form>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="portfolio-modal modal fade" id="userEditModal" tabindex="-1" aria-labelledby="userEditModal" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="modal-body text-center pb-5">
                    <div class="col-lg-8 mx-auto">
                        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                        <form action="{{ route('edit.people', ['id' => $user->id]) }}" method="POST" id="contactForm" name="sentMessage" novalidate="novalidate">
                            {{ csrf_field() }}
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Imię</label>
                                    <input class="form-control" id="name" name="name" type="text" value="{{ $user->name }}"/>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Nazwisko</label>
                                    <input class="form-control" id="surname" name="surname" type="text" value="{{ $user->surname }}" required="required" data-validation-required-message="Proszę podać Nazwisko"/>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <br />
                            <div id="success"></div>
                            <div class="form-group"><button class="btn btn-primary btn-xl" id="sendMessageButton" type="submit">Dodaj Osobę</button></div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
