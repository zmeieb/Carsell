<form id="formular" class="form-horizontal">
	<div class="start">
		<h2>Jetzt registrieren</h2>
		<div class="where">
			<div class="adresse">

				<h3>2</h3>
				<h3>Adresse</h3>
			</div>
			<div class="angaben" style="background-color: #6FCBFF;">
				<h3>1</h3>
				<h3>Angaben</h3>
			</div>
		</div>
	</div>
	<div class="component" data-html="true">
		<div class="form-group">
			<div class="radio">
				<div class="col-md-4">
					<div class="frau">
						<label>Frau</label><input id="frau" name="geschlecht" type="radio"
							class="form-control input-md">
					</div>
					<div class="herr">
						<label>Herr</label> 
							<input id="herr" name="geschlecht"
								type="radio" class="form-control input-md">
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4">
				<input id="benutzername" name="benutzername" type="text"
					placeholder="Benutzername" required class="form-control input-md"
					pattern=[A-Za-z0-9]{1-30}>
			</div>
		</div>
		<div class="form-group">

			<div class="col-md-4">
				<input id="vorname" name="vorname" type="text" placeholder="Vorname"
					required class="form-control input-md" pattern=[A-Za-z]{1-30}>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4">
				<input id="nachname" name="nachname" type="text"
					placeholder="Nachname" required class="form-control input-md"
					pattern=[A-Za-z]{1-30}>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label" for="geburtstag">Geburtstagsdatum</label>
				<div class="col-md-4">
					<select id="geburtstag">
						<option>1</option>
							<?php
                                for ($i = 2; $i <= 31; $i ++) {
                                    echo "<option value=$i>$i</option>";
                                }
                             ?>
    					</select> <select id="geburtsmonat">
    					<option>1</option>
    						<?php
                                for ($i = 2; $i <= 12; $i ++) {
                                    echo "<option value=$i>$i</option>";
                                }
                             ?>
    					</select><select id="geburtsjahr">
    					<option>2018</option>
    						<?php
                                for ($i = 2017; $i >= 1900; $i --) {
                                    echo "<option value=$i>$i</option>";
                                }
                                ?>
    					</select>
    			</div>
    		</div>
		<div class="form-group">
			<div class="col-md-4">
				<input id="email" name="email" type="email" placeholder="E-Mail"
					required class="form-control input-md"
					pattern="[A-Za-z0-9\._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}">
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4">
				<input id="passwort" name="passwort" type="password"
					placeholder="Passwort" required class="form-control input-md">
			</div>
		</div>
		<div class="form-group">
			<div class="buttonNext">
				<input id="next" name="changeForward" value="Next Step"
					type="submit" class="btn btn-primary">
			</div>
		</div>
	</div>
</form>
