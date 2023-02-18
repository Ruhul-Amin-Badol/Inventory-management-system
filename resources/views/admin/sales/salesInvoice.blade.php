<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Custom Style -->
    <link rel="stylesheet" href="{{ asset('dist\css\invcss\style.css') }}">

    <title>Invoice..!</title>
</head>

<body>
    <div class="my-5 page" size="A4">
        <div class="p-1">
            <section>
                <script>
                    function myprint()
                    {
                        window.print();
                    }
                    </script>
                    <div class="page-tools">
                        <div class="action-buttons">
                            <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print" onclick="myprint()">
                                <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                                Print
                            </a>
                        </div>
                    </div>
            </section>
            <section class="top-content bb d-flex justify-content-between">
                <div class="logo">

                    <img src="{{ asset('upload/'.$companyData->logo) }}" alt="logo" class="img-fluid"
                    width="160px">
                </div>
                <div class="top-left">
                    <p><strong>Invoice No:</strong>
                            {{ $purSFind->invNumber }}
                    </p>
                    <p><strong>Date:</strong>
                            {{ $purSFind->purchaseDate }}
                    </p>
                </div>
            </section>

            <section class="store-user mt-5">
                <div class="col-12">
                    <div class="row bb pb-3">
                        <div class="col-6">
                            <table>
                                <thead>
                                    <tr>
                                        <H4>{{ $companyData->companyName }}</H4>
                                    </tr>
                                    {{-- {{ $purFind }}
                                    {{ $purSFind }} --}}
                                </thead>
                                <tbody>

                                    <tr>
                                        <th>Mobile :</th>
                                        <td>{{ $companyData->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email :</th>
                                        <td>{{ $companyData->companyEmail }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address :</th>
                                        <td>{{ $companyData->address }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6">
                            <table>
                                <thead>
                                    <tr>
                                        <H5>
                                            {{ $supplier['customerName'] }}
                                        </H5>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Mobile :</th>
                                        <td>
                                            {{ $supplier['customerPhone'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Email :</th>
                                        <td>
                                            {{ $supplier['customerEmail'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Address :</th>
                                        <td>
                                            {{ $supplier['customerAddress'] }}
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <section class="product-area mt-4">
                <table class="table table-hover">
                    <thead class="text-bord">
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($purFind as $item)
                            <tr>
                                <td>
                                    <div class="media">

                                        <div class="media-body">
                                            <p class="mt-0 title">
                                                {{ $proName[$loop->iteration-1] }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $item->prodRate }} ৳</td>
                                <td>{{ $item->prodQty }}</td>
                                <td>{{ $item->totalPrice }} ৳</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>

            <section class="balance-info">
                <div class="row">
                    <div class="col-8">

                    </div>
                    <div class="col-4">
                        <table class="table border-0 table-hover">
                            <tfoot>
                                <tr>
                                    <td>Grand Total:</td>
                                    <td>
                                        {{ $purSFind->grandTotal }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Paid Amount:</td>
                                    <td>
                                        {{ $purSFind->paidAmount }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Dues Amount:</td>
                                    <td>
                                        {{ $purSFind->duesAmount }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                        <!-- Signature -->
                        <div class="col-12">
                            {{-- <img src="{{ asset('public/assets/images/invsignature.png') }}" class="img-fluid"
                                alt=""> --}}
                            <p class="text-center m-0"> Director Signature </p>
                        </div>
                    </div>
                </div>
            </section>
            <footer>
                <hr>
                <p class="m-0 text-center">
                    THANK YOU FOR YOUR SHOPPING.
                </p>

                <div class="social pt-3">
                    <span class="pr-2">
                        <i class="fas fa-mobile-alt"></i>
                        {{-- <span>{{ $companyData->phone }}</span> --}}
                    </span>
                    <span class="pr-2">
                        <i class="fas fa-envelope"></i>
                        {{-- <span>{{ $companyData->companyEmail }}</span> --}}
                    </span>
                    <span class="pr-2">
                        <i class="fab fa-facebook-f"></i>
                        <span>/facebook</span>
                    </span>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
