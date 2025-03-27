@extends('layouts.app')

@section('content')
	<div class="container">
		@if($data['task'] != null)
			@php
				$task = $data['task'];
			@endphp
			<div class="card">
				<div class="card-body">
					<h4 class="card-title text-center" onclick="navigate('/user/tasks')">
						<span class="text-blue">Edit</span><span class="text-orange">Task</span>
					</h4>
					<p class="text-center lead">
						<small>
							Edit your task
						</small>
					</p>
					<form id="user-edit-task-form">
						@csrf
						<div class="form-notification"></div>
						<div class="mb-3">
							<label for="title" class="text-uppercase mb-3">Title</label>
							<div class="input-group">
								<span class="input-group-text">
									<i class="bi bi-pencil-fill"></i>
								</span>
								<input type="text" id="title" value="{{ $task['title'] }}" class="form-control form-control-lg">
							</div>
							<div class="form-error title-error"></div>
						</div>
						<div class="mb-3">
							<label for="description" class="text-uppercase mb-3">Description</label>
							<textarea id="description" rows="10" cols="5" class="form-control form-control-lg">{{ $task['description'] }}</textarea>
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
							<label for="status" class="text-uppercase mb-3">Select Status</label>
							<div class="input-group">
								<span class="input-group-text">
									<i class="bi bi-pencil-fill"></i>
								</span>
								<select id="status" class="form-select form-select-lg">
									<option value="None">None</option>
									<option value="PENDING">PENDING</option>
									<option value="COMPLETED">COMPLETED</option>
								</select>
							</div>
							<div class="form-error status-error"></div>
						</div>
						<div class="mb-3">
							<div class="d-grid gap-2">
								<button type="button" class="btn btn-light btn-custom-orange btn-lg px-4 py-3 mt-3" id="user-edit-task-btn" onclick="updateTask()">
									Submit
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		@else
			<div class="alert alert-info my-5" role="alert">
				<h4 class="alert-heading text-uppercase">
					Info
				</h4>
				<p class="lead">
					<small>
						Task Not Found
					</small>
				</p>
			</div>
		@endif
	</div>
@endsection