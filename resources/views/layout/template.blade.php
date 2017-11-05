<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <title>Panel WIO</title>
        
    </head>
    <body>
      <div id="container">
       @include('layout.navbar')
       @yield('content')
       @include('layout.footer')
      </div>

      <script src="https://use.fontawesome.com/f7864b9381.js"></script>
      
    </body>
</html>
