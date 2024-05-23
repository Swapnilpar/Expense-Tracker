@extends('app')

@section('content')
<style>
    .leftsidebar {
        min-height: 100vh;
        border-right: 2px solid black;
        border-top: 2px solid black;
    }
    .rightsidebar {
        border-top: 2px solid black;
    }
</style>

<body id="BudgetBody">
<div class="container-fluid">
  <div class="row">
    <!-- Left Section -->
    <div class="col-md-4 leftsidebar bg-light p-3">
      <h2 class="mt-3">Expense Overview :</h2>
      
      
      <!-- Visualization of budget and expense ratio -->
    

      <div class="budget-status my-3" >

        <h5>Budget Set: <h5 class="text-success">{{$budgetAmount ?? ''}}  &#8377; </h5> </h5>
        <h5>Remaining Budget: <h5 class="text-danger">{{$AmountRemaining ?? ''}}  &#8377; </h5> </h5>
        
      </div>

      @isset($alertMessage)
      <div class="alert alert-danger">
        {{$alertMessage}}
      </div>
      @endisset
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Description</th>
              <th scope="col">Price</th>
              <th scope="col">Date</th>
            </tr>
          </thead>
          <tbody>

            @isset($expenses)
              @foreach ($expenses as $expense)
                <tr>
                  <td>{{ $expense->id }}</td>
                  <td>{{ $expense->description }}</td>
                  <td class="text-danger">{{ $expense->price }}</td>
                  <td>{{ $expense->date }}</td>
                </tr>
              @endforeach
            @else
              <tr>
                <td colspan="4">No data available</td>
              </tr>
            @endisset
          </tbody>
        </table>
      </div>
    </div>

    <!-- Right Section -->
    
    <div class="col-md-8 rightsidebar bg-yellow p-4 text-black">
   
      <div class="container mt-3">
        <div class="row justify-content-center">
          @if (Session::get('success'))
            <div class="alert alert-success">
              {{ Session::get('success') }}
            </div>
          @endif

          @if (Session::get('error'))
            <div class="alert alert-danger">
              {{ Session::get('error') }}
            </div>
          @endif

          <div class="col-md-8 text-center" >
            <h1 class="display-4 mb-4"><b>Budget Tracking</b></h1> 
            <h4 class="mb-4">Track and manage your expenses with ease</h4>
            <button class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#setBudgetModal">Set Budget</button>
          </div>

          <div class="my-4">

            <div class="mb-3" style="height:40vh; display: flex; justify-content: center; align-items: center;">
              <canvas id="budgetExpenseChart"></canvas>
            </div>
            
          </div>
            
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Set Budget Modal -->
<div class="modal fade " id="setBudgetModal" tabindex="-1" aria-labelledby="setBudgetModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="setBudgetModalLabel">Set Budget</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('PostBudget') }}">
          @csrf
          <div class="mb-3">
            <label for="startDate" class="form-label">Start Date</label>
            <input type="date" class="form-control" name="startDate" id="startDate" required>
          </div>
          <div class="mb-3">
            <label for="endDate" class="form-label">End Date</label>
            <input type="date" class="form-control" name="endDate" id="endDate" required>
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Budget Amount</label>
            <input type="number" class="form-control" name="price" id="price" step="0.01" required>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    // Data for the chart
    const budgetAmount = {{ $budgetAmount }};
    const totalExpenses = {{ $sumofexpenses }};
    const remainingBudget = budgetAmount - totalExpenses;

    // Setup the chart data
    const data = {
        labels: ['Total Expenses', 'Remaining Budget'],
        datasets: [{
            label: 'Budget vs Expenses',
            data: [totalExpenses, remainingBudget],
            backgroundColor: ['#ff6384', '#36a2eb'],
            hoverOffset: 4
        }]
    };

    // Config for the chart
    const config = {
        type: 'bar',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            if (label) {
                                label += ': ';
                            }
                            label += new Intl.NumberFormat('en-US', {
                                style: 'currency',
                                currency: 'INR',
                            }).format(context.raw);
                            return label;
                        }
                    }
                }
            }
        }
    };

    // Render the chart
    window.onload = function() {
        const ctx = document.getElementById('budgetExpenseChart').getContext('2d');
        new Chart(ctx, config);
    };
</script>
</body>
@endsection
