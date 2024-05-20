

    @extends('app')
    @section('content')

    <section class="container summary-display">

    <h1 class="text-center">Income Overview</h1>
    <hr style="color: rgb(0, 89, 131)">
    <section class="dashboard-income p-3 d-flex justify-content-center flex-wrap">

        <div class="card glassmorphism mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <h6 class="card-title">Today's Income: <h5 style="color: green">
                        {{ $todayIncome ? $todayIncome->sum('price') : '0.00' }} &#8377; </h5>
                </h6>
                <p class="card-text">Details:</p>
                <ul class="list-group">
                    @forelse($todayIncome as $income)
                        <li class="list-group-item glassmorphism mt-2">{{ $income->description }}: {{ number_format($income->price, 2) }}
                            &#8377;</li>
                    @empty
                        <li class="list-group-item glassmorphism">No Income for Today</li>
                    @endforelse
                </ul>
            </div>
        </div>


        <div class="card glassmorphism mb-3 ms-3" style="max-width: 18rem;">
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


        <div class="card glassmorphism mb-3 ms-3" style="max-width: 18rem;">
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

        <div class="card glassmorphism mb-3 ms-3" style="max-width: 18rem;">
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



    <section class="container summary-display">
    <h1 class="text-center">Expense Overview</h1>
    <hr style="color: rgb(0, 89, 131)">


    <section class="dashboard-expense p-3 d-flex justify-content-center flex-wrap">

        <div class="card glassmorphism mb-3" style="max-width: 18rem;">
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


        <div class="card glassmorphism mb-3 ms-3" style="max-width: 18rem;">
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

        <div class="card glassmorphism mb-3 ms-3" style="max-width: 18rem;">
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

        <div class="card glassmorphism mb-3 ms-3" style="max-width: 18rem;">
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



    <section class="container justify-content-center text-center mt-5" style="height: 70vh;">
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
    </section>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

    @endsection

