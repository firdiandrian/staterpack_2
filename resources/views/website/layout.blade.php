<html lang="en">

<head>
    @include('website.partials.metadata')
    @include('website.partials.styles')
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset(@$setting->firstWhere('key', 'logo_gray')->value) }}">
</head>

<body class="relative">
    <div id="bg-dark-nav" class=""></div>
    <div id="" class="bg-dark-nav"></div>
    <div id="" class="bg-dark-nav"></div>
    @include('website.partials.content')
    @include('website.partials.scripts')
</body>

</html>
