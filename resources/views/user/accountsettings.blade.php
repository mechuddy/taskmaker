@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="pane px-3 py-3 my-5 rounded" onclick="navigate('/user/changepassword')">
			<span class="pane-icon">
				<i class="bi bi-lock-fill"></i>
			</span>
			<h4 class="text-blue">
				Account Security
			</h4>
			<p class="lead">
				<small>
					Change account password
				</small>
			</p>
		</div>
	</div>
@endsection