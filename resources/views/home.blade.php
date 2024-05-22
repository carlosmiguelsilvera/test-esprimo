@extends('layouts.app')

@section('content')
    <style>
        span > .relative {
            display: none;
        }

    </style>
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                <div class="col-md-12 table-responsive">
                    <h1>Dettagli del Birrificio</h1>
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Tipo di Birrificio</th>
                            <th>Indirizzo 1</th>
                            <th>Indirizzo 2</th>
                            <th>Indirizzo 3</th>
                            <th>Città</th>
                            <th>Provincia</th>
                            <th>Codice Postale</th>
                            <th>Paese</th>
                            <th>Longitudine</th>
                            <th>Latitudine</th>
                            <th>Telefono</th>
                            <th>URL del Sito Web</th>
                            <th>Stato</th>
                            <th>Via</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($breweries as $brewery)
                            <tr>
                                <td>{{ $brewery['id'] }}</td>
                                <td>{{ $brewery['name'] }}</td>
                                <td>{{ $brewery['brewery_type'] }}</td>
                                <td>{{ $brewery['address_1'] }}</td>
                                <td>{{ $brewery['address_2'] }}</td>
                                <td>{{ $brewery['address_3'] }}</td>
                                <td>{{ $brewery['city'] }}</td>
                                <td>{{ $brewery['state_province'] }}</td>
                                <td>{{ $brewery['postal_code'] }}</td>
                                <td>{{ $brewery['country'] }}</td>
                                <td>{{ $brewery['longitude'] }}</td>
                                <td>{{ $brewery['latitude'] }}</td>
                                <td>{{ $brewery['phone'] }}</td>
                                <td><a href="{{ $brewery['website_url'] }}" target="_blank">{{ $brewery['website_url'] }}</a></td>
                                <td>{{ $brewery['state'] }}</td>
                                <td>{{ $brewery['street'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $breweries->appends(['page' => $breweries->currentPage(),['path' => route("home")]])->links() !!}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
