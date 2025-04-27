<div style="background-color: #f8f9fa" class="border rounded p-4">
    <h5 class="mb-4">Répartition des Languages</h5>
    <canvas id="languagesPieChart"></canvas>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('languagesPieChart').getContext('2d');

            const myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: @json($languages->pluck('label')),
                    datasets: [{
                        label: 'Languages',
                        data: @json($languages->pluck('id')),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)'
                        ],
                        borderColor: 'white',
                        borderWidth: 1,
                    }],
                },
                options: {
                    responsive: true,
                },
            });
        });
    </script>
@endpush
