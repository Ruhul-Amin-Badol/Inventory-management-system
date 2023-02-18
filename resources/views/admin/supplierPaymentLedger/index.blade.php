@extends('layouts.master')
@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <!-- /# column -->
                    <div class="col-lg-12 p-l-0 title-margin-left">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Supplier Ledger Report</li>
                        </ol>
                    </div>
                    <!-- /# column -->
                </div>
                <div class="row card p-2">
                    <form action="{{ url('supplierPaymentLedger') }}" method="POST">
                        @csrf
                        <div class="col-3"></div>
                        <div class="col-6 p-2">
                            <select class="form-select " name="supID" id="supID" required>
                                <option value="" selected>Select Supplier to see Data</option>
                                @foreach ($supplier as $item)
                                    <option value="{{ $item->id }}">{{ $item->supplierName }}</option>
                                @endforeach
                            </select>
                            <br>
                            <br>
                            <button class="btn btn-sm btn-danger" type="submit">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>                
            </div>
        </div>
    </div>
@endsection
