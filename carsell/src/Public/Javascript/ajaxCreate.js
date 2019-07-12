$(document).ready(function() {

	/**
	 * Funktion um vom "createAngaben" zum
	 * "createAdresse" mit AJAX wechseln.
	 * Nebenbei sollten alle Werte die auf
	 * createAngaben erstellt werden, auf
	 * die
	 * createAdresse mitgebracht werden,
	 * damit auch alles in die Datenbank
	 * geschrieben wird.
	 */
	
	$("#formular").submit(function(event){
		
		event.preventDefault();
		
		var benutzername = $("#benutzername").val();
		var vorname = $("#vorname").val();
		var nachname = $("#nachname").val();
		var geburtstag = $("#geburtstag").val();
		var geburtsmonat = $("#geburtsmonat").val();
		var geburtsjahr = $("#geburtsjahr").val();
		var geburtstag = $("#geburtstag").val();
		var email = $("#email").val();
		var passwort = $("#passwort").val();
		
		
		$.post("/user/createAdresse", { benutzername: benutzername, vorname: vorname, nachname: nachname, geburtstag: geburtstag, geburtsmonat: geburtsmonat, geburtsjahr: geburtsjahr, email: email, passwort: passwort }, 
				function(data, status) {
				   $('#content').html(data);
				});		

		
		return false;
		
	});
	/**
	 * Damit man auch wieder von der createAdresse view zurück zur createAngaben view kommt haben wir auch noch diese Funktion.
	 */
	$("#back").click(function(){
		
		$.get("/user/createBack", 
				function(data, status) {
				   $('#content').html(data);
				});		
	});

});
