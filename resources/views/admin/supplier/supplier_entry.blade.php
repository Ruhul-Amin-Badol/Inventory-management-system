@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
<!-- /.content-header -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Supplier</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="container-fluid m-1">
  <div class="container m-1">
<div class="card m-1">
        <table
        id="example1"
          class="table table-striped table-bordered"
        >
        <h3><a href="{{url('supplier/create')}}"><button class="btn btn-primary mx-2 mb-2 mt-2">Add new</button></a></h3>
          <thead>
            <tr>
              <th class="fw-bold">SN</th>
              <th class="fw-bold">Name</th>
              <th class="fw-bold">Email</th>
              <th class="fw-bold">Phone</th>
              <th class="fw-bold">Address</th>
              <th class="fw-bold">Note</th>
              <th class="fw-bold">PrevBalance</th>
              <th class="fw-bold">Current Balance</th>
              <th class="fw-bold">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($supplierpass as $supperson)


            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$supperson->supplierName}}</td>
              <td>{{$supperson->supplierEmail}}</td>
              <td>{{$supperson->supplierPhone}}</td>
              <td>{{$supperson->supplierAddress}}</td>
              <td>{{$supperson->note}}</td>
              <td>{{$supperson->supplierprevioustBalance}}</td>
              <td>{{$supperson->supplierCurrentBalance}}</td>
              <td>
                <a href="{{url('supplier/'.$supperson->id)}}"><button class="btn btn-info"><i class="fa-solid fa-eye"></i></button></a>
                <a href="{{url('supplier/'.$supperson->id.'/edit')}}"><button class="btn btn-success"><i class="fa-sharp fa-solid fa-pen-to-square"></i></button></a>
                <form action="{{url('supplier/'.$supperson->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                 <button class="btn btn-danger" type="submit"><i class="fa-sharp fa-solid fa-trash"></i></button>
               </form>
              </td>

            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>SN</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Note</th>
              <th>PrevBalance</th>
              <th>Current Balance</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
</div>


 @endsection
          <!-- ============================================================== -->
          <!-- End Container fluid  -->
          <!-- ============================================================== -->
