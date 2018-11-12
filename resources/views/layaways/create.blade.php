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

      });
    </script>
@stop