@extends('layouts.default')

@section('title')
Add Sale @parent
@stop

@section('content')
<section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>Add Sale</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
</section>

<div class="content">
    <div class="card">
        <div class="card-header">
            <h5>Create New Sale</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('sales.store') }}" method="POST">
                @csrf
                <div class="row">

                
                <div class="form-group col-md-4">
                    <label for="member_id">Select Member</label>
                    <select id="member_id" name="member_id" class="form-control" required>
                        <option value="">Select Member</option>
                        @foreach($members as $member)
                        <option value="{{ $member->id }}">{{ $member->mem_name }}->{{ $member->branch_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="sale_date">Sale Date</label>
                    <input id="sale_date" type="date" value="{{ date('Y-m-d') }}" name="sale_date" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="payment_method">Payment Method</label>
                    <select id="payment_method" name="payment_method" class="form-control" required>
                        <option value="">Select Payment Method</option>
                        <option value="cash">Cash</option>
                        <option value="card">Card</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="status">Payment Status</label>
                    <select id="status" name="status" class="form-control" required>
                        <option value="">Select Status</option>
                        <option value="pending">Pending</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="payment_note">Payment Note</label>
                    <input type="text" name="payment_note" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="payment_note">Vat (%)</label>
                    <input type="text" name="tax" id="tax" value="0" class="form-control" required>
                </div>
            </div>
            <div class="row">

            


                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Action <a href="#" id="add-product" class="btn btn-primary">+</a></th>
                        </tr>
                    </thead>
                    <tbody id="product-items">
                        <tr>
                            <td>
                                <select name="product_id[]" onchange="get_price(this)"  class="form-control product_id" required>
                                    <option value="">Select Product</option>
                                    @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" name="quantity[]" onkeyup="updateTotal(this)" onchange="updateTotal(this)" value="1" class="form-control quantity" min="1" required>
                            </td>
                            <td>
                                <input type="number" name="price[]"  value="0"  class="form-control price" min="0" required readonly>
                            </td>
                            <td>
                                <input type="number" name="total[]" value="0" class="form-control total" min="0" required readonly>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="removeProduct(this)">Remove</button>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-right">Sub Total</td>
                            <td><input type="number" id="sub_total" name="sub_total" value="0" class="form-control sub_total" min="0" required readonly></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right">Vat</td>
                            <td><input type="number" id="tax_amount" name="tax_amount" value="0" class="form-control tax_amount" min="0" required readonly></td>
                        </tr>

                        <tr>
                            <td colspan="2" class="text-right">Discount (%) </td>
                            <td><input type="number" id="discount" onchange="updateGrandTotal()" onkeyup="updateGrandTotal()"  name="discount" value="0" class="form-control discount" min="0"></td>
                            <td><input type="number" id="discount_amount" name="discount_amount" value="0" class="form-control discount_amount" min="0" readonly></td>
                        </tr>
                        
                        <tr>
                            <td colspan="3" class="text-right">Total</td>
                            <td><input type="number" id="grand_total" name="grand_total" value="0" class="form-control grand_total" min="0" required readonly"></td>
                        </tr>
                    </tfoot>
                </table>  
            </div>            
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
    var products = @json($products);
    console.log(products);
    
    function updateTotal(element) {
        var quantity = element.parentElement.parentElement.querySelector('.quantity').value;
        var price = element.parentElement.parentElement.querySelector('.price').value;
        var total = quantity * price;
        element.parentElement.parentElement.querySelector('.total').value = total;
        updateGrandTotal()
    }

    function get_price(element) {
        var product_id = element.value;
        var product = products.find(product => product.id == product_id);
        if (product) {
            element.parentElement.parentElement.querySelector('.price').value = product.product_price;
            updateTotal(element);
        }
    }
    function updateGrandTotal() {
        var sub_total = 0;
        var tax = 0;
        var grand_total = 0;
        var discount_amount = 0;
        var discount = document.getElementById('discount').value;
        var total_inputs = document.querySelectorAll('.total');
        total_inputs.forEach(function (input) {
            sub_total += parseFloat(input.value);
        });
        tax = parseFloat(document.getElementById('tax').value);
        tax_amount = sub_total * (tax / 100);
        discount_amount = sub_total * (discount / 100);
        document.getElementById('discount_amount').value = discount_amount;
        grand_total = (sub_total + tax_amount) - discount_amount;
        document.getElementById('sub_total').value = sub_total;
        document.getElementById('tax_amount').value = tax_amount;
        document.getElementById('grand_total').value = grand_total;
    }
    function removeProduct(element) {
        element.parentElement.parentElement.remove();
        updateTotal();
    }
    document.getElementById('add-product').addEventListener('click', function () {
        const productItems = document.getElementById('product-items');
        const tr = document.createElement('tr');
        tr.innerHTML = `
           <td>
                <select name="product_id[]" onchange="get_price(this)"  class="form-control product_id" required>
                    <option value="">Select Product</option>
                    @foreach($products as $product)
                    <option  value="{{ $product->id }}">{{ $product->product_name }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="number" name="quantity[]" onkeyup="updateTotal(this)" onchange="updateTotal(this)" value="1" class="form-control quantity" min="1" required>
            </td>
            <td>
                <input type="number" name="price[]"  value="0"  class="form-control price" min="0" required readonly>
            </td>
            <td>
                <input type="number" name="total[]" value="0" class="form-control total" min="0" required readonly>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="removeProduct(this)">Remove</button>
            </td>
        `;
        productItems.appendChild(tr);
    });
</script>



@endsection

