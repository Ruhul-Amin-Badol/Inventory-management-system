
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
             <a href="{{ url('supplierinvoic') }}"class="btn btn-primary mb-3">print</a>
                <table id="example1" class="table table-hover table-bordered table-centre">
                    <thead>
                        <tr>
                            <th>Serial No</th>
                            <th>Supplier Name</th>
                            <th>Supplier Email</th>
                            <th>Supplier Phone</th>
                            <th>Supplier Address</th>
                            <th>Supplier Current Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($supplier as $supplier)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $supplier->supplierName }}</td>
                                <td>{{ $supplier->supplierEmail }}</td>
                                <td>{{ $supplier->supplierPhone }}</td>
                                <td>{{ $supplier->supplierAddress }}</td>
                                <td>{{ $supplier->supplierCurrentBalance }} ৳</td>
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


