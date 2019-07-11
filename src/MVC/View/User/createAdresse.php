<form class="form-horizontal" action="/user/doCreateUser" method="post">
	<div class="start">
		<h2>Jetzt registrieren</h2>
		<div class="where">
			<div class="adresse" style="background-color: #6FCBFF;">

				<h3>2</h3>
				<h3>Adresse</h3>
			</div>
			<div class="angaben">
				<h3>1</h3>
				<h3>Angaben</h3>
			</div>
		</div>
	</div>
	<div class="component" data-html="true">
		<div class="form-group">
			<div class="ausgleich">
				<input id="strasse" placeholder="Strasse" required name="strasse"
					type="text" class="form-control input-md"> 
				<input id="hausnummer"
					placeholder="Nr" required name="hausnummer" type="text"
					class="form-control input-md" pattern="[0-9]{0,7}">
			</div>
		</div>
		<div class="form-group">
			<input id="plz" placeholder="PLZ" required name="plz" type="text"
				class="form-control input-md" pattern="[0-9]{0,10}"> <input id="ort"
				placeholder="Ort" required name="ort" type="text"
				class="form-control input-md">
		</div>
		<div class="form-group">
			<div class="col-md-4">
				<input id="Land" name="land" type="text" placeholder="Land" required
					class="form-control input-md">
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4">
				<input id="stadt" name="stadt" type="text"
					placeholder="Stadt / Kanton" required class="form-control input-md">
			</div>
		</div>
		<div class="form-group">
			<input id="back" name="changeForward" value="Back" type="button"
				class="btn btn-primary"> 
			<input id="send" name="send"
				value="Absenden" type="submit" class="btn btn-primary">
		</div>
	</div>

</form>
