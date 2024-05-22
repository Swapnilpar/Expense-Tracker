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
      <h4 class="mt-5">Expense Overview</h4>
      <!-- Visualization of budget and expense ratio -->
      <div class="mb-3" style="border: 3px solid red; height:40px;">
        <!-- Placeholder for visualization -->
      </div>
        <p>Remaining Budget: {{$AmountRemaining ?? ''}}</p>
        <div class="table-responsive ">
            <table class="table ">
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
                        <td>{{ $expense->price }}</td>
                        <td>{{ $expense->date }}</td>
                    </tr>
                    @endforeach
                    @else
                            <tr>
                                <td>No data available</td>
                            </tr> 
                    @endisset
                </tbody>
            </table>
        </div>
    </div>

    <!-- Right Section -->
    <div class="col-md-8 rightsidebar bg-yellow p-4 text-black">
      <div class="container mt-5">
        <div class="row justify-content-center">
            @if (Session::get('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif

            @if (Session::get('error'))
            <div class="alert alert-danger">
                {{Session::get('error')}}
            </div>
            @endif

            <div class="col-md-8 text-center">
                <h1 class="display-4 mb-4">Budget Tracking</h1>
                <h4 class="mb-4">Track and manage your expenses with ease</h4>
                <button class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#setBudgetModal">Set Budget</button>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Set Budget Modal -->
<div class="modal fade" id="setBudgetModal" tabindex="-1" aria-labelledby="setBudgetModalLabel" aria-hidden="true">
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

</body>

@endsection
