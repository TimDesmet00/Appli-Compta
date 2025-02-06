@extends('layout')

@section('content')
<div>
    <h1>Détails du client</h1>
</div>
<div class="container">
    <div class="group">
        <span>Nom: {{ $client['name'] }}</span>
        <span>TVA: {{ $client['vat'] ?? 'Non fourni' }}</span>
    </div>
    <div class="group">
        <span>Adresse: {{ $client['address'] }}</span>
        <span>Numéro: {{ $client['number'] }}</span>
        <span>Code postal: {{ $client['zipcode'] }}</span>
    </div>
    <div class="group">
        <span>Ville: {{ $client['city'] }}</span>
        <span>Pays: {{ $client['country'] ?? $client['pays'] }}</span>
    </div>
    <div class="group">
        <span>Téléphone: {{ $client['phone'] }}</span>
        <span>Email: {{ $client['email'] }}</span>
        <span>Banque: {{ $client['banque'] ?? 'Non fourni' }}</span>
    </div>
    <div class="group">
        <span>Factures: {{ count($client['invoices']) }}</span>
    </div>
    <div class="group">
        <table>
            <thead>
                <tr>
                    <th>Numero</th>
                    <th>Date</th>
                    <th>Total HTVA</th>
                    <th>Total TVA</th>
                    <th>Total TTC</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($client['invoices'] as $invoice)
                    <tr>
                        <td>{{ $invoice['number'] }}</td>
                        <td>{{ $invoice['date'] }}</td>
                        <td>{{ $invoice['total_htva'] }}</td>
                        <td>{{ $invoice['total_tva'] }}</td>
                        <td>{{ $invoice['total_ttc'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="btn-pos">
        <button class="btn" onclick="location.href='{{ route('client.edit', ['id' => $client['_id']]) }}'">Modifier</button>
    </div>
</div>
@endsection