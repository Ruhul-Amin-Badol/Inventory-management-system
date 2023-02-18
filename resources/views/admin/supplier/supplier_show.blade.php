@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Supplier</h5>
      <div class="table-responsive">
        <table
          id="zero_config"
          class="table table-striped table-bordered"
        >
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Note</th>
              <th>PrevBalance</th>
              <th>Current Balance</th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td>{{$supshow->supplierName}}</td>
              <td>{{$supshow->supplierEmail}}</td>
              <td>{{$supshow->supplierPhone}}</td>
              <td>{{$supshow->supplierAddress}}</td>
              <td>{{$supshow->note}}</td>
              <td>{{$supshow->supplierprevioustBalance}}</td>
              <td>{{$supshow->supplierCurrentBalance}}</td>

            </tr>
          </tbody>
          <tfoot>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Note</th>
              <th>PrevBalance</th>
              <th>Current Balance</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>

 @endsection
          <!-- ============================================================== -->
          <!-- End Container fluid  -->
          <!-- ============================================================== -->
