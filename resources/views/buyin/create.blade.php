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
            <form method="POST" action="/buyin" id="form">

                {{ csrf_field() }}

                <div class="form-group row" id="buyin-details-heading">
                    <h3>Buy-In Details</h3>
                </div>

                @include('buyin.partials.buyin')
                
                <div id="item-details" style="display: none;">
                    <div class="form-group row">
                        <h3>Item Details</h3>
                    </div>
                    <div class="form-group row">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Make</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">Selling Price</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody id="item-details-body">
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="tab1C">
                    <div class="form-group row">
                        <h3>New Item Details</h3>
                    </div>

                    <div id="new-stock-item">
                    </div>
                </div>

                <div id="tab2C">
                    <div class="form-group row">
                        <h3>Client Details</h3>
                    </div>
                    
                    @include('clients.partials.client')

                </div>

                <div class="form-group">
                    <p class="btn btn-success" id="new-stock-item-button">
                        <i class="fas fa-plus-circle"></i> New Item
                    </p>
                    <p class="btn btn-danger" id="remove-stock-item-button" style="display: none;">
                        <i class="fas fa-minus-circle"></i> Remove Item
                    </p>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Create Buyback</button>
                </div>

                @include('layouts.errors')

            </form>

            <div id="new-stock-item-template" style="display: none;">
                @include('stock.partials.stock')
            </div>

        </div>
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

        function newStockItem() {
            // Check required fields populated
            if (stockFormValidation()) {
                addNewStockItem();
            } else {
                $('#form')[0].reportValidity();
            }
        }

        function removeStockItem() {
            // Remove current new-stock-item-template-cloneId
            $('#new-stock-item-template-' + cloneId).remove();
            // Find available new-stock-item-template-cloneId
            var j = inputStock[inputStock.length - 1].cloneId;
            // Show previous new-stock-item-template-cloneId
            $('#new-stock-item-template-' + j).show();
            inputStock.splice(j - 1, 1);
            updateCloneId();
            console.log('cloneId : ' + cloneId);
            console.log(inputStock)
        }

        function updateLoanAmount() {
            console.log('test');
        }

        var cloneId = 0;

        // Create array to store input stock
        var inputStock = [];

        function addInputStock(){
            var i = inputStock.length;
            inputStock[i] = {
                make:$('#new-stock-item-template-' + cloneId).find("[id='make']").val(),
                model:$('#new-stock-item-template-' + cloneId).find("[id='model']").val(),
                sellingPrice:$('#new-stock-item-template-' + cloneId).find("[id='selling_price']").val(),
                cloneId:cloneId,
            };    
        }

        function addItemDetails() {

            $('#item-details-body').empty();
            console.log('Add item details');
            var tableBody = "";
            for (let i=0; i<inputStock.length; i++)
             {
                var td1 = "<td>" + inputStock[i].make + "</td>";
                var td2 = "<td>" + inputStock[i].model + "</td>";
                var td3 = "<td>" + inputStock[i].sellingPrice + "</td>";
                var td4 = "<td><i class=\"fas fa-trash-alt\"></i></td>";
                var tableDetail = td1 + td2 + td3; // + td4;
                var tableRow = "<tr id=\"item-details-" + inputStock[i].cloneId + "\">" + tableDetail + "</tr>";
                tableBody = tableBody + tableRow;
            }
            $('#item-details-body').append(tableBody);
            console.log('tableBody : ' + tableBody);
        }

        function addNewStockItem() {
            var j = cloneId + 1;

            // Only show #item-details and #remove-stock-item-button if more than one item
            if ( cloneId > 0 ) {
                $('#remove-stock-item-button').show();
                // Update inputStock
                addInputStock();
                // Build item-details table
                addItemDetails();
                $('#item-details').show();

            }
            // Clone hidden new-stock-item-template
            var $clone = $('#new-stock-item-template').clone();
            // Append new-stock-item-template with unique id
            $clone.appendTo('#new-stock-item').attr('id', 'new-stock-item-template-' + j);
            // Hide new-stock-item-template-cloneId
            $('#new-stock-item-template-' + cloneId ).hide();
            // Show new-stock-item-template-j
            $('#new-stock-item-template-' + j ).show();
            // Scroll to top
            if ( cloneId > 0 ) {
                scrollToTop();
            }
            // Set cloneId
            updateCloneId();
            // cloneId = j;
            console.log('cloneId : ' + cloneId);
            console.log(inputStock);
        }

        function updateCloneId() { 
            (inputStock.length > 0) ? cloneId = inputStock[inputStock.length - 1].cloneId + 1 : cloneId = 1
        }

        function stockFormValidation() {
            var validity = $('#form')[0].checkValidity();
            return validity;
        }

        function scrollToTop() {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#buyin-details-heading").offset().top
            }, 2000);
        }
        // On load
        // Tabs
        tab1();
        // Stock Item Form
        addNewStockItem();

      });
    </script>
@stop