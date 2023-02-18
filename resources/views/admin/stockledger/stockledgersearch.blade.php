@extends('layouts.master')
@section('content')
<div class="content-wrap">
<div class="main">
<div class="container-fluid">
    <div class="row">

        <div class="">
            <div class="input-group input-group-rounded">
                <form action="{{url('stockledgersearch')}}" method="POST">
                    @csrf
                    <div class="form-group ml-5">
                        <div class="row">
                            <select class="form-control col supplier_rec" name="category" id="categoryid"
                                style="width:200px">
                                <option value="Select Category" selected>Select Category</option>
                                @foreach ($category as $item)
                                    <option value="{{$item->id}}" id="">
                                        {{ $item->catagoryName}}</option>
                                @endforeach
                            </select>
                            <div class="form-group col">
                                <button class="btn btn-info weight ml-2" type="submit" name="search" id="search"
                                    style="padding-bottom: 5px;border-radius: 0px;">Search
                                </button>
                            </div>
                        </div>
                    </div>
                   
                </form>
                
            </div>
        </div>
    </div>
<section id="main-content ">
<div class="row">
<div class="col-lg-12 p-3">
    <div class="card p-3">
        <div class="bootstrap-data-table-panel">
            <div class="table-responsive">
                <div class="row">

                </div>

                <table id="" class="table table-striped table-bordered table-centre">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Product Name</th>
                            <th>Product Code</th>
                            <th>Product Rate</th>
                            <th>Stock Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $items)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $items->productName}}</td>
                                <td>{{ $items->productCode}}</td>
                                <td>{{ $items->productRate}}</td>
                                <td>{{ $items->stockBalance}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>Total:</b></td>
                            {{-- @foreach ($balance as $items) --}}
                            <td>
                                {{$total}}
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
