@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="/clients">

			    {{ csrf_field() }}
			    
			    @include('clients.partials.client')
			    
			    <div class="form-group">
			      <button type="submit" class="btn btn-primary">Create</button>
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

        function toggleBanReason() {
          if ($('#client_banned').val() === 'true') {
            $('#ban-container').show();
          } else {
            $('#ban-container').hide();
          }
        }

        toggleBanReason();

        $('#client_banned').change(function() {
          toggleBanReason();
        });

      });
    </script>
@stop