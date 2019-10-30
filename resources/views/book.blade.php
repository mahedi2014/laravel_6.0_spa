<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" value="{{ csrf_token() }}"/>

	<title>{{ config('app.name') }}</title>

	<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
	<link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet"/>

	{{--<script>
        window.Laravel = {!! json_encode([
                'siteName' => config('app.name'),
                'siteUrl' => config('app.url'),
                'apiUrl' => config('app.url') . '/api'
            ]) !!};
	</script>--}}

</head>
<body>
<div id="app"></div>

<script src="{{ mix('js/app.js') }}" type="text/javascript" defer></script>
</body>
</html>
