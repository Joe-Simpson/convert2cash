@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="/sales">

			    {{ csrf_field() }}

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
                
                @include('sales.partials.stock')

                <hr>

                <div class="form-group row">
                    <h3>Client Details</h3>
                </div>

                @include('sales.partials.client')

                <hr>

                <div class="form-group row">
                    <h3>Sale Details</h3>
                </div>

			    @include('sales.partials.sales')

                <div class="form-group row">
                    <div class="input-group ">
                        <label for="sale_price" class="col-sm-4 col-form-label">Sale Price</label>
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
			      <button type="submit" class="btn btn-primary">Confirm Sale</button>
			    </div>

			    @include('layouts.errors')

		  	</form>
        </div>
    </div>
    <div class="row">
        <a href="/sales"><button class="btn btn-secondary">Abandon</button></a>
    </div>
</div>
@endsection
@section('scripts')
    <script>
    $(document).ready(function() {
        $('#client_search').select2();
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
            var salePrice = total_selling_price - price_adjustment;

            return salePrice;
        }

    });
    </script>
@stop