@extends ('layout');

@section ('content');
<div>
    <h1>Ajouter un client</h1>
</div>
<div class="container">
    <form action="/client/add" method="post">
        @csrf
        <div class="form-group">
            <div>
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" required>
            </div>
            
            <div>
                <label for="vat">TVA</label>
                <input type="text" name="vat" id="vat">
            </div>
        </div>
        
        <div class="form-group">
            <div>
                <label for="adress">Rue</label>
                <input type="text" name="adress" id="adress" required>
            </div>
            <div>
                <label for="number">N°</label>
                <input type="text" name="number" id="number" required>
            </div>
            <div>
                <label for="zipcode">C.P.</label>
                <input type="text" name="zipcode" id="zipcode" required>
            </div>
        </div>
        
        <div class="form-group">
            <div>
                <label for="city">Ville</label>
                <input type="text" name="city" id="city" required>
            </div>
            <div>
                <label for="country">Pays</label>
                <input type="text" name="country" id="country" required>
            </div>
        </div>
        <div class="form-group">
            <div>
                <label for="phone">Tel</label>
                <input type="text" name="phone" id="phone" required>
            </div>
            <div>
                <label for="email">Mail</label>
                <input type="text" name="email" id="email" required>
            </div>
            <div>
                <label for="banque">Banque</label>
                <input type="text" name="banque" id="banque" >
            </div>
        </div>
        <div class="btn-pos">
            <button class="btn" type="submit">Ajouter</button>
        </div>
    </form>
</div>


@endsection;