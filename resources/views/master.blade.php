<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@vite(['resources/css/app.css', 'resources/js/app.js'])

	<title>test</title>
</head>

<body class="bg-gray-50 dark:bg-gray-900">
	@include('partials.navigation')
 
    @foreach ([
        'success' => 'Success',
        'error'   => 'Error',
        'warning' => 'Warning',
        'info'    => 'Info',
    ] as $type => $title)
        @if (session($type))
            <x-ui.alert :type="$type" :title="$title" :messages="[session($type)]"/>
        @endif
    @endforeach

    @if ($errors->any())
        <x-ui.alert :type="$type" :title="$title" :messages="$errors->all()""/>
    @endif
 

	<main class="mx-auto max-w-7xl px-4 py-6 h-[80dvh] sm:px-6 lg:px-8">
		@yield('content')
	</main>
</body>

</html>
