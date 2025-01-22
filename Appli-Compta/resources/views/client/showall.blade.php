@extends ('layout')

@section ('content')
    <h1>Client</h1>
    <table>
        <tr>
            <th>id</th>
            <th>Nom</th>
            <th>Adresse</th>
            <th>N°</th>
            <th>C.P.</th>
            <th>Ville</th>
            <th>Pays</th>
            <th>TVA</th>
            <th>Tel</th>
            <th>Mail</th>
            <th>Banque</th>
            <th>Factures</th>
        </tr>
        @foreach($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->nom }}</td>
                <td>{{ $client->adresse }}</td>
                <td>{{ $client->numero }}</td>
                <td>{{ $client->code_postal }}</td>
                <td>{{ $client->ville }}</td>
                <td>{{ $client->pays }}</td>
                <td>{{ $client->tva }}</td>
                <td>{{ $client->tel }}</td>
                <td>{{ $client->mail }}</td>
                <td>{{ $client->banque }}</td>
                <td><a href="#">Voir</a></td>
            </tr>
    </table>


@endsection