@extends('app')

@section('content')


<link rel="stylesheet" type="text/css" href="/css/menu.css">
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					@if (isset($errors) && count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="/login_auth">
						{!! csrf_field() !!}

						<div class="form-group">
							<label class="col-md-4 control-label">Usuário</label>
							<div class="col-md-6">
								<input type="user" class="form-control" name="login_user" value="{{ old('user') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-danger">Login</button>

								</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
