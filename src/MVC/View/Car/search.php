<body>
	<form>
		<div class="sidebar">
			<div class="btn-group-vertical">
				<input type="button" class="btn btn-secondary btn-lg, sidebarbutton"
					value="Cabriolet"
					onclick="window.location.href='http://stu-inf-2017-zh-carsell.local/car/showModel?model=cabriolet'" />
				<input type="button" class="btn btn-secondary btn-lg, sidebarbutton"
					value="Coupé"
					onclick="window.location.href='http://stu-inf-2017-zh-carsell.local/car/showModel?model=coupe'" />
				<input type="button" class="btn btn-secondary btn-lg, sidebarbutton"
					value="Kombi"
					onclick="window.location.href='http://stu-inf-2017-zh-carsell.local/car/showModel?model=kombi'" />
				<input type="button" class="btn btn-secondary btn-lg, sidebarbutton"
					value="Roadster"
					onclick="window.location.href='http://stu-inf-2017-zh-carsell.local/car/showModel?model=roadster'" />
				<input type="button" class="btn btn-secondary btn-lg, sidebarbutton"
					value="Sport"
					onclick="window.location.href='http://stu-inf-2017-zh-carsell.local/car/showModel?model=sport'" />

				<input type="button" class="btn btn-secondary btn-lg, sidebarbutton"
					value="SUV"
					onclick="window.location.href='http://stu-inf-2017-zh-carsell.local/car/showModel?model=suv'" />
			</div>

		</div>

	</form>
	<div class="col-6">
		<table>
	<?php
$i = 1;
foreach ($autos as $auto) {
    if ($i % 2 != 0 or $i == 1) {
        ?>	<tr>
				<td><a
					href="http://stu-inf-2017-zh-carsell.local/car/carview?id=<?= $auto->id ?>">
						<img src="../Images/<?= $auto->model ?>.jpg"><?php
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
					href="http://stu-inf-2017-zh-carsell.local/car/carview?id=<?= $auto->id ?>">
						<img src="../Images/<?= $auto->model ?>.jpg"><?php
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
						<?php if(Authentication::isLoggedIn()){?>
						<input type="button" class="btn btn-secondary btn-lg, sellbutton"
							value="Jetzt Auto verkaufen !"
							onclick="window.location.href='http://stu-inf-2017-zh-carsell.local/car/sell'" />
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