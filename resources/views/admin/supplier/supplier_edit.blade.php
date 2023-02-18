@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <form class="row g-3" method="POST" action="{{url('supplier/'.$supshow->id)}}">
        @csrf
        @method('PATCH')
        <div class="col-md-4">
          <label for="inputEmail4" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{$supshow->supplierName}}" placeholder="Enter Supplier Name">
        </div>
        <div class="col-md-4">
          <label for="inputPassword4" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{$supshow->supplierEmail}}"placeholder="Enter Supplier Email ">
        </div>
        <div class="col-md-4">
            <label for="inputPassword4" class="form-label">Phone</label>
            <input type="number" class="form-control" id="phone" name="phone" value="{{$supshow->supplierPhone}}" placeholder="Enter Supplier Phone">
          </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Address</label>
          <input type="text" class="form-control" id="address" name="address" value="{{$supshow->supplierAddress}}" placeholder="Enter Supplier Address">
        </div>
        <div class="col-12">
          <label for="inputAddress2" class="form-label">Note</label>
          <input type="text" class="form-control" id="note" value="{{$supshow->note}}" name="note"placeholder="Something Write ...">
        </div>
        <div class="col-md-4">
          <label for="inputCity" class="form-label">Previous Balance</label>
          <input type="number" class="form-control" id="prvbalance" value="{{$supshow->supplierprevioustBalance}}" name="prvbalance" placeholder="Tk.00">
        </div>
        <div class="col-md-4">
            <label for="inputCity" class="form-label">Current Balance</label>
            <input type="number" class="form-control" id="curbalance" value="{{$supshow->supplierCurrentBalance}}" name="curbalance" placeholder="Tk.00">
          </div>

        <div class="col-12">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
</div>


 @endsection
          <!-- ============================================================== -->
          <!-- End Container fluid  -->
          <!-- ============================================================== -->
