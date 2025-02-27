@extends ('layout')

@section ('content')

    <h1>Facture</h1>
    <div class="btn-pos">
        <button class="btn" onclick="location.href='{{ route('facture.edit', ['id' => $facture['_id']]) }}'">Modifier</button>
        <button class="btn" onclick="location.href='{{ route('facture.delete', ['id' => $facture['_id']]) }}'">Supprimer</button>
    </div>
    <div class="facture">
        <div class="facture-info">
            <div>
                <span>Numéro:</span>
                <span>{{ $facture['number'] }}</span>
            </div>
            <div>
                <span>Date:</span>
                <span>{{ $facture['date'] }}</span>
            </div>
            <div>
                <span>Société:</span>
                <span>{{ $facture['society']['name'] }}</span>
            </div>
            <div>
                <span>Client:</span>
                <span>{{ $facture['client']['name'] }}</span>
            </div>
            <div>
                <span>Total HTVA:</span>
                <span>{{ $facture['totalHTVA'] }}</span>
            </div>
            <div>
                <span>Total TVA:</span>
                <span>{{ $facture['totalTVA'] }}</span>
            </div>
            <div>
                <span>Total TTC:</span>
                <span>{{ $facture['totalTTC'] }}</span>
            </div>
            <div>
                <span>Payée:</span>
                <span>{{ $facture['paid'] ? 'Oui' : 'Non' }}</span>
            </div>
        </div>
        <div class="facture-items">
            <table>
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix unitaire</th>
                        <th>TVA%</th>
                        <th>Total HTVA</th>
                        <th>Total TVA</th>
                        <th>Total TTC</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($facture['raw'] as $item)
                    <tr>
                        <td>{{ $item['description'] }}</td>
                        <td>{{ $item['quantite'] }}</td>
                        <td>{{ $item['pu'] }}</td>
                        <td>{{ $item['vat'] }}</td>
                        <td>{{ $item['totalHTVARaw'] }}</td>
                        <td>{{ $item['totalTVARaw'] }}</td>
                        <td>{{ $item['totalHTVARaw'] + $item['totalTVARaw'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection