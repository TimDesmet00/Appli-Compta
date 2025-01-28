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
            .then(response => {
                console.log('Response:', response); // Log the response object
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                const contentType = response.headers.get('content-type');
                if (!contentType || !contentType.includes('application/json')) {
                    throw new TypeError('Response is not JSON');
                }
                return response.json(); // Get the response as JSON
            })
            .then(data => {
                console.log('Response data:', data); // Log the response data
                if (data.status === 'success' && data.data && data.data.clients) {
                    const clients = data.data.clients;
                    const tableBody = document.querySelector('#client-table tbody');
                    clients.forEach(client => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${client._id}</td>
                            <td>${client.nom}</td>
                            <td>${client.rue}</td>
                            <td>${client.numero}</td>
                            <td>${client.cp}</td>
                            <td>${client.ville}</td>
                            <td>${client.pays}</td>
                            <td>${client.tva}</td>
                            <td>${client.telephone}</td>
                            <td>${client.email}</td>
                            <td>${client.banque}</td>
                            <td>${client.factures.length}</td>
                        `;
                        tableBody.appendChild(row);
                    });
                } else {
                    console.error('Erreur: données invalides');
                }
            })
            .catch(error => console.error('Erreur:', error));
    });
    </script>
    
@endsection