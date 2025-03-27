@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title text-center" onclick="navigate('/user/dashboard')">
					<span class="text-blue">New</span><span class="text-orange">Task</span>
				</h4>
				<p class="text-center lead">
					<small>
						Create new task
					</small>
				</p>
				<form id="user-new-task-form">
					@csrf
					<div class="form-notification"></div>
					<div class="mb-3">
						<label for="title" class="text-uppercase mb-3">Title</label>
						<div class="input-group">
							<span class="input-group-text">
								<i class="bi bi-pencil-fill"></i>
							</span>
							<input type="text" id="title" placeholder="Add Title" class="form-control form-control-lg">
						</div>
						<div class="form-error title-error"></div>
					</div>
					<div class="mb-3">
						<label for="description" class="text-uppercase mb-3">Description</label>
						<textarea id="description" rows="10" cols="5" placeholder="Add Short Description" class="form-control form-control-lg"></textarea>
						<div class="form-error description-error"></div>
					</div>
					<div class="mb-3">
						<label for="date" class="text-uppercase mb-3">Select Date</label>
						<div class="input-group">
							<span class="input-group-text">
								<i class="bi bi-calendar-event-fill"></i>
							</span>
							<input type="date" id="date" class="form-control form-control-lg">
						</div>
						<div class="form-error date-error"></div>
					</div>
					<div class="mb-3">
						<div class="d-grid gap-2">
							<button type="button" class="btn btn-light btn-custom-orange btn-lg px-4 py-3 mt-3" id="user-new-task-btn" onclick="createTask()">
								Submit
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection