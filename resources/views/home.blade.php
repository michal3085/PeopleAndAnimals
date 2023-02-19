@extends('app.app')

@section('content')
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Lista Osób</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- New People Button-->
            <a href="{{ route('new.people') }}" class="btn btn-outline-primary">Dodaj osobę</a>
        </div>
        <!-- People List-->
        <div class="container">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Imię i Nazwisko</th>
                    <th scope="col">Zwierzęta</th>
                    <th scope="col">Usuń</th>
                </tr>
                </thead>
                <tbody>
                @foreach($peoples as $people)
                    <tr>
                        <th scope="row">{{$people->id}}</th>
                        <td><a href="{{ route('show.people', ['id' => $people->id]) }}">{{$people->name}} {{ $people->surname }}</a></td>
                        <td><a href="" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#animalListModal-{{$people->id, $people->name, $people->surname}}">Pokaż</a></td>
                        <form method="POST" action="{{ route('delete.people', ['id' => $people->id]) }}">
                            @csrf
                            @method('delete')
                            <td><button type="submit" class="btn btn-danger">Usuń</button></td>
                        </form>
                    </tr>
{{--                    Animal List Modal--}}
                    <div class="portfolio-modal modal fade" id="animalListModal-{{ $people->id, $people->name, $people->surname }}" tabindex="-1" aria-labelledby="animalListModal" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                                <div class="modal-body text-center pb-5">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8">
                                                <!-- Portfolio Modal - Title-->
                                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">{{$people->name}} {{$people->surname}} </h2>
                                                        <a href="{{ route('edit.people.view', ['id' => $people->id]) }}"><i class="fas fa-edit" style="width: 25px; height: 25px;"></i> Edytuj</a>
                                                    <br/>
                                                <!-- Icon Divider-->
                                                <div class="divider-custom">
                                                    <div class="divider-custom-line"></div>
                                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                                    <div class="divider-custom-line"></div>
                                                </div>
                                                <!-- Portfolio Modal - Image-->
                                                <div class="col-lg-8 mx-auto">
                                                    @foreach(\App\Models\Animal::myAnimalsData($people->id) as $animals)
                                                        <b>{{ $animals->name }}</b>
                                                            @if(isset($animals->genre))
                                                                ({{ $animals->genre }})
                                                            @endif
                                                        <br>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                    !Animal List Modal--}}
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
