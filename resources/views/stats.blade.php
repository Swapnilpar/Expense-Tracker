{{-- @include('navbar')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-8 col-sm-12">
            <h1 class="text-center mb-4">Categorized Income Chart</h1>
            <div class="chart-container">
                <canvas id="categorizedIncomeChart"></canvas>
            </div>
        </div>
        <div class="col-lg-5 col-md-8 col-sm-12">
            <h1 class="text-center mb-4">Categorized Expense Chart</h1>
            <div class="chart-container">
                <canvas id="categorizedExpenseChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Income Chart
    const incomeData = @json($incomeStats);
    const incomeDescriptions = incomeData.map(item => item.description);
    const incomePrices = incomeData.map(item => item.price);

    const incomeLabels = incomeDescriptions.slice(0, 7); 
    const incomeValues = incomePrices.slice(0, 7); 

    const incomeColors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9933', '#99CC00'];

    const incomeCtx = document.getElementById('categorizedIncomeChart').getContext('2d');
    const categorizedIncomeChart = new Chart(incomeCtx, {
        type: 'doughnut',
        data: {
            labels: incomeLabels,
            datasets: [{
                data: incomeValues,
                backgroundColor: incomeColors
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        const label = data.labels[tooltipItem.index];
                        const value = data.datasets[0].data[tooltipItem.index];
                        return `${label}: $${value}`;
                    }
                }
            }
        }
    });

    // Expense Chart
    const expenseData = @json($expenseStats);
    const expenseDescriptions = expenseData.map(item => item.description);
    const expensePrices = expenseData.map(item => item.price);

    const expenseLabels = expenseDescriptions.slice(0, 7); 
    const expenseValues = expensePrices.slice(0, 7); 

    const expenseColors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9933', '#99CC00'];

    const expenseCtx = document.getElementById('categorizedExpenseChart').getContext('2d');
    const categorizedExpenseChart = new Chart(expenseCtx, {
        type: 'doughnut',
        data: {
            labels: expenseLabels,
            datasets: [{
                data: expenseValues,
                backgroundColor: expenseColors
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        const label = data.labels[tooltipItem.index];
                        const value = data.datasets[0].data[tooltipItem.index];
                        return `${label}: $${value}`;
                    }
                }
            }
        }
    });
</script> --}}
