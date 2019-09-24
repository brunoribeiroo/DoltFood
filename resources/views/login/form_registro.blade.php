@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Registro</div>
				<div class="panel-body">
			

					<form class="form-horizontal" role="form" method="POST" action="/login/registro">
						{!! csrf_field() !!}

						<div class="form-group">
							<label class="col-md-4 control-label">Login</label>
							<div class="col-md-6">
								<input type="user" class="form-control" name="login_user" value="{{ old('user') }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Email</label>
							<div class="col-md-6">
								<input type="user" class="form-control" name="login_email" value="{{ old('user') }}">
							</div>
						</div>

<div class="form-group">
							<label class="col-md-4 control-label">Tipo</label>
							<div class="col-md-6">
								<select id="login_tipo"  name="login_tipo">
									<option>Selecione</option>
									<option value=1 >ADM</option>
									<option value=1 >Funcionário</option>
									<option value=1 >Gerente</option>
									

								</select>
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
								<button type="submit" class="btn btn-primary">Registrar</button>
							

								</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
