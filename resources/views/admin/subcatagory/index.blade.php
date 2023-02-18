@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
<!-- /.content-header -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Sub Catagories</h1>
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
                                    <a href="{{ url('subcatagory/create') }}"class="btn btn-primary mb-3">Add Sub Catagory </a>
                                    <table id="example1"
                                        class="table table-striped table-bordered table-centre">
                                        <thead>
                                            <tr>
                                                <th>Serial No</th>
                                                <th>Category Name</th>
                                                <th>Sub Category Name</th>
                                                <th>Sub Category Code</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @php
                                                $i =-1;
                                            @endphp --}}
                                            @foreach ($allSubCatagory as $item)
                                            {{-- @php
                                               $i++;
                                            @endphp --}}
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                {{-- <td>{{$catagoryNames[$i] }}</td> --}}
                                                <td>{{$item->catagoryName}}</td>
                                                <td>{{ $item->subCatagoryName }}</td>
                                                <td>{{ $item->subCatagoryCode }}</td>
                                                <td>
                                                    <a href="{{ url('/subcatagory/'.$item->id.'/edit') }}" class="btn btn-info">
                                                        <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <form action="{{ url('/subcatagory/'.$item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a type="submit" class="btn btn-danger">
                                                            <i class="fa-sharp fa-solid fa-trash"></i>
                                                        </a>
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


