<div class="überschrift">
	<h2>Jetzt Auto verkaufen</h2>
</div>
<?php 

/**
 * Falls man den Submit-Button drückt, also den Button mit der Aufschrift "Abschicken", dann wird die Methode "doCreate" im CarController ausgeführt.
 */

?>
<form action="/car/doCreate" method="post">

	<div class="mitte">
		<input type="text" name="marke" class="form-control"
			placeholder="Marke (Audi, BMW, VW, ...)" required> <label> </label> <select
			class="custom-select" id="model" name="model" required>
			<option disabled selected></option>
			<option value="Cabriolet">Cabriolet</option>
			<option value="Coupe">Coupé</option>
			<option value="Kombi">Kombi</option>
			<option value="Roadster">Roadster</option>
			<option value="Sport">Sport</option>
			<option value="Suv">SUV</option>
		</select> <select class="custom-select" id="zustand" name="zustand"
			required>
			<option disabled selected></option>
			<option value="Neu">Neu</option>
			<option value="Gebraucht">Gebraucht</option>
		</select> <input type="text" name="leistung" class="form-control"
			placeholder="Leistung in PS(zum Beispiel: 200)" required pattern="[0-9]{1,4}"> <label> </label>
		<input type="text" name="zylinder" class="form-control"
			placeholder="Anzahl Zylinder (1, 2, 3, ...)" required pattern="[0-9]{1,2}"> <label> </label>
		<input type="text" name="sofortkaufpreis" class="form-control"
			placeholder="Sofortkaufpreis in CHF (zum Beispiel: 20000)" required pattern="[0-9]{1-7}"> <label>
		</label> <input type="text" name="startpreis" class="form-control"
			placeholder="Startpreis in CHF (zum Beispiel: 10000)" required pattern="[0-9]{1-7}"> <label>
		</label>

		<button class="btn btn-lg btn-primary btn-block abschickbutton"
			type="submit">Abschicken</button>
	</div>
</form>