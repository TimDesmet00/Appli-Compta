@extends ('layout')

@section ('content')
    <h1>Ajouter la facture</h1>
    <form action="{{ url('/api/facture/add') }}" method="post">
        @csrf
        <div class="container">
            <div class="form-group">
                <div>
                    <label for="number">Numéro</label>
                    <input type="text" name="number" id="number" required>
                </div>
                <div>
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" required>
                </div>
            </div>
            <div class="form-group">
                <div>
                    <label for="client">Client</label>
                    <select name="client" id="client">
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}" @if ($client->id === $facture->client_id) selected @endif>{{ $client->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="amount">Montant</label>
                    <input type="text" name="amount" id="amount" required>
                </div>
            </div>
            <div class="form-group">
            
            </div>
            <div class="form-group"></div>
            <div class="form-group"></div>
        </div>
        
        <button type="submit">Enregistrer</button>
    </form>

@endsection