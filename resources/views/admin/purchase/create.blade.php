@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
<!-- /.content-header -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h4 class="m-0">Product Stock Invoice</h4>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
                <!-- /# column -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ url('purchase') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="rowlenth" id="rowlenth" value="1">
                                        <input type="hidden" name="pid" id="invoice_id" value="1">
                                        <input type="hidden" name="supplierID" id="supplierID" value="0">
                                        <input type="hidden" name="incriment" id="incriment" value="0">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Invoice Number</label>
                                                    <input type="text" class="form-control" name="invNumber" placeholder="000AX" value="{{ old('invNumber') }}">
                                                </div>
                                            </div>
                                            <div class="form-group col">
                                                <label>Select Supplier</label>
                                                <select class="form-control" id="supplierName" name="supplierName" onchange="prodAdd()">
                                                    <option value="" selected>Select Supplier</option>
                                                    @foreach ($supplier as $supplier)
                                                    <option value="{{ $supplier->supplierName }}" id="{{ $supplier->id }}">{{ $supplier->supplierName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col">
                                                <label>Purchase Date</label>
                                                <input type="date" class="form-control" name="purchaseDate" placeholder="dd-mm-yyyy" value="{{ old('purchaseDate') }}">
                                            </div>
                                        </div>
                                        <div class="extra-row" id="appendRow">
                                            <div class="row mt-3">
                                                <div class="col-1">
                                                    <button type="button" class="btn btn-sm btn-outline-dark addRow" style="margin-top: 34px"><i class="fa-solid fa-plus"></i></button>
                                                </div>
                                                <div class="form-group col">
                                                    <label>Product Code</label>
                                                    <input type="text" class="form-control " name="prodCode[]" id="prodCode1" onkeyup="prodCode(1)" placeholder="000abc" required>
                                                </div>
                                                <div class="form-group col">
                                                    <label>Product Name</label>
                                                    <select class="form-control prodName" name="productID[]" id="prodName1" onchange="prodAdd(1)" required>
                                                        <option value="" id="1" selected>select product</option>
                                                        @foreach ($product as $products)
                                                            <option value="{{ $products->id }}" id="{{ $products->id }}">{{ $products->productName }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="form-group col">
                                                    <label>Product QTY</label>
                                                    <input type="number" class="form-control" name="prodQty[]" id="prodQTY1" onkeyup="parchaseCal(1)" placeholder="Product QTY" required>
                                                </div>
                                                <div class="form-group col">
                                                    <label>Product Rate</label>
                                                    <input type="number" class="form-control" name="prodRate[]" id="prodRate1" onkeyup="parchaseCal(1)" placeholder="0.00">
                                                </div>
                                                <div class="form-group col">
                                                    <label>Total Price</label>
                                                    <input type="number" class="form-control totCount" name="totalPrice[]" id="totalPrice1" placeholder="Total Price">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group col">
                                                    <label>Transection Method</label>
                                                    <input type="text" class="form-control" name="transactionMethod" id="transactionMethod" placeholder="Transection Method">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group col">
                                                    <label>Note</label>
                                                    <input type="text" class="form-control" name="note" id="note" placeholder="Note About Transection">
                                                </div>
                                            </div>
                                            <div class="form-group col">
                                                <label>Grand Total</label>
                                                <input type="number" class="form-control" name="grandTotal" id="grandTot" onkeyup="parchaseCal()" placeholder="Grand Total">
                                            </div>
                                            <div class="form-group col">
                                                <label>Paid Amount</label>
                                                <input type="number" class="form-control" name="paidAmount" id="paidAmount" onkeyup="parchaseCal()" placeholder="0.00">
                                            </div>
                                            <div class="form-group col">
                                                <label>Dues Amunt</label>
                                                <input type="number" class="form-control" name="duesAmount" id="duesAmount" placeholder="Dues Amount">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-outline-primary ml-2 mt-3">SUBMIT</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <!-- /# row -->

@endsection

@section('script')
<script type="text/javascript">
//==========================================
//       Purchase Form Append
//==========================================


$('.addRow').click(function(){
    var i=1;
    var rowlen = parseInt($('#rowlenth').val());
    i+=rowlen;
    var row = '<div class="row mt-3" id="deleteRow'+i+'">'
        row+= '<div class="col-1">'
        row+= '<button type="button" class="btn btn-sm btn-outline-danger" id="delRow'+i+'" onclick="rowDelete('+i+')" onchange="catProd('+i+')" style="margin-top: 34px"><i class="fa-solid fa-minus"></i></button>'
        row+= '</div>'
        row+= '<div class="form-group col">'
        row+= '<label>Product Code</label>'
        row+= '<input type="number" class="form-control" name="prodCode[]" id="prodCode'+i+'" onkeyup="prodCode('+i+')" placeholder="Product Code">'
        row+= '</div>'
        row+= '<div class="form-group col">'
        row+= '<label>Product Name</label>'
        row+= '<select class="form-control" name="productID[]" id="prodName'+i+'" onchange="prodAdd('+i+')">'

        row+= '<option value="1" selected>select product</option>'
        row+= '@foreach ($product as $products)'
        row+= '<option value="{{ $products->id }}" id="{{ $products->id }}">{{ $products->productName }}</option>'
        row+= '@endforeach'
        row+= '</select>'
        row+= '</div>'
        row+= '<div class="form-group col">'
        row+= '<label>Product QTY</label>'
        row+= '<input type="number" class="form-control" name="prodQty[]" id="prodQTY'+i+'" onkeyup="parchaseCal('+i+')" placeholder="Product QTY">'
        row+= '</div>'
        row+= '<div class="form-group col">'
        row+= '<label>Product Rate</label>'
        row+= '<input type="number" class="form-control" name="prodRate[]" id="prodRate'+i+'" onkeyup="parchaseCal('+i+')" placeholder="Product Rate">'
        row+= '</div>'
        row+= '<div class="form-group col">'
        row+= '<label>Total Price</label>'
        row+= '<input type="number" class="form-control totCount" name="totalPrice[]" id="totalPrice'+i+'" placeholder="Total Price">'
        row+= '</div>'
        row+= '</div>';

        $('#appendRow').append(row);
        $('#rowlenth').val(i);
        i++;
})

function rowDelete(id){
    $('#deleteRow'+id).remove()
}

function prodAdd(id){


    var supID = $('#supplierName').find("option:selected").attr('id');
                $('#supplierID').val(supID);
    var optID = $('#prodName'+id).find("option:selected").attr('id');
        if (optID)
        {
            $.ajax(
                    {
                        url: "{{ url('/purchase_pro_data') }}/"+optID,
                        type: "GET",
                        cache: false,
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                                $.each(data, function(key, value) {
                                    $('#prodCode'+id).val(value.productCode);
                                    $('#prodRate'+id).val(value.productRate);
                                });
                            }
                    }
                );
        }

}

// function prodCode(id){
//     var prodCod = $('#prodCode'+id).val();
//     if (prodCod) {
//             $.ajax({
//                 url: "{{ url('/authorized/purchase-data2') }}/"+prodCod,
//                 type: "GET",
//                 cache: false,
//                 dataType: "json",
//                 success: function(data) {
//                     var output = '<option value="" id="">Select Product</option>';
//                     for(var i = 0; i < data.length; i++)
//                     {
//                     output += '<option selected value="'+data[i].id+'" id="'+data[i].id+'">'+data[i].productName+'</option>';
//                     }
//                     $('#prodName'+id).html(output);

//                     $.each(data, function(key, value) {
//                         $('#prodRate'+id).val(value.prodRate);
//                     })

//                 }
//             });
//         }
// }


function parchaseCal(id){
    var prodQty = $('#prodQTY'+id).val();
    var prodRate = $('#prodRate'+id).val();
    var total = (prodQty*prodRate);
        $('#totalPrice'+id).val(total);

        var allTotal = 0;
        $('.totCount').each(function(){
            var get_value = $(this).val();
            if($.isNumeric(get_value)){
                allTotal += parseInt(get_value);
            }
        });
        $('#grandTot').val(allTotal);

        var grandVal = $('#grandTot').val();
        var paidA = $('#paidAmount').val();

        if(grandVal != paidA){
            var dues = grandVal - paidA;
            $('#duesAmount').val(dues);
        } else{
            $('#duesAmount').val(0);
        }
}
</script>
@endsection
