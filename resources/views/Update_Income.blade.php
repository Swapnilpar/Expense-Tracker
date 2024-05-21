 {{-- @extends('app') --}}
 {{-- <form action="" method="POST">
    @csrf
                        <div class="mb-3">
                            <label for="incomeSource" class="form-label">Income Source</label>
                            <input type="text"  class="form-control" id="incomeSource" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Enter Price in Rupees</label>
                            <input type="number" name="price" class="form-control" id="price" step=0.01 required>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Enter Date</label>
                            <input type="date" name="date" class="form-control" id="date" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="add">Add</button>
  </form> --}}

  {{-- @section('content') --}}
      
  <div class="container" style="max-width: 30rem">

    <form action="" method="POST">
      @csrf
    <div class="form-group">
      <label for="updateSource">Source</label>
      <input type="text" name="{{$data->description}}" class="form-control" id="updateSource">
    </div>
    <div class="form-group">
      <label for="updatePrice">Price</label>
      <input type="number" class="form-control" name="{{$data->price}}" step=0.01 id="updatePrice">
    </div>
    <div class="form-group">
      <label for="updateDate">Date</label>
      <input type="date" class="form-control" name="{{$data->date}}" id="updateDate">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>


{{-- @endsection --}}
