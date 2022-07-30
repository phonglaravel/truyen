<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html>

<!-- Head -->
<head>

<title>ADMIN TRUYỆN ONLINE</title>

<!-- Meta-Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="Existing Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>


<!-- Style --> <link rel="stylesheet" href="css/stylelg.css" type="text/css" media="all">

<!-- Fonts -->
<link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
<!-- //Fonts -->

</head>
<!-- //Head -->

<!-- Body -->
<body>

	<h1>ADMIN TRUYỆN ONLINE LOGIN</h1>

	<div class="w3layoutscontaineragileits">
	<h2>Login here</h2>
		<form action="{{ route('login') }}	" method="post">
			@csrf
			<input type="email" Name="email" placeholder="EMAIL" required="">
			<br/>
			@error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
			<input type="password" Name="password" placeholder="PASSWORD" required="">
			@error('password')
                <span class="invalid-feedback" role="alert">
                {{ $message }}
                </span>
            @enderror
			<ul class="agileinfotickwthree">
				<li>
					<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
					<label for="brand1"><span></span>Remember me</label>
					<a href="{{ route('password.request') }}">Forgot password?</a>
				</li>
			</ul>
			<div class="aitssendbuttonw3ls">
				<input type="submit" value="LOGIN">
				
				<div class="clear"></div>
			</div>
		</form>
	</div>
	
	
	
	

	
	

	
</body>
<!-- //Body -->

</html>