@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
<!-- /.content-header -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Payment To Supplier</h1>
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
                        <div class="card p-2">
                            <div class="bootstrap-data-table-panel">
                                <div class="table-responsive">
                                    <a href="{{ url('SupplierPaymentList/create') }}"class="btn btn-primary ">Add Payment </a>
                                    <table id="example1"
                                        class="table table-striped table-bordered table-centre">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>supplierName</th>
                                                <th>paymentDate</th>
                                                <th>transactionMethod</th>
                                                <th>supplierPrevBalance</th>
                                                <th>paymentAmount</th>
                                                <th>duesAmount</th>
                                                <th>supplierCurrentBalance</th>
                                                <th>note</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($suppayment as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->supplierName }}</td>
                                                <td>{{ $item->paymentDate }}</td>
                                                <td>{{ $item->transactionMethod }}</td>
                                                <td>{{ $item->supplierPrevBalance }}</td>
                                                <td>{{ $item->paymentAmount }}</td>
                                                <td>{{ $item->duesAmount}}</td>
                                                <td>{{ $item->supplierCurrentBalance }}</td>
                                                <td>{{ $item->note }}</td>
                                                
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


