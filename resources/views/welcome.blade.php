@extends('app')
@section('content')
    {{-- Style section of welcome page  --}}
    <style>
        .summary-display {
            background-color: #ffffff79;
            margin-top: 28px;
            margin-bottom: 28px;
            padding-top: 12px;
            border-radius: 16px
        }

        .glassmorphism {
            background-color: rgba(255, 255, 255, 0.377);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.2s ease;
        }

        .glassmorphism:hover {
            transform: scale(1.10);
        }

        .ratio-container {
            border-radius: 16px;
            background-color: #ffffff79;
        }

        .ratio-container {
            border-radius: 16px;
        }
    </style>

    <body id="WelcomeBody">


        {{-- hero section  --}}
        <div class=" my-lg-5 my-md-5 py-md-4 py-10">
            <div class="container">
                <!-- Hero Section -->
                <div class="row justify-content-center py-4">
                    <div class="col-xl-10 col-lg-10 col-md-12">
                        <div class="py-8 py-lg-0 text-center ">
                            <h1 class="display-2 fw-bold mb-3 text-primary"><span
                                    class="text-dark px-3 px-md-0">Money</span><span class="text-primary">Minde&#8377;</span>
                            </h1>
                            <p class="my-3 h2 text-dark ">
                                Take charge of your budget with our smart budgeting tools. Receive alerts when you're
                                approaching them, and watch your savings grow effortlessly.
                            </p>
                            <a href="/income" class="btn btn-primary my-2 ">Track Income</a>
                            <a href="/budget" class="btn btn-primary my-2 ms-4">Set Budget</a>
                            <a href="/expense" class="btn btn-primary my-2 ms-4">Track Expenses</a>

                            <div class="my-5">
                                <ul class="list-inline ">
                                    <li class="list-inline-item text-dark fw-semi-bold lh-1 fs-5 me-3 mb-2 mb-md-0">&#x2714; Income tracking</span></li>
                                    <li class="list-inline-item text-dark fw-semi-bold lh-1 fs-5 me-3 mb-2 mb-md-0">&#x2714; Expense tracking</span></li>
                                    <li class="list-inline-item text-dark fw-semi-bold lh-1 fs-5 me-3 mb-2 mb-md-0">&#x2714; Budget tracking</span></li>
                                    <li class="list-inline-item text-dark fw-semi-bold lh-1 fs-5 me-3 mb-2 mb-md-0">&#x2714; Visualization</span></li>

                                    
                                
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

     

       

        {{-- income displaying section  --}}
        <section class="container summary-display">
            <h1 class="text-center">Income Overview</h1>
            <hr style="color: rgb(0, 89, 131)">
            <section class="dashboard-income p-3  d-flex justify-content-center flex-wrap">


                {{-- Per day income  --}}
                <div class="card glassmorphism my-3" style="max-width: 14rem;">
                    <div class="card-body">
                        <h6 class="card-title">Today's Income: <h5 style="color: green">
                                {{ $todayIncome ? $todayIncome->sum('price') : '0.00' }} &#8377; </h5>
                        </h6>
                        <p class="card-text">Details:</p>
                        <ul class="list-group">
                            @forelse($todayIncome as $income)
                                <li class="list-group-item glassmorphism mt-2">{{ $income->description }}:
                                    {{ number_format($income->price, 2) }}
                                    &#8377;</li>
                            @empty
                                <li class="list-group-item glassmorphism">No Income for Today</li>
                            @endforelse
                        </ul>
                    </div>
                </div>



                {{-- weekly income  --}}
                <div class="card glassmorphism mb-3 ms-2" style="max-width: 14rem;">
                    <div class="card-body">
                        <h6 class="card-title">Last 7 Days Income: <h5 style="color: green">
                                {{ $weeklyIncome ? $weeklyIncome->sum('price') : '0.00' }} &#8377; </h5>
                        </h6>
                        <p class="card-text">Details:</p>
                        <ul class="list-group">
                            @for ($i = 0; $i < min(count($weeklyIncome), 2); $i++)
                                <li class="list-group-item glassmorphism mt-2">{{ $weeklyIncome[$i]->description }}:
                                    {{ number_format($weeklyIncome[$i]->price, 2) }} &#8377;</li>
                            @endfor
                            @if (count($weeklyIncome) > 2)
                                <a href="/income" class="pt-2">See More</a>
                            @endif
                        </ul>
                    </div>
                </div>

                {{-- monthly income --}}
                <div class="card glassmorphism mb-3 ms-2" style="max-width: 14rem;">
                    <div class="card-body">
                        <h6 class="card-title">Last 30 Days Income: <h5 style="color: green">
                                {{ $monthlyIncomes ? $monthlyIncomes->sum('price') : '0.00' }} &#8377; </h5>
                        </h6>
                        <p>Details:</p>
                        <ul class="list-group">
                            @for ($i = 0; $i < min(count($monthlyIncomes), 2); $i++)
                                <li class="list-group-item glassmorphism mt-2">{{ $monthlyIncomes[$i]->description }}:
                                    {{ number_format($monthlyIncomes[$i]->price, 2) }} &#8377;</li>
                            @endfor
                            @if (count($monthlyIncomes) > 2)
                                <a href="/income" class="pt-2">See More</a>
                            @endif
                        </ul>
                    </div>
                </div>

                {{-- yearly income  --}}
                <div class="card glassmorphism mb-3 ms-2" style="max-width: 14rem;">
                    <div class="card-body">
                        <h6 class="card-title">Yearly Income: <h5 style="color: green">
                                {{ $yearlyIncome ? $yearlyIncome->sum('price') : '0.00' }} &#8377; </h5>
                        </h6>
                        <p>Details:</p>
                        <ul class="list-group">
                            @for ($i = 0; $i < min(count($yearlyIncome), 2); $i++)
                                <li class="list-group-item glassmorphism mt-2">{{ $yearlyIncome[$i]->description }}:
                                    {{ number_format($yearlyIncome[$i]->price, 2) }} &#8377;</li>
                            @endfor
                            @if (count($yearlyIncome) > 2)
                                <a href="/income" class="pt-2">See More</a>
                            @endif
                        </ul>
                    </div>
                </div>
            </section>
        </section>




        {{-- Expenses displayin section  --}}
        <section class="container summary-display">
            <h1 class="text-center">Expense Overview</h1>
            <hr style="color: rgb(0, 89, 131)">


            <section class="dashboard-expense p-3 mb-5  d-flex justify-content-center flex-wrap">
                <div class="card glassmorphism mb-3" style="max-width: 14rem;">
                    <div class="card-body">
                        <h6 class="card-title">Today's Expense: <h5 style="color: rgb(198, 0, 0)">
                                {{ $todaysExpense ? $todaysExpense->sum('price') : '0.00' }} &#8377; </h5>
                        </h6>
                        <p class="card-text">Details:</p>
                        <ul class="list-group">
                            @forelse($todaysExpense as $expense)
                                <li class="list-group-item glassmorphism mt-2">{{ $expense->description }}:
                                    {{ number_format($expense->price, 2) }}
                                    &#8377;</li>
                            @empty
                                <li class="list-group-item glassmorphism">No Expense for Today</li>
                            @endforelse
                        </ul>
                    </div>
                </div>


                <div class="card glassmorphism mb-3 ms-2" style="max-width: 14rem;">
                    <div class="card-body">
                        <h6 class="card-title">Last 7 Days Expense: <h5 style="color: rgb(198, 0, 0)">
                                {{ $weeklyExpense ? $weeklyExpense->sum('price') : '0.00' }} &#8377; </h5>
                        </h6>
                        <p class="card-text">Details:</p>
                        <ul class="list-group">
                            @for ($i = 0; $i < min(count($weeklyExpense), 2); $i++)
                                <li class="list-group-item glassmorphism mt-2">{{ $weeklyExpense[$i]->description }}:
                                    {{ number_format($weeklyExpense[$i]->price, 2) }} &#8377;</li>
                            @endfor
                            @if (count($weeklyExpense) > 2)
                                <a href="/expense" class="pt-2">See More</a>
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="card glassmorphism mb-3 ms-2" style="max-width: 14rem;">
                    <div class="card-body">
                        <h6 class="card-title">Last 30 Days Expense: <h5 style="color:rgb(198, 0, 0)">
                                {{ $monthlyExpense ? $monthlyExpense->sum('price') : '0.00' }} &#8377; </h5>
                        </h6>
                        <p>Details:</p>
                        <ul class="list-group">
                            @for ($i = 0; $i < min(count($monthlyExpense), 2); $i++)
                                <li class="list-group-item glassmorphism mt-2">{{ $monthlyExpense[$i]->description }}:
                                    {{ number_format($monthlyExpense[$i]->price, 2) }} &#8377;</li>
                            @endfor
                            @if (count($monthlyExpense) > 2)
                                <a href="/expense" class="pt-2">See More</a>
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="card glassmorphism mb-3 ms-2" style="max-width: 14rem;">
                    <div class="card-body">
                        <h6 class="card-title">Yearly Expenses: <h5 style="color: rgb(198, 0, 0)">
                                {{ $yearlyExpense ? $yearlyExpense->sum('price') : '0.00' }} &#8377; </h5>
                        </h6>
                        <p>Details:</p>
                        <ul class="list-group">
                            @for ($i = 0; $i < min(count($yearlyExpense), 2); $i++)
                                <li class="list-group-item glassmorphism mt-2">{{ $yearlyExpense[$i]->description }}:
                                    {{ number_format($yearlyExpense[$i]->price, 2) }} &#8377;</li>
                            @endfor
                            @if (count($yearlyExpense) > 2)
                                <a href="/expense" class="pt-2">See More</a>
                            @endif
                        </ul>
                    </div>
                </div>
            </section>
        </section>

        {{-- 
<section class="container justify-content-center text-center mt-5 p-4 ratio-container" style="height: 70vh;">
    <div class="row">
        <div class="col">
            <h1 class="mb-4">Income Expense Ratio</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <canvas id="ratioChart"></canvas>
        </div>
    </div>
</section> --}}




        @if (@isset($incomeCategory, $expenseCategory))

            <section class="container justify-content-center text-center p-4 my-5 ratio-container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <h3 class="text-center mb-4">Categorized Income Chart</h3>
                        <div class="chart-container">
                            <canvas id="categorizedIncomeChart"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <h3 class="text-center mb-4">Income Expense Ratio</h3>
                        <div class="chart-container">
                            <canvas id="ratioChart"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <h3 class="text-center mb-4">Categorized Expense Chart</h3>
                        <div class="chart-container">
                            <canvas id="categorizedExpenseChart"></canvas>
                        </div>
                    </div>
                </div>
            </section>


            <script>
                // Income Chart

                const incomeData = @json($incomeCategory);
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
                const expenseData = @json($expenseCategory);
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
            </script>
        @else
            <h4>No Income and Expense data available</h4>
        @endisset



        <script>
            const income = {{ $income_ratio }};
            const expense = {{ $expense_ratio }};
            const ratio = (expense / income) * 100;
            const ctx = document.getElementById('ratioChart').getContext('2d');

            const ratioChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Income ', 'Expense'],
                    datasets: [{
                        label: 'Income vs Expense Ratio',
                        data: [income, expense],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    title: {
                        display: true,
                        text: 'Income vs Expense Ratio'
                    },
                }
            });
        </script>

</body>
@endsection
