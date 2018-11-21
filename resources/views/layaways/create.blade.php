@extends('layouts.master')

@section('content')
<div class="container">
    <nav>
        <ul id="tabs" class="pagination pagination-lg justify-content-center">
            <li id="tab1" class="page-item">
                <a class="page-link">Details</a>
            </li>
            <li id="tab2" class="page-item">
                <a class="page-link">Client</a>
            </li>
         </ul>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="/layaways" id="form">

			    {{ csrf_field() }}

                <div id="tab1C">
                    <div class="form-group row">
                        <h3>Stock Items</h3>
                    </div>
                    
                    <div class="form-group row">
                        <div class="input-group col-sm-12">
                            <label for="total_selling_price" class="col-sm-4 col-form-label">Total Selling Price</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text">£</span>
                            </div>
                            <input type="string"
                                    class="form-control"
                                    id="total_selling_price"
                                    name="total_selling_price"
                                    disabled>
                        </div>
                    </div>
                    
                    @include('layaways.partials.stock')
                    
                </div>

                <div id="tab2C">
                    <div class="form-group row">
                        <h3>Client Details</h3>
                    </div>
                    
                    @include('clients.partials.client')

                </div>

                <hr>

                <div class="form-group row">
                    <h3>Sale Details</h3>
                </div>

                @include('layaways.partials.layaways')

                <div class="form-group row">
                    <div class="input-group ">
                        <label for="sale_price" class="col-sm-4 col-form-label">Remaining Cost</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text">£</span>
                        </div>
                        <input type="text"
                                class="form-control"
                                id="sale_price"
                                name="sale_price"
                                disabled>
                    </div>
                </div>

                <div class="form-group">
			      <button type="submit" class="btn btn-primary">Create Layaway</button>
			    </div>

			    @include('layouts.errors')

		  	</form>

        </div>
    </div>
    <div class="row">
        <a href="/clients/"><button class="btn btn-secondary">Abandon</button></a>
    </div>
</div>
@endsection
@section('scripts')
    <script>
      $(document).ready(function() {

        function tab1() {
            // Tabs
            $('#tab1C').show();
            $('#tab2C').hide();
            // Buttons
            $('#tab1').addClass('disabled');
            $('#tab2').removeClass('disabled');
        }

        $('#tab1').on('click', () => tab1());

        // Tab2
        function tab2() {
            // Tabs
            $('#tab2C').show();
            $('#tab1C').hide();
            // Buttons
            $('#tab2').addClass('disabled');
            $('#tab1').removeClass('disabled');
        }

        $('#tab2').on('click', () => tab2());


        // New Stock Item
        $('#new-stock-item-button').on('click', () => newStockItem());
        // Remove stock item
        $('#remove-stock-item-button').on('click', () => removeStockItem());
        // Update Loan Amount
        $('#selling_price').on('change', () => updateLoanAmount());

        // On load
        // Tabs
        tab1();
        $('#stock_search').select2();


        $('#stock_search').on('select2:select', function (e) {
            updatePriceFields();
        });
        $('#stock_search').on('select2:unselect', function (e) {
            updatePriceFields();
        });
        $("input[name='price_adjustment']").on('input', function() {
            updatePriceFields();
        });
        $("input[name='deposit']").on('input', function() {
            updatePriceFields();
        });

        function updatePriceFields () {
            var sellingPrice = calculateSellingPrice();
            updateTotalSellingPrice(sellingPrice);
            var salePrice = calculateSalePrice(sellingPrice);
            updateSalePrice( salePrice );
        }

        function updateSalePrice(sale_price) {
            $("input[name='sale_price']").val(sale_price);
        }

        function updateTotalSellingPrice(total_selling_price) {
            $("input[name='total_selling_price']").val(total_selling_price);
        }

        function calculateSellingPrice() {
            
            var str = $("#stock_search option:selected").text();
            str = str.replace(/\s+/g, '');
            
            var pos = str.lastIndexOf("£");
            var totalSellingPrice = 0;
            while (pos > 0) {

                var sellingPriceStr = str.slice(pos + 1 ,str.length);
                var sellingPrice = sellingPriceStr * 1;
                totalSellingPrice = totalSellingPrice + sellingPrice;
                str = str.slice(0, pos - 1);

                var i = 1;
                while (i < 5) {
                    hPos = str.lastIndexOf("-")
                    str = str.slice(0, hPos);
                    i++
                }

                str = str.slice(0, str.length - 8)
                pos = str.lastIndexOf("£");
            }

            return totalSellingPrice;
        }

        function calculateSalePrice (total_selling_price) {
            var price_adjustment = $("input[name='price_adjustment']").val();
            ( ! price_adjustment ) ? price_adjustment = 0 : false;
            var deposit = $("input[name='deposit']").val();
            ( ! deposit ) ? deposit = 0 : false;
            var salePrice = total_selling_price - price_adjustment - deposit;

            return salePrice;
        }

      });
    </script>
@stop