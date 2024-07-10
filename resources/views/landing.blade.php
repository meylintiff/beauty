<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Beauty Skincare</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('partials-landing.links')
</head>

<body class="index-page">

    @include('partials-landing.navbar')

    <main class="main">

        @include('partials-landing.hero')
        @include('partials-landing.feature')
        @include('partials-landing.tentang')
        @include('partials-landing.stats')
        @include('partials-landing.clients')

        @include('partials-landing.service')


        @include('partials-landing.testi')
    </main>

    @include('partials-landing.footer')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>

    @include('partials-landing.scripts')

</body>

</html>