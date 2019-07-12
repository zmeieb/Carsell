<body>
	<form>
		<div class="sidebar">
			<div class="btn-group-vertical">
				<input type="button" class="btn btn-secondary btn-lg, sidebarbutton"
					value="Cabriolet"
					onclick="window.location.href='http://localhost/car/showModel?model=cabriolet'" />
				<input type="button" class="btn btn-secondary btn-lg, sidebarbutton"
					value="Coupé"
					onclick="window.location.href='http://localhost/car/showModel?model=coupe'" />
				<input type="button" class="btn btn-secondary btn-lg, sidebarbutton"
					value="Kombi"
					onclick="window.location.href='http://localhost/car/showModel?model=kombi'" />
				<input type="button" class="btn btn-secondary btn-lg, sidebarbutton"
					value="Roadster"
					onclick="window.location.href='http://localhost/car/showModel?model=roadster'" />
				<input type="button" class="btn btn-secondary btn-lg, sidebarbutton"
					value="Sport"
					onclick="window.location.href='http://localhost/car/showModel?model=sport'" />

				<input type="button" class="btn btn-secondary btn-lg, sidebarbutton"
					value="SUV"
					onclick="window.location.href='http://localhost/car/showModel?model=suv'" />

			</div>

		</div>

	</form>
	<div class="col-6">
		
	<?php

/**
 * Hier machen wir eine Tabelle für die Ansicht der einzelnen Autos, wird haben eine forearch-Schlaufe gemacht, welche alle Daten aus der DB ausliest. 
 * Dann schauen wir wann man einen "tr" öffen und schliessen machen muss und dieses steurn wir mit if/else. Wir geben auch im URL den Querry-String mit, damit wenn
 * man auf ein Auto klickt das richtige Auto angezeigt wird.
 */

?>
		
		<table>
	<?php
$i = 1;
foreach ($autos as $auto) {
    if ($i % 2 != 0 or $i == 1) {
        ?>	<tr>
				<td><a
					href="http://localhost/car/carview?id=<?= $auto->id ?>">
						<img src="../Images/<?= $image ?>.jpg"><?php
        echo "Marke: " . $auto->marke . "<br>";
        echo "Model: " . $auto->model . "<br>";
        echo "Zustand: " . $auto->zustand . "<br>";
        echo "Leistung: " . $auto->leistung . "<br>";
        echo "Verkäufer: " . $auto->vorname . " " . $auto->nachname?>
	</a></td>
	<?php
        $i = $i + 1;
    } else {
        ?>
	 <td><a
					href="http://localhost/car/carview?id=<?= $auto->id ?>">
						<img src="../Images/<?= $image ?>.jpg"><?php
        echo "Marke: " . $auto->marke . "<br>";
        echo "Model: " . $auto->model . "<br>";
        echo "Zustand: " . $auto->zustand . "<br>";
        echo "Leistung: " . $auto->leistung . "<br>";
        echo "Verkäufer: " . $auto->vorname . " " . $auto->nachname?>
	</a></td>
			</tr>
	<?php
        $i = $i + 1;
    }
}
?>
	</table>
	</div>

	<div class=" fixed">
		<div class="row">
			<div class="col-sm">
				<div class="back">
					<form>
					<?php 
					/**
					 * Diese Abfrage überprüft ob man angemeldet ist, wir haben die Variable "$visible" im Controller auf "true" gesetzt, falls man angemeldet ist.
					 * Also dieser Button wird nur angezeigt, falls man angemeldet ist.
					 */
					
					if(Authentication::isLoggedIn()){?>
						<input type="button" class="btn btn-secondary btn-lg, sellbutton"
							value="Jetzt Auto verkaufen !"
							onclick="window.location.href='http://localhost/car/sell'" />
						<?php
    }
    ?>
					</form>
				</div>
			</div>
			<div class="col-sm"></div>
			<div class="col-sm"></div>
			<div class="col-sm"></div>
			<div class="col-sm, buy"></div>
		</div>
	</div>