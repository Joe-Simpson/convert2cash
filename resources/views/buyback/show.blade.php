@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-between">
        @if ( ! $buyback->buybackStockLink->first()->stock->seized)
            <a href="/buyback/{{ $buyback -> id }}/buy-back">
                <button class="btn btn-success"
                        @if( $buyback->bought_back_date || $buyback->renew_id || $buyback->cancelled )
                        disabled
                        @endif>
                    Buy-Back for £{{ $buyback->amountDue() }}
                </button>
            </a>
            <a href="/buyback/{{ $buyback -> id }}/renew">
                <button class="btn btn-secondary"
                        @if( $buyback->bought_back_date || $buyback->renew_id || $buyback->cancelled )
                        disabled
                        @endif>
                    Renew
                </button>
            </a>
            <a href="/buyback/{{ $buyback -> id }}/clone">
                <button class="btn btn-secondary"
                        @if( is_null($buyback->bought_back_date) )
                        disabled
                        @endif>
                    Clone
                </button>
            </a>
            <a href="/buyback/{{ $buyback -> id }}/seize">
                <button class="btn btn-danger"
                        @if( $buyback->bought_back_date || $buyback->renew_id || $buyback->cancelled )
                        disabled
                        @endif>
                    Seize
                </button>
            </a>
            @if ($buyback->created_at->format('Y-m-d') == \Carbon\Carbon::now()->format('Y-m-d'))
                <a href="/buyback/{{ $buyback -> id }}/cancel">
                    <button class="btn btn-danger">Cancel</button>
                </a>
            @endif
        @else
        <h3 class="align-middle">Buyback Seized</h3>
        @endif
    </div>
    <hr>
</div>
<div class="container">
    <nav>
        <ul id="tabs" class="pagination pagination-lg justify-content-center">
            <li id="tab1" class="page-item">
                <a class="page-link">Details</a>
            </li>
            @if ( isset( $buyback->client ) )
                <li id="tab2" class="page-item">
                    <a class="page-link">Client</a>
                </li>
            @else
                <li id="" class="page-item">
                    <a class="page-link">Client Deleted</a>
                </li>
            @endif
         </ul>
    </nav>
    <div class="container" id="tab1C">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form>

                    <div class="form-group row">
                        <h3>Buy-Back Details</h3>
                    </div>

                    @include('buyback.partials.buyback')

                    <div class="form-group row">
                        <div class="input-group">
                            <label for="amount_due" class="col-sm-3 col-form-label">Amount Due</label>    
                        <div class="input-group-prepend">
                            <span class="input-group-text">£</span>
                        </div>
                        <input type="text"
                                class="form-control"
                                id="amount_due"
                                name="amount_due"
                                value="{{ $buyback -> amountDue() }}" 
                                readonly>
                        </div>
                    </div>
                    
                    <hr>

                    <div class="form-group row">
                        <h3>Item Details</h3>
                    </div>

                    @if ( isset( $buyback->buybackStockLink ) )
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Stock Number</th>
                                <th scope="col">Make</th>
                                <th scope="col">Model</th>
                                <th scope="col">Selling Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($buyback->buybackStockLink as $stockLink)
                            <tr>
                                <th scope="row">
                                    {{ sprintf("%'.08d\n", $stockLink->stock->id) }}
                                </th>
                                <td>{{ $stockLink->stock->make }}</td>
                                <td>{{ $stockLink->stock->model }}</td>
                                <td>£ {{ $stockLink->stock->selling_price }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <p>Stock Item(s) Deleted</p>
                    @endif

                    @include('layouts.errors')

                </form>
            </div>
        </div>    
    </div>
    <div class="container" id="tab2C">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form>
                    @if ( isset( $buyback->client ) )
                        @include('clients.partials.client')
                    @else
                        <p>Client Deleted</p>
                    @endif
                </form>
            </div>
        </div>
    </div>
    
    <div class="row">
        <a href="/buyback"><button class="btn btn-secondary">Return to Buybacks</button></a>
    </div>
</div>
@endsection

@section('scripts')
    <script>
      $(document).ready(function() {

        // Tab1
        tab1();

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

      });
    </script>
@stop