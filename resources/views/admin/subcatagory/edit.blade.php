@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
<!-- /.content-header -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Edit Catagory</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="content-wrap">
<div class="main">
<div class="container-fluid">
    <!-- /# column -->
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ url('subcatagory/'.$subcatagory->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            {{-- <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" class="form-control" name="catagoryId" id="catagoryId" placeholder="Category Name" value="{{ $subcatagory->catagoryID }}">
                            </div> --}}
                            {{-- <div class="form-group">
                                <label>Catagory Name</label>
                                <select class="form-control" name="catagoryId" id="catagoryId" placeholder="Catagory Name" value="">
                                    <option value="">Select-Catagory</option>
                                    @foreach ($catagories as $cat)
                                    @if ($cat->id==$subcatagory->id)
                                    <option selected value="{{ $cat->id}}">{{ $cat->catagoryName}}</option>
                                    @else
                                    <option value="{{ $cat->id}}">{{ $cat->catagoryName}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="form-group">
                                <label>Catagory Name</label>
                                <select class="form-control" name="catagoryID" id="catagoryID" value="">
                                    <option value="">Select-Catagory</option>
                                    @foreach ($catagory as $cat)
                                        <option value="{{ $cat->id}}">{{ $cat->catagoryName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sub Category Name</label>
                                <input type="text" class="form-control" name="subCatagoryName" id="subCatagoryName" placeholder="Sub Category Name" value="{{ $subcatagory->subCatagoryName }}">
                            </div>
                            <div class="form-group">
                                <label>Sub Category Code</label>
                                <input type="text" class="form-control" id="subCatagoryCode" name="subCatagoryCode" placeholder="Sub Catagory Code" value="{{ $subcatagory->subCatagoryCode }}">
                            </div>
                            <input type="submit" class="btn btn-outline-primary ml-2 mt-3" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <div ></div>
</div>
</div>
@endsection
