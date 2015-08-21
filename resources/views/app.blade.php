<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DMCA Sender</title>
  <link rel="stylesheet" href="/css/app.css">
</head>
<body>

  <header class="masthead">
    <div class="container">
      <a href="/" class="masthead-logo">DMCA Sender</a>
      @include('partials.nav')
    </div>
  </header>

  @yield('content')
  @yield('footer')

  <footer class="footer">
    <div class="container">
      <p>&copy; Copyright {{ date('Y') }}</p>
    </div>
  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</body>
</html>