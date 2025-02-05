@extends ('layout')

@section ('content')
    <div>
        <h1>Modifier un client</h1>
    </div>
    <div class="container">
        <form action="{{ url('/api/client/update/' . $client['_id']) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <div>
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="name" value="{{ $client['name'] }}" required>
                </div>
                
                <div>
                    <label for="vat">TVA</label>
                    <input type="text" name="vat" id="vat" value="{{ $client['vat'] ?? 'Non fourni' }}" required>
                </div>
            </div>
            
            <div class="form-group">
                <div>
                    <label for="address">Rue</label>
                    <input type="text" name="address" id="address" value="{{ $client['address'] }}" required>
                </div>
                <div>
                    <label for="number">N°</label>
                    <input type="text" name="number" id="number" value="{{ $client['number'] }}" required>
                </div>
                <div>
                    <label for="zipcode">C.P.</label>
                    <input type="text" name="zipcode" id="zipcode" value="{{ $client['zipcode'] }}" required>
                </div>
            </div>
            
            <div class="form-group">
                <div>
                    <label for="city">Ville</label>
                    <input type="text" name="city" id="city" value="{{ $client['city'] }}" required>
                </div>
                <div>
                    <label for="country">Pays</label>
                    <input type="text" name="country" id="country" value="{{ $client['country'] }}" required>
                </div>
            </div>
            <div class="form-group">
                <div>
                    <label for="phone">Tel</label>
                    <input type="text" name="phone" id="phone" value="{{ $client['phone'] }}" required>
                </div>
                <div>
                    <label for="email">Mail</label>
                    <input type="text" name="email" id="email" value="{{ $client['email'] }}" required>
                </div>
                <div>
                    <label for="banq">Banque</label>
                    <input type="text" name="banq" id="banq" value="{{ $client['banq'] ?? 'Non fourni' }}" >
                </div>
            </div>
            <div class="btn-pos">
                <button class="btn" type="submit">Modifier</button>
            </div>
        </form>
    </div>


@endsection