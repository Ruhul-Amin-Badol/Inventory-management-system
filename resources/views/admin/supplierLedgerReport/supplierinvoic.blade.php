
 {{-- invoice-link --}}
 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
 <link href="{{ asset('admin_assets')}}/dist/css/invoicecss.css" rel="stylesheet"/>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<div class="page-content container">
    <div class="page-header text-blue-d2">
        <h1 class="page-title text-secondary-d1">
            Invoice
            <small class="page-info">
                <i class="fa fa-angle-double-right text-80"></i>
                ID: #
            </small>
        </h1>

        <div class="page-tools">
            <div class="action-buttons">
                <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print" onclick="myprint()">
                    <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                    Print
                </a>
            </div>
        </div>
    </div>

    <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-12">
                <section class="top-content bb d-flex justify-content-between">
                    <div class="logo">
                        <img src="{{ asset('upload/'.$company->logo) }}"  alt="logo" class="img-fluid"
                        width="160px">
                    </div>
                    <div class="top-left">
                        <p><strong>Date:</strong>
                            {{ date('d-m-y') }}
                        </p>
                    </div>
                </section>

                <hr/>
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-borderless border-0 border-b-2 brc-default-l1">
                        <thead class="bg-none bgc-default-tp1">
                            <tr class="text-white">
                                <th class="opacity-2">SN</th>
                                <th>Supplier Name</th>
                                <th>Supplier Email</th>
                                <th>Supplier Phone</th>
                                <th width="140">Supplier Current Balance</th>
                            </tr>
                        </thead>

                        <tbody class="text-95 text-secondary-d3">
                            <tr></tr>
                            @foreach ($supplier as $supplier)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $supplier->supplierName }}</td>
                                <td>{{ $supplier->supplierEmail }}</td>
                                <td>{{ $supplier->supplierPhone }}</td>
                                <td>{{ $supplier->supplierCurrentBalance }} ৳</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>Total:</b></td>
                                <td>
                                    {{$balance}}৳
                                </td>
                            </tr>
                    </table>
                </div>

                <hr/>
                <div>
                    <span class="text-secondary-d1 text-105">Thank you for your business</span>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function myprint()
{
    window.print();
}
</script>
