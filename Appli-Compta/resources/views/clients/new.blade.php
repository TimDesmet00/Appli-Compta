@extends ('layout');

@section ('content');

<form action="/client/add" method="post">
    @csrf
    <label for="name">Nom</label>
    <input type="text" name="name" id="name" required>

    <label for="adress">Rue</label>
    <input type="text" name="adress" id="adress" required>

    <label for="number">N°</label>
    <input type="text" name="number" id="number" required>

    <label for="zipcode">C.P.</label>
    <input type="text" name="zipcode" id="zipcode" required>

    <label for="city">Ville</label>
    <input type="text" name="city" id="city" required>

    <label for="country">Pays</label>
    <input type="text" name="country" id="country" required>

    <label for="vat">TVA</label>
    <input type="text" name="vat" id="vat">

    <label for="phone">Tel</label>
    <input type="text" name="phone" id="phone" required>

    <label for="email">Mail</label>
    <input type="text" name="email" id="email" required>

    <label for="banque">Banque</label>
    <input type="text" name="banque" id="banque" >

    <button type="submit">Ajouter</button>
</form>

@endsection;