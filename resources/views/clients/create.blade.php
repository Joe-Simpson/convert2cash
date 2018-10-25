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

        // Initiate webcam ? handleSuccess : handleError
        function captureVideo() {
          const constraints = {
            video: true
          };
          navigator.mediaDevices.getUserMedia(constraints).
            then(handleSuccess).catch(handleError);
          // Hide and show relevant elements
          $captureVideoButton.hide();
          $img.hide();
          $screenshotButton.show();
          $video.show();
        };

        // Webcam initiated. Stream to video element
        function handleSuccess(stream) {
          video.srcObject = stream;
        }

        // Webcam initiation failed. Alert user
        function handleError() {
          alert('Uh oh! Something went wrong.');
        }

        // Capture image from webcam
        function captureScreenshot() {
          canvas.width = video.videoWidth;
          canvas.height = video.videoHeight;
          canvas.getContext('2d').drawImage(video, 0, 0);
          // Other browsers will fall back to image/png
          img.src = canvas.toDataURL('image/webp');
          dataURL = canvas.toDataURL('image/webp');
          var clientImage = document.getElementById('client_image');
          clientImage.value = canvas.toDataURL('image/webp');

          // Hide and show relevant elements
          $video.hide();
          $screenshotButton.hide();
          $img.show();
          $captureVideoButton.show();
        };

      });
    </script>
@stop