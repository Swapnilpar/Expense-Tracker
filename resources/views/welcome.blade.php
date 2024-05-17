<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    @include('navbar')
</head>

<body>
    <h1 class="text-center m-0 p-0">Income Overview</h1>
    {{-- <section class="dashboard-income p-5 d-flex">
        <div class="card ms-2" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
        <div class="card ms-2" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
        <div class="card ms-2" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
        <div class="card ms-2" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    </section>
    
    <section class="dashboard-expense ps-5 d-flex">
        <div class="card ms-2" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
        <div class="card ms-2" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
        <div class="card ms-2" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
        <div class="card ms-2" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    </section>
      --}}

    <section class="dashboard-income p-3 d-flex justify-content-center flex-wrap">

        {{-- Todays Income --}}
        <div class="card mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <h6 class="card-title">Today's Income: <h5 style="color: green">
                        {{ $todayIncome ? $todayIncome->sum('price') : '0.00' }} &#8377; </h5>
                </h6>
                <p class="card-text">Details:</p>
                <ul class="list-group">
                    @forelse($todayIncome as $income)
                        <li class="list-group-item">{{ $income->description }}: {{ number_format($income->price, 2) }}
                            &#8377;</li>
                    @empty
                        <li class="list-group-item">No Income for Today</li>
                    @endforelse
                </ul>
            </div>
        </div>


        {{-- Weekly Income  --}}
        <div class="card mb-3 ms-2" style="max-width: 18rem;">
            <div class="card-body">
                <h6 class="card-title">Last 7 Days Income: <h5 style="color: green">
                        {{ $weeklyIncome ? $weeklyIncome->sum('price') : '0.00' }} &#8377; </h5>
                </h6>
                <p class="card-text">Details:</p>
                <ul class="list-group">
                    @for ($i = 0; $i < min(count($weeklyIncome), 2); $i++)
                        <li class="list-group-item">{{ $weeklyIncome[$i]->description }}:
                            {{ number_format($weeklyIncome[$i]->price, 2) }} &#8377;</li>
                    @endfor
                    @if (count($weeklyIncome) > 2)
                        <a href="/income" class="pt-2">See More</a>
                    @endif
                </ul>
            </div>
        </div>


        {{-- Monthly Income  --}}
        <div class="card mb-3 ms-2" style="max-width: 18rem;">
            <div class="card-body">
                <h6 class="card-title">Last 30 Days Income: <h5 style="color: green">
                        {{ $monthlyIncomes ? $monthlyIncomes->sum('price') : '0.00' }} &#8377; </h5>
                </h6>
                <p>Details:</p>
                <ul class="list-group">
                    @for ($i = 0; $i < min(count($monthlyIncomes), 2); $i++)
                        <li class="list-group-item">{{ $monthlyIncomes[$i]->description }}:
                            {{ number_format($monthlyIncomes[$i]->price, 2) }} &#8377;</li>
                    @endfor
                    @if (count($monthlyIncomes) > 2)
                        <a href="/income" class="pt-2">See More</a>
                    @endif
                </ul>
            </div>
        </div>

        {{-- Yearly Income  --}}
        <div class="card mb-3 ms-2" style="max-width: 18rem;">
            <div class="card-body">
                 <h6 class="card-title">Yearly Income: <h5 style="color: green">
                        {{ $yearlyIncome ? $yearlyIncome->sum('price') : '0.00' }} &#8377; </h5>
                </h6>
                <p>Details:</p>
                <ul class="list-group">
                    @for ($i = 0; $i < min(count($yearlyIncome), 2); $i++)
                        <li class="list-group-item">{{ $yearlyIncome[$i]->description }}:
                            {{ number_format($yearlyIncome[$i]->price, 2) }} &#8377;</li>
                    @endfor
                    @if (count($yearlyIncome) > 2)
                        <a href="/income" class="pt-2">See More</a>
                    @endif
                </ul>
            </div>
        </div>
    </section>

    <h1 class="text-center m-0 p-0">Expense Overview</h1>


    <section class="dashboard-expense p-3 d-flex justify-content-center flex-wrap">

        {{-- Todays Expense  --}}
        <div class="card mb-3" style="max-width: 18rem;">
            <div class="card-body">
                 <h6 class="card-title">Today's Expense: <h5 style="color: rgb(198, 0, 0)">
                        {{ $todaysExpense ? $todaysExpense->sum('price') : '0.00' }} &#8377; </h5>
                </h6>
                <p class="card-text">Details:</p>
                <ul class="list-group">
                    @forelse($todaysExpense as $expense)
                        <li class="list-group-item">{{ $expense->description }}: {{ number_format($expense->price, 2) }}
                            &#8377;</li>
                    @empty
                        <li class="list-group-item">No Expense for Today</li>
                    @endforelse
                </ul>
            </div>
        </div>

        {{-- Weekly Expense  --}}

        <div class="card mb-3 ms-2" style="max-width: 18rem;">
            <div class="card-body">
                <h6 class="card-title">Last 7 Days Expense: <h5 style="color: rgb(198, 0, 0)">
                        {{ $weeklyExpense ? $weeklyExpense->sum('price') : '0.00' }} &#8377; </h5>
                </h6>
                <p class="card-text">Details:</p>
                <ul class="list-group">
                    @for ($i = 0; $i < min(count($weeklyExpense), 2); $i++)
                        <li class="list-group-item">{{ $weeklyExpense[$i]->description }}:
                            {{ number_format($weeklyExpense[$i]->price, 2) }} &#8377;</li>
                    @endfor
                    @if (count($weeklyExpense) > 2)
                        <a href="/expense" class="pt-2">See More</a>
                    @endif
                </ul>
            </div>
        </div>

