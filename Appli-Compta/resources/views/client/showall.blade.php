@extends ('layout')

@section ('content')
    <h1>Client</h1>
    <table id="client-table">
        <thead>
            <tr>
                <th>id</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>N°</th>
                <th>C.P.</th>
                <th>Ville</th>
                <th>Pays</th>
                <th>TVA</th>
                <th>Tel</th>
                <th>Mail</th>
                <th>Banque</th>
                <th>Factures</th>
            </tr>
        </thead>
        <tbody>
            <!-- Les données seront insérées ici par JavaScript -->
        </tbody>
    </table>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/api/client/getall')
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.querySelector('#client-table tbody');
                    data.forEach(client => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${client.id}</td>
                            <td>${client.nom}</td>
                            <td>${client.adresse}</td>
                            <td>${client.numero}</td>
                            <td>${client.cp}</td>
                            <td>${client.ville}</td>
                            <td>${client.pays}</td>
                            <td>${client.tva}</td>
                            <td>${client.tel}</td>
                            <td>${client.mail}</td>
                            <td>${client.banque}</td>
                            <td>${client.factures}</td>
                        `;
                        tableBody.appendChild(row);
                    });
                })
                .catch(error => console.error('Erreur:', error));
        });
    </script>
@endsection