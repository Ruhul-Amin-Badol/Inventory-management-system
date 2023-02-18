@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="container">
      <div class="card mt-3 ">
        <div class="card-body">
      <form class="row g-3" method="post" action="{{url('product')}}">
          @csrf
          <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="productName" name="productName" placeholder="Enter product Name">
          </div>
          <div class="col-md-12">
            <label for="inputPassword4" class="form-label">Product Code</label>
            <input type="text" class="form-control" id="productCode" name="productCode" placeholder="Enter product Code  ">
          </div>
          <div class="col-md-5">
              <label for="inputPassword4" class="form-label">Category Name</label>
              <select class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="catID" name="catID">
                    <option value="">Select-Catagory</option>
                    @foreach ($catagories as $cat)
                        <option value="{{ $cat->id}}">{{ $cat->catagoryName}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-5">
              <label for="inputPassword4" class="form-label">Sub Category Name</label>
              <select class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="subCatID" name="subCatID">
                <option value="">Select-Catagory</option>
                @foreach ($subCatagoryName as $subCat)
                    <option value="{{ $subCat->id}}">{{ $subCat->subCatagoryName}}</option>
                @endforeach
            </select>
            </div>
          <div class="col-5">
            <label for="inputAddress" class="form-label">Product Rate</label>
            <input type="number" class="form-control" id="productRate" name="productRate" placeholder="Tk.00">
          </div>
          <div class="col-5">
            <label for="inputAddress2" class="form-label">Stock Balance</label>
            <input type="number" class="form-control" id="stockBalance" name="stockBalance" placeholder="Tk.00">
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
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>


