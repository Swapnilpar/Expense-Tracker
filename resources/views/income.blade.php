@include('navbar')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<body class="income-body">

    <div class="container mt-5">
        <h1 class="text-center mb-4">Track your income sources!</h1>
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

        <div class="row mb-3">
            <div class="col-12 col-md-6">
                <button class="btn btn-primary w-30" data-bs-toggle="modal" data-bs-target="#addIncomeModal">Add Income
                    Source</button>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Income Source</th>
                                <th scope="col">Price</th>
                                <th scope="col">Date</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="incomeTableBody">
                            @isset($data)
                            @foreach ($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->date }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
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



    <div class="modal fade" id="addIncomeModal" tabindex="-1" aria-labelledby="addIncomeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addIncomeModalLabel">Add Income Source</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="incomeSource" class="form-label">Income Source</label>
                            <input type="text" name="description" class="form-control" id="incomeSource" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Enter Price in Rupees</label>
                            <input type="number" name="price" class="form-control" id="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Enter Date</label>
                            <input type="date" name="date" class="form-control" id="date" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="add">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
