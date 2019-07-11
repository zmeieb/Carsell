<?php
class UriParser
{
    /**
     * Diese Methode wertet die Request URI aus.
     */
    public static function getControllerName()
    {
        $uriFragments = UriParser::getUriFragments();
     
        // Den Namen des gewünschten Controllers ermitteln 
        if (!empty($uriFragments[0])) {
            $controllerName = $uriFragments[0];
            $controllerName = ucfirst($controllerName); // Erstes Zeichen grossschreiben
            return $controllerName; // "Controller" anhängen
        }
        
        return 'Default';
    }
    
    public static function getMethodName()
    {
        $uriFragments = UriParser::getUriFragments();
        
        // Den Namen der auszuführenden Methode ermitteln
        $method = 'index';
        if (!empty($uriFragments[1])) {
            $method = $uriFragments[1];
        }
        
        return $method;
    }
    
    private static function getUriFragments()
    {
        // Die URI wird aus dem $_SERVER Array ausgelesen und in ihre
        // Einzelteile zerlegt.
        // /user/index/foo --> ['user', 'index', 'foo']
        $uri = $_SERVER['REQUEST_URI'];
        $uri = strtok($uri, '?'); // Erstes ? und alles danach abschneiden
        $uri = trim($uri, '/'); // Alle / am anfang und am Ende der URI abschneiden
        $uriFragments = explode('/', $uri); // In einzelteile zerlegen
        
        return $uriFragments;
    }
}