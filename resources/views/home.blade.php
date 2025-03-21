@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="jumbotron">
			<h1 class="display-3 text-orange">
				TaskMaker
			</h1>
			<p class="text-white lead">
				TaskMaker lets you create and manage tasks for
				your day to day activities.
			</p>
			<div class="row">
				<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 my-3">
					<div class="d-grid gap-2">
						<button type="button" class="btn btn-light btn-custom-orange btn-lg px-4 py-3" onclick="navigate('/user/register')">
							Register
						</button>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 my-3">
					<div class="d-grid gap-2">
						<button type="button" class="btn btn-light btn-custom-green btn-lg px-4 py-3" onclick="navigate('/user/login')">
							Login
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection