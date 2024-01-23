<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book -> title}}</title>

</head>
<body>

    <h1>{{ $book -> title}} グラフ</h1>
    <div style="max-width: 600px; margin: auto;">
    <canvas id="reviewChart" width="125" height="100" style="width: 100%; height: auto;"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('reviewChart').getContext('2d');
    var data = @json($reviewsCount);

    var chartData = {
        labels: data.map(item => item.review_star),
        datasets: [{
            label: '評価グラフ',
            data: data.map(item => item.count),
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 205, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
        }]
    };

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: chartData,
        options: {
            scales: {
                y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1,
                    precision: 0,
                    callback: function(value) {
                        if (Number.isInteger(value)) {
                            return value;
                        }
                    }
                }
            }
            }
        }
    });
</script>
<button onclick="location.href='/review/{{ $isbn }}'">戻る</button>
</body>
</html>
