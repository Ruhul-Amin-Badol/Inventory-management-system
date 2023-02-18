@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
<!-- /.content-header -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Product</h1>
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
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="bootstrap-data-table-panel">
                                <div class="table-responsive">
                                    <a href="{{ url('product/create') }}"class="btn btn-primary mb-3">Add Product </a>
                                    <table id="example1"
                                        class="table table-striped table-bordered table-centre">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Product Name</th>
                                                <th>Product Code</th>
                                                <th>Category Name</th>
                                                <th>Sub Category Name</th>
                                                <th>Product Rate</th>
                                                <th>Stock Balance</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($prdcpass as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->productName}}</td>
                                                <td>{{ $item->productCode }}</td>
                                                <td>{{ $item->catagoryName }}</td>
                                                <td>{{ $item->subCatagoryName }}</td>
                                                <td>{{ $item->productRate }}</td>
                                                <td>{{ $item->stockBalance }}</td>
                                                <td>
                                                    <a href="{{ url('/product/'.$item->id.'/edit') }}" class="btn btn-info">
                                                    <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <form action="{{ url('/product/'.$item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fa-sharp fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <!-- /# column -->
                </div>
            </section>
        </div>
    </div>
</div>
@endsection


