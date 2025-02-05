@extends('layout')

@section('content')
<div>
    <h1>Détails du client</h1>
</div>
<div class="container">
    <p>Nom: {{ $client['name'] ?? $client['nom'] }}</p>
    <p>Adresse: {{ $client['address'] ?? $client['rue'] }}</p>
    <p>Numéro: {{ $client['number'] ?? $client['numero'] }}</p>
    <p>Code postal: {{ $client['zipcode'] ?? $client['cp'] }}</p>
    <p>Ville: {{ $client['city'] ?? $client['ville'] }}</p>
    <p>Pays: {{ $client['country'] ?? $client['pays'] }}</p>
    <p>TVA: {{ $client['vat'] ?? $client['tva'] ?? 'Non fourni' }}</p>
    <p>Téléphone: {{ $client['phone'] ?? $client['telephone'] }}</p>
    <p>Email: {{ $client['email'] }}</p>
    <p>Banque: {{ $client['banque'] ?? $client['banq'] ?? 'Non fourni' }}</p>
    <p>Factures: {{ count($client['invoices']) }}</p>
    <div class="btn-pos">
        <button class="btn" onclick="location.href='{{ route('client.edit', ['id' => $client['_id']]) }}'">Modifier</button>
    </div>
</div>
@endsection