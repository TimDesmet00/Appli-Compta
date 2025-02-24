@extends ('layout')

@section ('content')
    <h1>Ajouter une société</h1>
    <form action="{{ url('/api/society/add') }}" method="post">
        @csrf
        <div class="container">

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
                    <label for="street">Rue</label>
                    <input type="text" name="street" id="street" required>
                </div>
                <div>
                    <label for="number">Numéro</label>
                    <input type="number" name="number" id="number" required>
                </div>
            </div>

            <div class="form-group">
                <div>
                    <label for="zip">Code postal</label>
                    <input type="number" name="zip" id="zip" required>
                </div>
                <div>
                    <label for="city">Ville</label>
                    <input type="text" name="city" id="city" required>
                </div>
            </div>

            <div class="form-group">
                <div>
                    <label for="country">Pays</label>
                    <input type="text" name="country" id="country" required>
                </div>
                <div>
                    <label for="phone">Téléphone</label>
                    <input type="text" name="phone" id="phone" required>
                </div>
            </div>

            <div class="form-group">
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                
            </div>

            <div class="form-group">
                <button type="submit">Ajouter</button>
            </div>
        </div>
    </form>
@endsection