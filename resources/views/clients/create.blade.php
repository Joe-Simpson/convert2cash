@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          
          <div class="row">
            <div class="col-4">
              <video class="img-thumbnail" autoplay style="display:none;"></video>
              <img class="img-thumbnail" src="" style="display:none;">
              <canvas class="img-thumbnail" style="display:none;"></canvas>
              <p>
                <button type="button" class="btn btn-primary capture-button">
                  Initiate Webcam
                </button>
                <button type="button" class="btn btn-primary screenshot-button" style="display:none;">
                  Capture Image
                </button>
              </p>
            </div>
          </div>
          
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

        // Webcam image capture
        // Setup constants
        const $captureVideoButton = $('.capture-button');
        const $screenshotButton = $('.screenshot-button');
        const $img = $('img');
        const $video = $('video');
        const $canvas = $('canvas');

        const img = document.querySelector('img');
        const video = document.querySelector('video');
        const canvas = document.createElement('canvas');

        $captureVideoButton.on('click', () => captureVideo());

        $screenshotButton.on('click', () => captureScreenshot());
        
        // Function to check getUserMedia is supported by browser
        function hasGetUserMedia() {
          return !!(navigator.mediaDevices &&
            navigator.mediaDevices.getUserMedia);
        }

        function captureVideo() {
          const constraints = {
            video: true
          };
          navigator.mediaDevices.getUserMedia(constraints).
            then(handleSuccess).catch(handleError);
          $captureVideoButton.hide();
          $img.hide();
          $screenshotButton.show();
          $video.show();
        };

        function captureScreenshot() {
          canvas.width = video.videoWidth;
          canvas.height = video.videoHeight;
          canvas.getContext('2d').drawImage(video, 0, 0);
          // Other browsers will fall back to image/png
          img.src = canvas.toDataURL('image/webp');
          $video.hide();
          $screenshotButton.hide();
          $img.show();
          $captureVideoButton.show();
        };

        function handleSuccess(stream) {
          // screenshotButton.disabled = false;
          video.srcObject = stream;
        }

        function handleError() {
          alert('Uh oh! Something went wrong.');
        }

      });
    </script>
@stop