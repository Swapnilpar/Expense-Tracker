@extends('app')



@section('content')
    <div class="container mt-5">
    <h1 class="text-center mb-4">Track your Expenses here.</h1>

    @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::get('fail'))
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
    @endif

    <div class="row  mb-3">
        <div class="col-12 col-md-6 ">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addExpenseModal">Add
                Expense Source</button>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Expense Description</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Date</th>
                            <th scope="col">Delete Data</th>
                            <th scope="col">Update Data</th>

                        </tr>
                    </thead>
                    <tbody id="expenseTableBody">
                        @isset($expdata)
                            @foreach ($expdata as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>
                                        <a href="/expense/{{ $item->id }}" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
                                    </td>
                                      <td>
                                        <form action="/expense/update/{{$item->id}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="text" name="description" class="form-control" value="{{$item->description}}" required>
                                            <input type="number" name="price" class="form-control mt-2" value="{{$item->price}}" required>
                                            <input type="date" name="date" class="form-control mt-2" value="{{$item->date}}" required>
                                            <button type="submit" class="btn btn-sm btn-primary mt-2">Update</button>
                                        </form>
                                      </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">No data available</td>
                            </tr>

                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addExpenseModal" tabindex="-1" aria-labelledby="addExpenseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addExpenseModalLabel">Add Expense</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="expSource" class="form-label">Expense Source</label>
                        <input type="text" name="description" class="form-control" id="expenseSource" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Enter Price in Rupees</label>
                        <input type="number" name="price" class="form-control" id="price" required>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Enter Date</label>
                        <input type="date" name="date" class="form-control" id="date" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="add">Add Expense</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

