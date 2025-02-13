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
                <div>
                    <label for="client">Client</label>
                    <select name="client" id="client">
                        @foreach ($clients as $client)
                        <option value="{{ $client['_id'] }}">{{ $client['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">

            </div>

            <div class="form-group">
                
                <div>
                    <label for="amount">Montant</label>
                    <input type="text" name="amount" id="amount" required>
                </div>
            </div>
            <div class="form-group">
                <table>
                    <thead>
                        <tr>
                            <th><label for="desciption">Produit</label></th>
                            <th><label for="quantite">Quantité</label></th>
                            <th><label for="pu">Prix unitaire</label></th>
                            <th><label for="vat">TVA%</label></th>
                            <th><label for="totalHTVARaw">Total HTVA</label></th>
                            <th><label for="totalTVARaw">Total TVA</label></th>
                            <th>Total TTC</th>
                        </tr>
                    </thead>
                    <tbody id="invoice-items">
                        <tr class="invoice-item">
                            <td><input type="text" name="description[]" id="description"></td>
                            <td><input type="number" name="quantite[]" id="quantite" min="1" oninput="calculateTotalHTVARaw()"></td>
                            <td><input type="number" name="pu[]" id="pu" min="0" oninput="calculateTotalHTVARaw()"></td>
                            <td>
                                <select name="vat[]" id="vat" oninput="calculateTotalTVARaw()">
                                    <option value="0">0%</option>
                                    <option value="6">6%</option>
                                    <option value="12">12%</option>
                                    <option value="21">21%</option>
                                </select>
                            </td>
                            <td><input type="number" name="totalHTVARaw[]" id="totalHTVARaw" oninput="totalHTVA()" readonly></td>
                            <td><input type="number" name="totalTVARaw[]" id="totalTVARaw" oninput="totalTVA()" readonly></td>
                            <td><button type="button" onclick="addRow()">+</button></td>
                        </tr>
                        
                    </tbody>
                    <tbody>
                        <tr>
                            <td colspan="4"></td>
                            <td><input type="number" name="totalHTVA" id="totalHTVA" oninput="totalTTC()" readonly></td>
                            <td><input type="number" name="totalTVA" id="totalTVA" oninput="totalTTC()" readonly></td>
                            <td><input type="number" name="totalTTC" id="totalTTC" readonly></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="form-group"></div>

            <div class="form-group">
                <button type="submit">Enregistrer</button>
            </div>
        </div>
    </form>

    <script>
        function calculateTotalHTVARaw() {
            var rows = document.querySelectorAll('.invoice-item');
            rows.forEach(function(row) {
                var quantite = row.querySelector('#quantite').value;
                var pu = row.querySelector('#pu').value;
                var totalHTVARaw = quantite * pu;
                row.querySelector('#totalHTVARaw').value = totalHTVARaw;
            });
            calculateTotalHTVA();
        }

        function calculateTotalTVARaw() {
            var rows = document.querySelectorAll('.invoice-item');
            rows.forEach(function(row) {
                var totalHTVARaw = row.querySelector('#totalHTVARaw').value;
                var vat = row.querySelector('#vat').value;
                var totalTVARaw = totalHTVARaw * vat / 100;
                row.querySelector('#totalTVARaw').value = totalTVARaw;
            });
            calculateTotalTva();
        }

        function addRow() {
            var table = document.getElementById('invoice-items');
            var newRow = table.querySelector('.invoice-item').cloneNode(true);
            newRow.querySelectorAll('input').forEach(input => input.value = '');
            table.appendChild(newRow);
        }

        function calculateTotalHTVA() {
            var rows = document.querySelectorAll('.invoice-item');
            var totalHTVA = 0;
            rows.forEach(function(row) {
                totalHTVA += parseFloat(row.querySelector('#totalHTVARaw').value);
            });
            document.getElementById('totalHTVA').value = totalHTVA;

            calculateTotalTTC();
        }

        function calculateTotalTva() {
            var rows = document.querySelectorAll('.invoice-item');
            var totalTVA = 0;
            rows.forEach(function(row) {
                totalTVA += parseFloat(row.querySelector('#totalTVARaw').value);
            });
            document.getElementById('totalTVA').value = totalTVA;

            calculateTotalTTC();
        }

        function calculateTotalTTC() {
            var totalHTVA = parseFloat(document.getElementById('totalHTVA').value);
            var totalTVA = parseFloat(document.getElementById('totalTVA').value);
            var totalTTC = totalHTVA + totalTVA;
            document.getElementById('totalTTC').value = totalTTC;
        }
    </script>
@endsection