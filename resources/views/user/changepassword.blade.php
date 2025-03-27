@extends('layouts.app')

@section('content')
	@php
		$user = $data['user'];
	@endphp
	<div class="container">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title text-center" onclick="navigate('/user/accountsettings')">
					<span class="text-blue">Change</span><span class="text-orange">Password</span>
				</h4>
				<p class="text-center lead">
					<small>
						Create new password for your account
					</small>
				</p>
				<form id="user-change-password-form">
					@csrf
					<div class="form-notification"></div>
					<div class="mb-3">
						<label for="new-password" class="text-uppercase mb-3">New Password</label>
						<div class="input-group">
							<span class="input-group-text">
								<i class="bi bi-lock-fill"></i>
							</span>
							<input type="password" id="new-password" placeholder="New Password" class="form-control form-control-lg">
						</div>
						<div class="form-error new-password-error"></div>
					</div>
					<div class="mb-3">
						<label for="confirm-password" class="text-uppercase mb-3">Confirm Password</label>
						<div class="input-group">
							<span class="input-group-text">
								<i class="bi bi-lock-fill"></i>
							</span>
							<input type="password" id="confirm-password" placeholder="Confirm Password" class="form-control form-control-lg">
						</div>
					</div>
					<div class="mb-3">
						<div class="d-grid gap-2">
							<button type="button" class="btn btn-light btn-custom-orange btn-lg px-4 py-3 mt-3" id="user-change-password-btn" onclick="changePassword({{ $user['id'] }})">
								Submit
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection