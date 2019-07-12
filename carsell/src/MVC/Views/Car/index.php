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
			<tr>
				<td><img src="../Images/coupe.jpg"></td>
				<td><img src="../Images/suv.jpg"></td>
			</tr>
			<tr>
				<td><img src="../Images/kombi.jpg"></td>
				<td><img src="../Images/sport.jpg"></td>
			</tr>
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
    } ?>
					</form>
				</div>
			</div>
			<div class="col-sm"></div>
			<div class="col-sm"></div>
			<div class="col-sm"></div>
			<div class="col-sm, buy"></div>
		</div>
	</div>