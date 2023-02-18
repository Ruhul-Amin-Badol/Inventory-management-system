
@extends('layouts.master')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
<!-- /.content-header -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Customers</h1>
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
            <a href="{{ route('customer.create') }}"class="btn btn-primary mb-3"> Add Customer </a>

                <table id="example1" class="table table-striped table-bordered table-centre">
                    <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Customer Phone</th>
                                <th>Customer Address</th>
                                <th>Customer Previous Balance</th>
                                <th>Customer Current Balance</th>
                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($customer as $customers)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $customers->customerName }}</td>
                                <td>{{ $customers->customerEmail }}</td>
                                <td>{{ $customers->customerPhone }}</td>
                                <td>{{ $customers->customerAddress }}</td>
                                <td>{{ $customers->custoPrevBalance }} ৳</td>
                                <td>{{ $customers->customerCurrentBalance }} ৳</td>
                                <td>{{ $customers->note }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('customer.edit', ['customer' => $customers->id]) }}"
                                            class="btn btn-info"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <form
                                            action="{{ route('customer.destroy', ['customer' => $customers->id]) }}"
                                            method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-danger ml-1 delete-confirm"><i
                                                    class="fa-solid fa-trash-can"></i></button>
                                        </form>
                                    </div>
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


