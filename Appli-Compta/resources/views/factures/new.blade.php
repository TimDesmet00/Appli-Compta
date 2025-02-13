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
                    <label for="society">Société</label>
                    <select name="society" id="society">
                        @foreach ($societies as $society)
                        <option value="{{ $society['_id'] }}">{{ $society['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div>
                    <label for="client">Client</label>
                    <select name="client" id="client">
                        @foreach ($clients as $client)
                        <option value="{{ $client['_id'] }}">{{ $client['name'] }}</option>
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
            <div class="form-group">
                <button type="submit">Enregistrer</button>
            </div>
        </div>
        
        
    </form>

@endsection