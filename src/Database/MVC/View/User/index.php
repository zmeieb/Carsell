
<!-- Custom styles for this template -->
<form class="form-signin" action="/user/doLogin" method="post">
	<div class="mid">
		<div class="überschrift">
			<h2>Jetzt anmelden!</h2>
		</div>
		<div>
			<input type="text" name="userName" id="inputBenutzername"
				class="form-control" placeholder="Benutzername" required autofocus>
			<label> </label>
		</div>

		<div>
			<input type="password" name="password" id="inputPassword"
				class="form-control" placeholder="Passwort" required> <label></label>
		</div>

		<button class="btn btn-lg btn-primary btn-block mainloginbutton"
			type="submit">Anmelden</button>
		<button class="btn btn-lg btn-primary btn-block mainloginbutton" onclick="window.location.href='http://stu-inf-2017-zh-carsell.local/user/createAngaben'"
			type="button">Jetzt registrieren</button>
	</div>
</form>
</body>
