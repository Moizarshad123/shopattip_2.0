<!DOCTYPE html>
<html lang="en">

<head>
  <title>Shopattip</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" href="{{ asset('assets/images/favicon.png')}}" />

  @yield('customStyle')
</head>

{{-- <body class="pg10-body"> --}}
<body class="pg10-body">

  

  @yield('content')




  @yield('pageCustomJS')


</body>

</html>