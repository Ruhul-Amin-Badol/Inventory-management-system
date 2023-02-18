@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
<!-- /.content-header -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Purchase</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /# row -->
<section id="main-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-1">
                <div class="bootstrap-data-table-panel m-1">
                    <div class="table-responsive">
                        <a href="{{ url('purchase/create') }}"class="btn btn-primary mb-3">Purchase Product</a>
                        <table id="example1" class="table table-striped table-bordered">
                            <thead>
                                <tr>

                                    <th>SL</th>
                                    {{-- <th>Product Name</th>
                                    <th>Product Code</th> --}}
                                    <th>Invoice Number</th>
                                    <th>Suplier Name</th>
                                    <th>Purchase Date</th>
                                    {{-- <th>Product QTY</th>
                                    <th>Product Rate</th>
                                    <th>Total Price</th> --}}
                                    <th>Grand Total</th>
                                    <th>Paid Ammount</th>
                                    <th>Dues Ammount</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td>{{ $data->productName }}</td>
                                        <td>{{ $data->prodCode }}</td> --}}
                                        <td>{{ $data->invNumber }}</td>
                                        <td>{{ $data->supplierName }}</td>
                                        <td>{{ $data->purchaseDate }}</td>
                                        {{-- <td>{{ $data->prodQty }}</td>
                                        <td>{{ $data->prodRate }}</td>
                                        <td>{{ $data->totalPrice }} ৳</td> --}}
                                        <td>{{ $data->grandTotal }}</td>
                                        <td>{{ $data->paidAmount }}</td>
                                        <td>{{ $data->duesAmount }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ url('purchaseInvoice/'.$data->purchaseSID) }}"
                                                    class="btn btn-default btn btn-success" target="_blank"><i
                                                        class="fa-solid fa-file-invoice"></i></a>
                                                <form action="{{ url('purchase/'.$data->purchaseSID) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger ml-1">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
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
    <!-- /# row -->
</section>
@endsection


