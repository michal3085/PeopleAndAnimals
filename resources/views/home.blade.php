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
        </div>
        <a href="{{ route('new.people') }}" class="btn btn-outline-primary">Dodaj osobę</a>
        <!-- Table-->
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Imię</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">Zwierzęta</th>
                <th scope="col">Edycja</th>
                <th scope="col">Usuń</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Andrzej</td>
                    <td>Babilonsky</td>
                    <td>Ma zwierza</td>
                    <td><a href="" class="btn btn-outline-primary">Edytuj</a></td>
                    <form method="POST" action="">
                        @csrf
                        @method('delete')
                        <td><button type="submit" class="btn btn-danger">Usuń</button></td>
                    </form>
                </tr>
            </tbody>
        </table>
    </section>
@endsection
