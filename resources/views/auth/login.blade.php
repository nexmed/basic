<?php
use \Illuminate\Support\Facades\Lang as Lang;
?>
@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><?=(Lang::has('auth.page_title') ? Lang::get('auth.page_title') : 'Login')?></div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
                            <?=(Lang::has('auth.error_title') ? Lang::get('auth.error_title') : '<strong>Whoops!</strong> There were some problems with your input.')?><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label"><?=(Lang::has('auth.username') ? Lang::get('auth.username') : 'User name')?></label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label"><?=(Lang::has('auth.password') ? Lang::get('auth.password') : 'Password')?></label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> <?=(Lang::has('auth.remember') ? Lang::get('auth.remember') : 'Remember Me')?>
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary"><?=(Lang::has('auth.login') ? Lang::get('auth.login') : 'Login')?></button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
