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
						Create new account to get started
					</small>
				</p>
				<form id="user-register-form">
					@csrf
					<div class="form-notification"></div>
					<div class="mb-3">
						<label for="firstname" class="text-uppercase mb-3">Firstname</label>
						<div class="input-group">
							<span class="input-group-text">
								<i class="bi bi-person-fill"></i>
							</span>
							<input type="text" id="firstname" placeholder="Firstname" class="form-control form-control-lg">
						</div>
						<div class="form-error firstname-error"></div>
					</div>
					<div class="mb-3">
						<label for="lastname" class="text-uppercase mb-3">Lastname</label>
						<div class="input-group">
							<span class="input-group-text">
								<i class="bi bi-person-fill"></i>
							</span>
							<input type="text" id="lastname" placeholder="Lastname" class="form-control form-control-lg">
						</div>
						<div class="form-error lastname-error"></div>
					</div>
					<div class="mb-3">
						<label for="email" class="text-uppercase mb-3">Email</label>
						<div class="input-group">
							<span class="input-group-text">
								<i class="bi bi-envelope-fill"></i>
							</span>
							<input type="text" id="email" placeholder="Email" class="form-control form-control-lg">
						</div>
						<div class="form-error email-error"></div>
					</div>
					<div class="mb-3">
						<label for="phonenumber" class="text-uppercase mb-3">Phone Number</label>
						<div class="input-group">
							<span class="input-group-text">
								<i class="bi bi-telephone-fill"></i>
							</span>
							<input type="text" id="phonenumber" placeholder="Phone Number" class="form-control form-control-lg">
						</div>
						<div class="form-error phonenumber-error"></div>
					</div>
					<div class="mb-3">
						<label for="username" class="text-uppercase mb-3">Username</label>
						<div class="input-group">
							<span class="input-group-text">
								<i class="bi bi-person-fill"></i>
							</span>
							<input type="text" id="username" placeholder="Username" class="form-control form-control-lg bg-white" disabled>
						</div>
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
						<label for="confirm-password" class="text-uppercase mb-3">Confirm Password</label>
						<div class="input-group">
							<span class="input-group-text">
								<i class="bi bi-lock-fill"></i>
							</span>
							<input type="password" id="confirm-password" placeholder="Confirm Password" class="form-control form-control-lg">
						</div>
						<div class="form-error confirm-password-error"></div>
					</div>
					<div class="mb-3">
						<div class="d-grid gap-2">
							<button type="button" class="btn btn-light btn-custom-orange btn-lg px-4 py-3 mt-3" id="user-register-btn" onclick="register()">
								Submit
							</button>
						</div>
					</div>
				</form>
				<p class="lead">
					<small>
						Already a User? <a href="{{ route('user.login') }}">Login</a>
					</small>
				</p>
			</div>
		</div>
	</div>
@endsection