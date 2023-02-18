
@extends('layouts.master')
@section('content')
<div class="content-wrap">
<div class="main">
<div class="container-fluid">

<section id="main-content">
<div class="row">
<div class="col-lg-12">
    <div class="card">
        <div class="bootstrap-data-table-panel">
            <div class="table-responsive">
             <a href="{{url('customerinvoice')}}"class="btn btn-primary mb-3">print</a>
                <table id="example1" class="table table-striped table-bordered table-centre">
                    <thead>
                        <tr>
                            <th>Serial No</th>
                            <th>Customer Name</th>
                            <th>Customer Email</th>
                            <th>Customer Phone</th>
                            <th>Customer Address</th>
                            <th>Customer Current Balance</th>
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
                                <td>{{ $customers->customerCurrentBalance }} ৳</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>Total:</b></td>
                            {{-- @foreach ($balance as $items) --}}
                            <td>
                                {{$balance}}৳
                            </td>
                            {{-- @endforeach --}}
                        </tr>
                    </tfoot>
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


