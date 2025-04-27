<div class="container mt-5">
    <div class="row">
        <canvas id="categoriesChart"></canvas>
    </div>
</div>

@push('scripts')
    <script>
        const ctx = document.getElementById('categoriesChart').getContext('2d');

        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($categories->pluck('label')),
                datasets: [{
                    label: 'Nombre de Concepts',
                    data: @json($categories->pluck('concepts_count')),
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    </script>
@endpush
