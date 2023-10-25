<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="windows-1255">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#FFFFFF">
    <link rel="shortcut icon" href="{{asset('storage/icons/favicon.ico')}}" type="image/x-icon">
    <link rel="manifest" href="/manifest.json">
    @yield('meta-description')
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @yield('css')
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script>
        window.OneSignal = window.OneSignal || [];
        OneSignal.push(function () {
            OneSignal.init({
                appId: "26939a35-e088-4ba3-a784-6c6f6267e59d",
            });
        });
    </script>
</head>
<body>
<div id="app">
    @include('partials.navbar')
    @include('partials.monthsBar')
    <main class="container">
        @yield('content')
        <flash message="{{session('flash')}}"></flash>
    </main>
</div>
@include('partials.footer')
<script src="{{ mix('js/app.js') }}"></script>
@yield('js')
</body>
</html>
