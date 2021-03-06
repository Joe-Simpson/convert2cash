@extends('layouts.master')

@section('content')
<div class="container">
    <nav>
        <ul id="tabs" class="pagination pagination-lg justify-content-center">
            <li id="tab1" class="page-item">
                <a class="page-link">Details</a>
            </li>
            <li id="tab2" class="page-item">
                <a class="page-link">Notes</a>
            </li>
            <li id="tab3" class="page-item">
                <a class="page-link">Buy-Backs</a>
            </li>
            <li id="tab4" class="page-item">
                <a class="page-link">Lay-Aways</a>
            </li>
            <li id="tab5" class="page-item">
                <a class="page-link">Buy-Ins</a>
            </li>
         </ul>
    </nav>
    <div class="container" id="tab1C">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form>
                    
                    @include('clients.partials.client')
                    
                    <div class="form-group row justify-content-between">
                        <div class="col">
                            <a href="/clients/{{ $client -> id }}/edit" class="btn btn-primary">
                                Edit Client Details
                            </a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="container" id="tab2C">
        <div class="row justify-content-center" id="notes">
            <div class="col-md-8">
                <form method="post" action="/client-notes">

                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    @include('clients.partials.client-notes')
                    
                    <div class="form-group row justify-content-between">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Add New Note</button>
                        </div>
                    </div>

                    @include('layouts.errors')

                </form>
            </div>
        </div>
        @if ( count($client->clientNotes) > 0 )
            <div class="row justify-content-center">
                @include('clients.partials.client-notes-table')
            </div>
        @endif
    </div>
    <div class="container" id="tab3C">
        <div class="row align-items-center">
            <div class="col-3">
                <a href="/buyback/create?client_id={{ $client -> id }}" class="btn btn-success">
                    Create New Buy-Back
                </a>
            </div>
            <div class="col-6">
                <div class="card-group">
                    <div class="card text-center text-white bg-dark">
                        <div class="card-header">
                            <strong>Completed</strong>
                        </div>
                        <div class="card-body">
                            <p class="h2">
                                <strong>{{ $buybackStats['completeP'] }}%</strong>
                            </p>
                        </div>
                        <div class="card-footer">
                            {{ $buybackStats['complete'] }} of {{ $buybackStats['total'] }}
                        </div>
                    </div>
                    <div class="card text-center text-white bg-dark">
                        <div class="card-header">
                            <strong>Active</strong>
                        </div>
                        <div class="card-body">
                            <p class="h2">
                                <strong>{{ $buybackStats['activeP'] }}%</strong>
                            </p>
                        </div>
                        <div class="card-footer">
                            {{ $buybackStats['active'] }} of {{ $buybackStats['total'] }}
                        </div>
                    </div>
                    <div class="card text-center text-white bg-dark">
                        <div class="card-header">
                            <strong>Overdue</strong>
                        </div>
                        <div class="card-body">
                            <p class="h2">
                                <strong>{{ $buybackStats['overdueP'] }}%</strong>
                            </p>
                        </div>
                        <div class="card-footer">
                            {{ $buybackStats['overdue'] }} of {{ $buybackStats['total'] }}
                        </div>
                    </div>
                    <div class="card text-center text-white bg-dark">
                        <div class="card-header">
                            <strong>Seized</strong>
                        </div>
                        <div class="card-body">
                            <p class="h2">
                                <strong>{{ $buybackStats['seizedP'] }}%</strong>
                            </p>
                        </div>
                        <div class="card-footer">
                            {{ $buybackStats['seized'] }} of {{ $buybackStats['total'] }}
                        </div>
                    </div>
                </div>    
            </div>
        </div>
        <div class="row justify-content-center">
            @include('clients.partials.client-buyback-table')
        </div>
    </div>
    <div class="container" id="tab4C">
        <div class="row">
            <a href="/layaways/create?client_id={{ $client -> id }}" class="btn btn-success">
                Create New Layaway
            </a>
        </div>
        <div class="row justify-content-center">
            @include('clients.partials.client-layaways-table')
        </div>
    </div>
    <div class="container" id="tab5C">
        <div class="row">
            <a href="/buyin/create?client_id={{ $client -> id }}" class="btn btn-success">
                Create New Buy-In
            </a>
        </div>
        <div class="row justify-content-center">
            @include('clients.partials.client-buyin-table')
        </div>
    </div>
</div>

<div class="container">
    <div class="container">
        <div class="row">
            <a href="/clients/"><button class="btn btn-secondary">Return to Clients</button></a>
        </div>
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
            $('#tab2C, #tab3C, #tab4C, #tab5C').hide();
            // Buttons
            $('#tab1').addClass('disabled');
            $('#tab2, #tab3, #tab4, #tab5').removeClass('disabled');
            
        }

        $('#tab1').on('click', () => tab1());

        // Tab2
        function tab2() {
            // Tabs
            $('#tab2C').show();
            $('#tab1C, #tab3C, #tab4C, #tab5C').hide();
            // Buttons
            $('#tab2').addClass('disabled');
            $('#tab1, #tab3, #tab4, #tab5').removeClass('disabled');
        }

        $('#tab2').on('click', () => tab2());

        // Tab3
        function tab3() {
            // Tabs
            $('#tab3C').show();
            $('#tab1C, #tab2C, #tab4C, #tab5C').hide();
            // Buttons
            $('#tab3').addClass('disabled');
            $('#tab1, #tab2, #tab4, #tab5').removeClass('disabled');
        }

        $('#tab3').on('click', () => tab3());

        // Tab4
        function tab4() {
            // Tabs
            $('#tab4C').show();
            $('#tab1C, #tab2C, #tab3C, #tab5C').hide();
            // Buttons
            $('#tab4').addClass('disabled');
            $('#tab1, #tab2, #tab3, #tab5').removeClass('disabled');
        }

        $('#tab4').on('click', () => tab4());

        // Tab5
        function tab5() {
            // Tabs
            $('#tab5C').show();
            $('#tab1C, #tab2C, #tab3C, #tab4C').hide();
            // Buttons
            $('#tab5').addClass('disabled');
            $('#tab1, #tab2, #tab3, #tab4').removeClass('disabled');
        }

        $('#tab5').on('click', () => tab5());

      });
    </script>
@stop