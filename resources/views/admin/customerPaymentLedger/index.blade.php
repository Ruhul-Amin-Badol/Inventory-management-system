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
                            <li class="breadcrumb-item active">Customer Ledger Report</li>
                        </ol>
                    </div>
                    <!-- /# column -->
                </div>
                <div class="row card p-2">
                    <form action="{{ url('customerPaymentLedger') }}" method="POST">
                        @csrf
                        <div class="col-3"></div>
                        <div class="col-6 p-2">
                            <select class="form-select " name="custID" id="custID" required>
                                <option value="" selected>Select Customer to see Data</option>
                                @foreach ($customer as $item)
                                    <option value="{{ $item->id }}">{{ $item->customerName }}</option>
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
