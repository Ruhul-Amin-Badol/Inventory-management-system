@extends('layouts.master')

@section('content')
<div class="container-fluid">
  <div class="container">
    <div class="card mt-3">
      <div class="card-body">
    <form class="row g-3" method="post" action="{{url('supplier')}}">
        @csrf
        <div class="col-md-4">
          <label for="inputEmail4" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter Supplier Name">
        </div>
        <div class="col-md-4">
          <label for="inputPassword4" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter Supplier Email ">
        </div>
        <div class="col-md-4">
            <label for="inputPassword4" class="form-label">Phone</label>
            <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter Supplier Phone">
          </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Address</label>
          <input type="text" class="form-control" id="address" name="address" placeholder="Enter Supplier Address">
        </div>
        <div class="col-12">
          <label for="inputAddress2" class="form-label">Note</label>
          <input type="text" class="form-control" id="note" name="note"placeholder="Something Write ...">
        </div>
        <div class="col-md-4">
          <label for="inputCity" class="form-label">Previous Balance</label>
          <input type="number" class="form-control" id="prvbalance" name="prvbalance" placeholder="Tk.00">
        </div>
        <div class="col-md-4">
            <label for="inputCity" class="form-label">Current Balance</label>
            <input type="number" class="form-control" id="curbalance" name="curbalance" placeholder="Tk.00">
          </div>

        <div class="col-12">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
      </div>
      </div>
    </div>
</div>


 @endsection
          <!-- ============================================================== -->
          <!-- End Container fluid  -->
          <!-- ============================================================== -->
