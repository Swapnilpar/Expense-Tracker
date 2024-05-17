@include('navbar')
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script> --}}



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
                Expense</button>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            {{-- <th scope="col">Select</th> --}}
                            <th scope="col">ID</th>
                            <th scope="col">Expense Description</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Date</th>
                            <th scope="col">Actions</th>
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
                                        <a href="" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="/expense/{{ $item->id }}" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
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

{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        const addExpenseForm = document.getElementById('addExpenseForm');
        const expenseTableBody = document.getElementById('expenseTableBody');

        addExpenseForm.addEventListener('submit', function (event) {
            event.preventDefault();

            const expenseDescInput = document.getElementById('expenseDesc');
            const priceInput = document.getElementById('expensePrice');
            const dateInput = document.getElementById('expenseDate');

            const expenseDesc = expenseDescInput.value;
            const price = priceInput.value;
            const date = dateInput.value;

            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td><input type="checkbox"></td>
                <td>${expenseTableBody.children.length + 1}</td>
                <td>${expenseDesc}</td>
                <td>${price}</td>
                <td>${date}</td>
                <td>
                    <button class="btn btn-sm btn-warning">Edit</button>
                    <button class="btn btn-sm btn-danger">Delete</button>
                </td>
            `;

            expenseTableBody.appendChild(newRow);

            // Reset form fields
            expenseDescInput.value = '';
            priceInput.value = '';
            dateInput.value = '';

            // Close the modal
            const modal = new bootstrap.Modal(document.getElementById('addExpenseModal'));
            modal.hide();
        });
    });
</script> --}}