{{-- Monthly Expense  --}}
        <div class="card mb-3 ms-2" style="max-width: 18rem;">
            <div class="card-body">
               <h6 class="card-title">Last 30 Days Expense: <h5 style="color:rgb(198, 0, 0)">
                        {{ $monthlyExpense ? $monthlyExpense->sum('price') : '0.00' }} &#8377; </h5>
                </h6>
                <p>Details:</p>
                <ul class="list-group">
                    @for ($i = 0; $i < min(count($monthlyExpense), 2); $i++)
                        <li class="list-group-item">{{ $monthlyExpense[$i]->description }}:
                            {{ number_format($monthlyExpense[$i]->price, 2) }} &#8377;</li>
                    @endfor
                    @if (count($monthlyExpense) > 2)
                        <a href="/expense" class="pt-2">See More</a>
                    @endif
                </ul>
            </div>
        </div>

        {{-- Yearly Expenses  --}}
        <div class="card mb-3 ms-2" style="max-width: 18rem;">
            <div class="card-body">
                <h6 class="card-title">Yearly Expenses: <h5 style="color: rgb(198, 0, 0)">
                        {{ $yearlyExpense ? $yearlyExpense->sum('price') : '0.00' }} &#8377; </h5>
                </h6>
                <p>Details:</p>
                <ul class="list-group">
                    @for ($i = 0; $i < min(count($yearlyExpense), 2); $i++)
                        <li class="list-group-item">{{ $yearlyExpense[$i]->description }}:
                            {{ number_format($yearlyExpense[$i]->price, 2) }} &#8377;</li>
                    @endfor
                    @if (count($yearlyExpense) > 2)
                        <a href="/expense" class="pt-2">See More</a>
                    @endif
                </ul>
            </div>
        </div>
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



   
    <script>
    const income = {{$income_ratio}};
    const expense = {{$expense_ratio}};
    const ratio = (expense / income) * 100;
    const ctx = document.getElementById('ratioChart').getContext('2d');

    const ratioChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Income', 'Expense'],
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
            }
        }
    });
</script>
</body>

</html>
