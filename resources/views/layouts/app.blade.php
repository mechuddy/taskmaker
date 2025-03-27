<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Task Maker - {{ $data['page']; }}</title>
	<link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap-icons/bootstrap-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>
<body class="{{ strtolower(str_replace(' ', '', $data['page'])); }}">
	@if(($data['page'] == "Dashboard ") || ($data['page'] == "New Task ") || ($data['page'] == "Tasks ") || ($data['page'] == "Edit Task "))
		<x-topnav />
	@endif
	<main>
		@yield('content')
	</main>
	<script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('assets/jquery/jquery-3.7.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>