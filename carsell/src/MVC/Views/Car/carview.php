
<?php

/**
 * Hier machen wir wieder eine foreach-Schleife welche alle Daten aus der DB ausliest.
 */
foreach ($auto as $info) {
    
    /**
     * Hier hat man eine Slideshow von eingen Fotos, welche immer die gleichen sind, da wir uns nicht die Mühe machen wollten so viele Bilder herauszusuchen.
     */
    
    ?>
<div class="col-6 slide">
	<div id="carouselExampleIndicators" class="carousel slide"
		data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0"
				class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="../Images/cabriolet.jpg"
					alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="../Images/audi.jpg"
					alt="Second slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="../Images/bmw.jpg" alt="Third slide">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators"
			role="button" data-slide="prev"> <span
			class="carousel-control-prev-icon" aria-hidden="true"></span> <span
			class="sr-only">Previous</span>
		</a> <a class="carousel-control-next"
			href="#carouselExampleIndicators" role="button" data-slide="next"> <span
			class="carousel-control-next-icon" aria-hidden="true"></span> <span
			class="sr-only">Next</span>
		</a>
	</div>
</div>
<div class=" fixed">
	<div class="row">
		<div class="col-sm">
			<div class="back">
				<form>
					<input type="button" class="btn btn-secondary btn-lg, backbutton"
						value="Zurück"
						onclick="window.location.href='http://localhost/car'" />

				</form>
			</div>
		</div>
		<div class="col-sm"></div>
		<div class="col-sm"></div>
		<div class="col-sm"></div>
		<div class="col-sm, buy">
			<div class="preis">
				<form>
					<input type="button" class="btn btn-secondary btn-lg, buybutton"
						value="Aktuelles Gebot:  <?= $info->aktuellesgebot?> CHF"
						onclick="window.location.href='http://localhost/car'" />


				</form>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm info">
			<?php
    echo "Marke: " . $info->marke . "<br>";
    echo "Model: " . $info->model . "<br>";
    echo "Zustand: " . $info->zustand . "<br>";
    echo "Leistung: " . $info->leistung . "<br>";
    echo "Zylinder: " . $info->zylinder . "<br>";
    echo "Verkäufer: " . $info->vorname . " " . $info->nachname?>
    
			    </div>
		<div class="col-sm, buy">
			<div class="preis">
			<?php if(Authentication::isLoggedIn()){
			
			    /**
			     * Dieser Button dient dazu, dass man ein Auto "kaufen" kann, falls der Button gedrückt wird, dann wird die Methode doDelete gelöscht, bei welcher
			     * die "$id" mitgegeben wurde, damit nicht irgend ein Auto gelöscht wird.
			     */
			    
			    ?>
				<a class="btn btn-secondary btn-lg, sofortbutton"
					href="/car/doDelete?id=<?=$info->id ?>" type="submit">Sofortkaufpreis: <?= $info->sofortkaufpreis?> CHF, wollen sie es kaufen?</a>
			<?php
    }?> 
			</div>
		</div>
			<?php break; }?>
		</div>
</div>
