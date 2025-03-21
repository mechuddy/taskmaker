@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title text-center" onclick="navigate('/home')">
					<span class="text-blue">Task</span><span class="text-orange">Maker</span>
				</h4>
				<p class="text-center lead">
					<small>
						Login to create and manage tasks
					</small>
				</p>
				<form id="user-login-form">
					@csrf
					<div class="form-notification"></div>
					<div class="mb-3">
						<label for="identity" class="text-uppercase mb-3">Username or Email</label>
						<div class="input-group">
							<span class="input-group-text">
								<i class="bi bi-pencil-fill"></i>
							</span>
							<input type="text" id="identity" placeholder="Username or Email" class="form-control form-control-lg">
						</div>
						<div class="form-error identity-error"></div>
					</div>
					<div class="mb-3">
						<label for="password" class="text-uppercase mb-3">Password</label>
						<div class="input-group">
							<span class="input-group-text">
								<i class="bi bi-lock-fill"></i>
							</span>
							<input type="password" id="password" placeholder="Password" class="form-control form-control-lg">
						</div>
						<div class="form-error password-error"></div>
					</div>
					<div class="mb-3">
						<div class="d-grid gap-2">
							<button type="button" class="btn btn-light btn-custom-orange btn-lg px-4 py-3 mt-3" id="user-login-btn" onclick="login()">
								Submit
							</button>
						</div>
					</div>
				</form>
				<p class="lead">
					<small>
						Not a User? <a href="{{ route('user.register') }}">Register</a>
					</small>
				</p>
			</div>
		</div>
	</div>
@endsection