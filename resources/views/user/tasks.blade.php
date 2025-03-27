@extends('layouts.app')

@section('content')
	<div class="container">
		<h4 class="text-uppercase text-orange mt-5 mb-4">
			All Tasks
		</h4>
		@if($data['tasks']->isNotEmpty())
			@php
				$tasks = $data['tasks'];
			@endphp
			@foreach($tasks as $task)
				<div class="card my-5">
					<div class="card-header px-3 py-3">
						<div class="card-header-items">
							<div class="card-header-item">
								{{ date('D d M, Y', strtotime($task['date'])) }}
							</div>
							<div class="card-header-item">
								{{ $task['status'] }}
							</div>
						</div>
					</div>
					<div class="card-body px-3 py-3">
						<h4 class="card-title">
							{{ $task['title'] }}
						</h4>
						<p class="card-text lead">
							{{ $task['description'] }}
						</p>
						@if($task['status'] == "COMPLETED")
							<div class="d-grid gap-2">
								<button type="button" class="btn btn-light btn-custom-blue btn-lg px-4 py-3" onclick="deleteTask({{ $task['id'] }})">
									Delete Task
								</button>
							</div>
						@else
							<div class="row">
								<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 my-3">
									<div class="d-grid gap-2">
										<button type="button" class="btn btn-light btn-custom-blue btn-lg px-4 py-3" onclick="navigate('/user/{{ $task['id'] }}/edit')">
											Edit Task
										</button>
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 my-3">
									<div class="d-grid gap-2">
										<button type="button" class="btn btn-light btn-custom-orange btn-lg px-4 py-3" onclick="deleteTask({{ $task['id'] }})">
											Delete Task
										</button>
									</div>
								</div>
							</div>
						@endif
					</div>
				</div>
			@endforeach
		@else
			<div class="alert alert-info" role="alert">
				<h4 class="alert-heading text-uppercase">
					Info
				</h4>
				<p class="lead">
					<small>
						Tasks Not Found
					</small>
				</p>
			</div>
		@endif
	</div>
@endsection