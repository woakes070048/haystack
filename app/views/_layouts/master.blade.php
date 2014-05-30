<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>Haystack</title>

    <link href="/dist/css/application.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="outer">

      @include('_partials.sidebar')
      
      @include('_partials.navbar')

      <div class="main-content">
        <div class="container">
                
          <div class="page-content">
            
            <div class="single-head">
              
              @yield('page-header')

              <div class="clearfix"></div>
            </div>

            @yield('content')

          </div>
        </div>
      </div>
    </div>

    <script src="/dist/js/application.min.js"></script>
    <script src="/dist/js/prettify.js"></script>
    <script src="/dist/js/jquery.validate.js"></script>
    <script src="/dist/js/jquery.steps.min.js"></script>

    @yield('javascripts')
  </body>
</html>