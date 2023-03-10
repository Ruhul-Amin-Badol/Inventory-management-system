@extends('layouts.master')
@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <!-- /# column -->
                    {{-- <div class="col-lg-12 p-l-0 title-margin-left">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Payment manage</li>
                        </ol>
                    </div> --}}
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <a
                                            href="{{ url('customerPaymentList/create') }}"class="btn btn-primary mb-3">Customer
                                            Payment</a>
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Customer Name</th>
                                                    <th>Payment Date</th>
                                                    <th>Transaction Method</th>
                                                    <th>Customer Prev Blnc</th>
                                                    <th>Payment Amount</th>
                                                    <th>Dues Amount</th>
                                                    <th>Customer Currnt Blnc</th>
                                                    <th>Note</th>
                                                    {{-- <th>Action</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($custpayment as $customerPayment)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $customerPayment->customerName }}</td>
                                                        <td>{{ $customerPayment->paymentDate }}</td>
                                                        <td>{{ $customerPayment->transactionMethod }}</td>
                                                        <td>{{ $customerPayment->custoPrevBalance }} ???</td>
                                                        <td>{{ $customerPayment->paymentAmount }} ???</td>
                                                        <td><a target="blank"
                                                            href="{{ url('salesinvoice/'.$customerPayment->invoice_id) }}">(Ref-INV)
                                                            </a>{{ $customerPayment->duesAmount }} ???</td>
                                                        <td>{{ $customerPayment->customerCurrentBalance }} ???</td>
                                                        <td>{{ $customerPayment->note }}</td>
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
            </div>
        </div>
    </div>
@endsection
