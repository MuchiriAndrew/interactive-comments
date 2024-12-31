<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    
    @vite('resources/js/app.js')
    @inertiaHead
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

     {{-- initialize all dropzones with #dropzone --}}
     <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" />
    
    @vite('resources/css/app.css')

  </head>
  <body class="bg-very-light-gray min-h-screen h-auto min-w-screen w-auto"> 
      @inertia

     
      
      
  </body>

  


</html>