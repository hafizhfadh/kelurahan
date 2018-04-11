
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="robots" content="index, follow" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=7">

  <meta name="language" content="en-EN" />
  <meta name="author" content="Hafizh Fadhlurrohman" />

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Styles -->
  <link rel="shortcut icon" href="{{{ asset('storage/favicon.png') }}}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  {!! Charts::styles() !!}
  @stack('styles')

</head>

<body>

  <div id="app">
    @include('_includes.navbar')
    <div class="wrapper">
      <div class="columns">
        @include('_includes.aside')
        <main class="column main p-b-20">
          @yield('content')
        </main>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  @stack('scripts')
</body>

</html>
