@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="container">
      <div class="card mt-3 ">
        <div class="card-body">
      <form class="row g-3" method="post" action="{{url('product/'.$proshow->id)}}">
          @csrf
          @method('PATCH')
          <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="productName" name="productName" value="{{ $proshow->productName}}" placeholder="Enter product Name">
          </div>
          <div class="col-md-12">
            <label for="inputPassword4" class="form-label">Product Code</label>
            <input type="text" class="form-control" id="productCode" name="productCode" value="{{ $proshow->productCode }}" placeholder="Enter product Code  ">
          </div>
          <div class="col-md-5">
              <label for="inputPassword4" class="form-label">Category Name</label>
              <select class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="catID" name="catID">
                    <option value="">Select-Catagory</option>
                    @foreach ($catagories as $cat)
                    @if($proshow->categoryId==$cat->id)
                        <option selected value="{{ $cat->id}}">{{ $cat->catagoryName}}</option>
                    @else
                        <option value="{{ $cat->id}}">{{ $cat->catagoryName}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            {{-- <div class="col-md-5">
              <label for="inputPassword4" class="form-label">Category Name</label>
              <select class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="catID" name="catID">
                    <option value="">Select-Catagory</option>
                    @foreach ($catagories as $cat)
                        <option value="{{ $cat->id}}">{{ $cat->catagoryName}}</option>
                    @endforeach
                </select>
            </div> --}}

            <div class="col-md-5">
              <label for="inputPassword4" class="form-label">Sub Category Name</label>
              <select class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example"  id="subCatID" name="subCatID">
                <option value="">Select-Catagory</option>
                @foreach ($subCatagoryName as $subCat)
                @if($proshow->subCategoryId==$subCat->id)
                    <option selected value="{{ $subCat->id}}">{{ $subCat->subCatagoryName}}</option>
                @else  
                    <option value="{{ $subCat->id}}">{{ $subCat->subCatagoryName}}</option>
                @endif
                @endforeach
            </select>
            </div>
            {{-- <div class="col-md-5">
              <label for="inputPassword4" class="form-label">Sub Category Name</label>
              <select class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="subCatID" name="subCatID">
                <option value="">Select-Catagory</option>
                @foreach ($subCatagoryName as $subCat)
                    <option value="{{ $subCat->id}}">{{ $subCat->subCatagoryName}}</option>
                @endforeach
            </select>
            </div> --}}
          <div class="col-5">
            <label for="inputAddress" class="form-label">Product Rate</label>
            <input type="number" class="form-control" id="productRate" name="productRate" value="{{ $proshow->productRate }}" placeholder="Tk.00">
          </div>
          <div class="col-5">
            <label for="inputAddress2" class="form-label">Stock Balance</label>
            <input type="number" class="form-control" id="stockBalance" name="stockBalance" value="{{ $proshow->stockBalance }}" placeholder="Tk.00">
          </div> 
          <div class="col-12">
            <button type="submit" class="btn btn-primary">update</button>
          </div>
        </form>
        </div>
        </div>
      </div>
  </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>


