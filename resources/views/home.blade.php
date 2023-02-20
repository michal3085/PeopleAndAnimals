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
                <tr id="user_id_1">
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
                        <td><a href="javascript:void(0)" id="show-user" data-id="{{ $people->id }}" class="btn btn-outline-primary">Pokaz</a></td>
                        <form method="POST" action="{{ route('delete.people', ['id' => $people->id]) }}">
                            @csrf
                            @method('delete')
                            <td><button type="submit" class="btn btn-danger">Usuń</button></td>
                        </form>
                    </tr>
{{--                    User and Animals Info Modal--}}
                    <div class="portfolio-modal modal fade" id="ajax-modal" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                                <div class="modal-body text-center pb-5">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8">
                                                <h3 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="userShowModal"></h3>
                                                <br/>
                                        <form id="userForm" name="userForm" class="form-horizontal">
                                            <input type="hidden" name="user_id" id="user_id">
                                            <div class="form-group">
                                                <label for="name" class="col-sm-2 control-label">Imię</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Nazwisko</label>
                                                <div class="col-sm-12">
                                                    <input type="email" class="form-control" id="surname" name="surname" placeholder="Enter Email" value="" required="">
                                                </div>
                                            </div>
                                        </form>
                                        <hr>
                                        Zwierzęta:
                                    </div>
                                    <textarea id="animals" name="animals">.&#13;&#10;</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '#show-user', function () {
                var user_id = $(this).data('id');
                $.get('/people/data/' + user_id, function (data) {
                    $('#userShowModal').html("Informacje o Użytkowniku");
                    $('#ajax-modal').modal('show');
                    $('#user_id').val(data[0].id);
                    $('#name').val(data[0].name);
                    $('#surname').val(data[0].surname);
                    $('#animals').val(data[1]);
                })
            });

        });
    </script>
@endsection

