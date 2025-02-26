@extends ('layout')

@section ('content')
    <h1>Factures</h1>
    <div class="btn-pos">
        <button class="btn" onclick="location.href='{{ route('facture.new') }}'">nouvelle facture</button>
    </div>
    <table>
        <thead>
            <tr>
                <th>Client</th>
                <th>Date</th>
                <th>Montant</th>
                <th>Payée</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Les données seront insérées ici par JavaScript -->
        </tbody>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                fetch('/api/facture/getall')
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        const contentType = response.headers.get('content-type');
                        if (!contentType || !contentType.includes('application/json')) {
                            throw new TypeError('Response is not JSON');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.status === 'success' && data.data && data.data.factures) {
                            const factures = data.data.factures;
                            const tableBody = document.querySelector('table tbody');
                            tableBody.innerHTML = '';
                            factures.forEach(facture => {
                                const row = document.createElement('tr');
                                row.innerHTML = `
                                    <td>${facture.client.name}</td>
                                    <td>${new Date(facture.date).toLocaleDateString()}</td>
                                    <td>${facture.totalTTC}</td>
                                    <td>${facture.paid ? 'Oui' : 'Non'}</td>
                                    <td>
                                        <button onclick="location.href='/facture/${facture._id}'">Voir</button>
                                        <button onclick="location.href='/facture/${facture._id}/edit'">Modifier</button>
                                        <button onclick="location.href='/facture/${facture._id}/delete'">Supprimer</button>
                                    </td>
                                `;
                                tableBody.appendChild(row);
                            });
                        }
                    })
                    .catch(error => {
                        console.error('There has been a problem with your fetch operation:', error);
                    });
            });
        </script>
    </table>
@endsection

