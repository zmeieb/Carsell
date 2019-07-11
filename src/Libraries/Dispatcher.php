<?php
require_once 'UriParser.php';
class Dispatcher
{
    public static function dispatch()
    {
        try {
            $controllerName = UriParser::getControllerName() . "Controller";
            $methodName = UriParser::getMethodName();
            
            // Den gewünschten Controller laden
            require_once "../MVC/Controllers/$controllerName.php";
            
            // Eine neue Instanz des Controllers wird erstellt und die gewünschte
            // Methode darauf aufgerufen.
            $controller = new $controllerName();
            $controller->$methodName(); 
            
        } catch (Throwable $error) {
            ob_end_clean();                 // Bisherige Ausgabe wird gelöscht
            error_log($error);              // Error wird geloggt im Apache (Error.log)
            echo "Fehler";  // Default Errorseite wird dem Benutzer angezeigt
        }
        
    }
}
