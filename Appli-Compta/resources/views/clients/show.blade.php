@extends('layout')

@section('content')
<div>
    <h1>Détails du client</h1>
</div>
<div class="container">
    <p>Nom: {{ $client['name'] }}</p>
    <p>Adresse: {{ $client['address'] }}</p>
    <p>Numéro: {{ $client['number'] }}</p>
    <p>Code postal: {{ $client['zipcode'] }}</p>
    <p>Ville: {{ $client['city'] }}</p>
    <p>Pays: {{ $client['country'] ?? $client['pays'] }}</p>
    <p>TVA: {{ $client['vat'] ?? 'Non fourni' }}</p>
    <p>Téléphone: {{ $client['phone'] }}</p>
    <p>Email: {{ $client['email'] }}</p>
    <p>Banque: {{ $client['banque'] ?? 'Non fourni' }}</p>
    <p>Factures: {{ count($client['invoices']) }}</p>
    <div class="btn-pos">
        <button class="btn" onclick="location.href='{{ route('client.edit', ['id' => $client['_id']]) }}'">Modifier</button>
    </div>
</div>
@endsection