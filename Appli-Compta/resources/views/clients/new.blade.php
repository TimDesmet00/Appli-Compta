@extends ('layout');

@section ('content');

<form action="/client/add" method="post">
    @csrf
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom" required>

    <label for="rue">Rue</label>
    <input type="text" name="rue" id="rue" required>

    <label for="numero">N°</label>
    <input type="text" name="numero" id="numero" required>

    <label for="cp">C.P.</label>
    <input type="text" name="cp" id="cp" required>

    <label for="ville">Ville</label>
    <input type="text" name="ville" id="ville" required>

    <label for="pays">Pays</label>
    <input type="text" name="pays" id="pays" required>

    <label for="tva">TVA</label>
    <input type="text" name="tva" id="tva">

    <label for="telephone">Tel</label>
    <input type="text" name="telephone" id="telephone" required>

    <label for="email">Mail</label>
    <input type="text" name="email" id="email" required>

    <label for="banque">Banque</label>
    <input type="text" name="banque" id="banque" >
    
    <button type="submit">Ajouter</button>
</form>

@endsection;