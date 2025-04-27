<div class="container mt-5">
    <div class="row">
        <canvas id="lessonsLineChart" width="400" height="200"></canvas>
    </div>
</div>

<script>
    const ctx = document.getElementById('lessonsLineChart').getContext('2d');

    const lineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($labels),
            datasets: [{
                label: 'Lessons Created',
                data: @json($data),
                backgroundColor: 'rgba(54, 162, 235, 0.4)',
                borderColor: 'rgba(54, 162, 235, 1)',
                fill: true,
                tension: 0.3,
                borderWidth: 2,
                pointBackgroundColor: 'white',
                pointBorderColor: 'rgba(54, 162, 235, 1)',
                pointRadius: 5
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
