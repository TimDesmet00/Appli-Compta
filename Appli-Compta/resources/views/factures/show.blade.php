@extends ('layout')

@section ('content')

    <h1>Facture</h1>
    
    <div class="facture">
        <div class="facture-info">
            <div>
                <span>Numéro:</span>
                <span>{{ $invoice['number'] }}</span>
            </div>
            <div>
                <span>Date:</span>
                <span>{{ \Carbon\Carbon::parse($invoice['date'])->format('d/m/Y') }}</span>
            </div>
            <div>
                <span>Société:</span>
                <span>{{ $invoice['society']['name'] }}</span>
            </div>
            <div>
                <span>Client:</span>
                <span>{{ $invoice['client']['name'] }}</span>
            </div>
            <div>
                <span>Total HTVA:</span>
                <span>{{ $invoice['totalHTVA'] }}</span>
            </div>
            <div>
                <span>Total TVA:</span>
                <span>{{ $invoice['totalTVA'] }}</span>
            </div>
            <div>
                <span>Total TTC:</span>
                <span>{{ $invoice['totalTTC'] }}</span>
            </div>
            <!-- <div>
                <span>Payée:</span>
                <span>{{ isset($invoice['paid']) ? ($invoice['paid'] ? 'Oui' : 'Non') : 'Non' }}</span>
            </div> -->
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
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoice['raw'] as $item)
                    <tr>
                        <td>{{ $item['description'] }}</td>
                        <td>{{ $item['quantite'] }}</td>
                        <td>{{ $item['pu'] }}</td>
                        <td>{{ $item['vat'] }}</td>
                        <td>{{ $item['totalHTVARaw'] }}</td>
                        <td>{{ $item['totalTVARaw'] }}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection