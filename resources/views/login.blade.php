<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    html,body {
	height: 100%;
}

.global-container{
	height:100%;
	display: flex;
	align-items: center;
	justify-content: center;
	background-color: #f5f5f5;
}

form{
	padding-top: 10px;
	font-size: 14px;
	margin-top: 30px;
}

.card-title{ font-weight:300; }

.btn{
	font-size: 14px;
	margin-top:20px;
}


.login-form{
	width:330px;
	margin:20px;
}

.sign-up{
	text-align:center;
	padding:20px 0 0;
}

.alert{
	margin-bottom:-30px;
	font-size: 13px;
	margin-top:20px;
}
</style>
<div class="global-container">
	<div class="card login-form">
	<div class="card-body">
		<h3 class="card-title text-center">Log in to Codepen</h3>
		<div class="card-text">
			<!--
			<div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
			<form action="{{url('api/login')}}" method="post">
                @csrf
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" name="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('email')
                     <span class="text-danger">{{ $message }}</span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" name="password" class="form-control form-control-sm" id="exampleInputPassword1">
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                   @enderror
				</div>
				<button type="submit" class="btn btn-primary btn-block">Sign in</button>

				<div class="sign-up">
					Don't have an account? <a href="#">Create One</a>
				</div>
			</form>
		</div>
	</div>
</div>
</div>

