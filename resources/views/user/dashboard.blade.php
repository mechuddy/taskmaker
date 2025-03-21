@extends('layouts.app')

@section('content')
	<div class="container">
		<h4 class="text-uppercase text-orange mt-5 mb-4">
			Dashboard
		</h4>
		<div class="row">
			<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 my-3">
				<div class="col-box col-box-1 rounded" onclick="">
					<span class="col-box-icon">
						<i class="bi bi-plus-circle-fill"></i>
					</span>
					<h4 class="text-white my-1">
						New Task
					</h4>
					<p class="text-white lead mt-0">
						<small>
							Create New Task
						</small>
					</p>
				</div>
			</div>
			<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 my-3">
				<div class="col-box col-box-2 rounded" onclick="">
					<span class="col-box-icon">
						<i class="bi bi-layers-fill"></i>
					</span>
					<h4 class="text-white my-1">
						All Tasks
					</h4>
					<p class="text-white lead mt-0">
						<small>
							View All Tasks
						</small>
					</p>
				</div>
			</div>
		</div>
	</div>
@endsection