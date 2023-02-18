@extends('layouts.master')
@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <!-- /# column -->
                {{-- <div class="row">
                    <div class="col-lg-12 p-l-0 m-l-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Customer Payment</li>
                        </ol>
                    </div>
                </div> --}}
                <!-- /# column -->
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-title">
                                <h4>Customer Payment List</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form class="forms-sample" action="{{ url('customerPaymentList') }}"
                                        method="POST">
                                        @csrf
                                        <input type="hidden" name="cusID" id="cusID" value="0">
                                        <div class="row">
                                            <div class="form-group col">
                                                <label>Customer Name</label>
                                                <select
                                                    class="form-control @error('customerID') is-invalid
                                                    @enderror"
                                                    name="customerName" id="customerName" value="{{ old('customerName') }}">
                                                    @error('customerID')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <option selected>Open this select menu</option>
                                                    @foreach ($custpayment as $custpayment)
                                                        <option value="{{ $custpayment->customerName }}" id="{{ $custpayment->id }}">
                                                            {{ $custpayment->customerName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col">
                                                <label>Payment Date</label>
                                                <input type="date"
                                                    class="form-control datepicker"
                                                    name="paymentDate" placeholder="dd-mm-yyyy"
                                                    value="{{ old('paymentDate') }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Note</label>
                                            <input type="text"
                                                class="form-control @error('note') is-invalid

                                            @enderror"
                                                name="note" placeholder="Note" value="{{ old('note') }}">
                                            @error('note')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="form-group col">
                                                <label>Transaction Method</label>
                                                <input type="text"
                                                    class="form-control @error('transactionMethod') is-invalid

                                            @enderror"
                                                    name="transactionMethod" placeholder="Transaction Method"
                                                    value="{{ old('transactionMethod') }}">
                                                @error('transactionMethod')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>

                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group col">
                                                <label>Payment Ammount</label>
                                                <input type="number"
                                                    class="form-control @error('paymentAmount') is-invalid
                                            @enderror"
                                                    name="paymentAmount" placeholder="0.00"
                                                    value="{{ old('paymentAmount') }}">
                                                @error('paymentAmount')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-outline-primary ml-2 mt-3">SUBMIT</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /# row -->
@endsection

@section('script')
    <script type="text/javascript">
        $("#customerName").change(function() {
            var optID = $('#customerName').find("option:selected").attr('id');
            $('#cusID').val(optID);
            alert(optID);
        })
    </script>
@endsection
