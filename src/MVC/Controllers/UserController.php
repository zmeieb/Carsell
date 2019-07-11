<?php
require_once '../MVC/Models/UserRepository.php';
require_once '../Libraries/Authentication.php';

class UserController
{

    /**
     * "index" ist die Ansich, bei welcher man sich einloggen kann.
     */
    public function index()
    {
        if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] > 0) {
            $_SESSION["loggedIn"] = False;
            session_destroy();
        }
        $view = new View('index');
        $view->title = 'Jetzt Anmelden - Carsell';
        $view->heading = '';
        $view->display();
    }

    /**
     * "doLogin" ist die Funktion, welche ausgeführt wird, wenn man den Submit-Button in der Index-View drückt.
     */
    public function doLogin()
    {
        $userRepository = new UserRepository();
        
        /**
         * Zuerst wird geschaut ob etwas eingefüllt wurde, falls das der Fall ist werden die beiden Werte in die beiden Variablen gesetzt und dann bei der Methode
         * "exists" mitgegeben und dann wird noch geprüft ob man jetzt eingeloggt ist und falls das der Fall ist, dann wird die Session "loggedIn" gesetzt.
         */
        
        if (isset($_POST['userName']) && isset($_POST['password'])) {
            
            /**
             * "htmlspecialchars", da man sich gegen XSS schützen sollte.
             */
            
            $userName = htmlspecialchars($_POST['userName']);
            $password = htmlspecialchars($_POST['password']);
            if (($id = $userRepository->exissts($userName, $password)) > 0) {
                $_SESSION["loggedIn"] = $id;
                header("Location: /");
            } else {
                header("Location: /user");
            }
        } else {
            header('HTTP/1.0 401 Unauthorized');
        }
    }

    /**
     * "createAngaben" ist die Ansicht, bei welcher man sich registrieren kann.
     */
    public function createAngaben()
    {
        $view = new View('createAngaben');
        $view->title = 'Registrieren - Carsell';
        $view->heading = '';
        $view->display();
    }

    /**
     * "createAdresse" ist die Ansicht, bei welcher man sich registrieren kann und die Daten aus der "createAngaben" Ansicht werden via Session mitgenommen.
     */
    public function createAdresse()
    {
        /**
         * Man schreibt die Daten, welche man via POST von der View holt, in die Session rein.
         */
        $_SESSION["vorname"] = htmlspecialchars($_POST["vorname"]);
        $_SESSION["nachname"] = htmlspecialchars($_POST["nachname"]);
        $_SESSION["passwort"] = htmlspecialchars($_POST["passwort"]);
        $_SESSION["email"] = htmlspecialchars($_POST["email"]);
        $_SESSION["geburtstag"] = htmlspecialchars($_POST["geburtstag"]);
        $_SESSION["geburtsmonat"] = htmlspecialchars($_POST["geburtsmonat"]);
        $_SESSION["geburtsjahr"] = htmlspecialchars($_POST["geburtsjahr"]);
        $_SESSION["benutzername"] = htmlspecialchars($_POST["benutzername"]);
        
        $view = new View('createAdresse');
        $view->title = 'Registrieren - Carsell';
        $view->heading = '';
        $view->display(true);
    }

    /**
     * "createBack" ist die Ansicht, falls man von "createAdresse" zurück zu "createAngaben" gehen will, via Button, und es muss eine neue View geben sonst wäre die Ansicht
     * redundant.
     */
    public function createBack()
    {
        $view = new View('createAngaben');
        $view->title = 'Registrieren - Carsell';
        $view->heading = '';
        $view->display(true);
    }

    /**
     * "doCreateUser" ist die Funktion, welche ausgeführt wird, wenn man auf den Submit-Button drückt bei der "createAdresse" Ansicht.
     */
    public function doCreateUser()
    {
        $vorname = $_SESSION['vorname'];
        $nachname = $_SESSION['nachname'];
        $passwort = $_SESSION['passwort'];
        $email = $_SESSION['email'];
        $geburtstag = $_SESSION['geburtstag'];
        $geburtsmonat = $_SESSION['geburtsmonat'];
        $geburtsjahr = $_SESSION['geburtsjahr'];
        $benutzername = $_SESSION['benutzername'];
        $strasse = htmlspecialchars($_POST['strasse']);
        $hausnummer = htmlspecialchars($_POST['hausnummer']);
        $plz = htmlspecialchars($_POST['plz']);
        $ort = htmlspecialchars($_POST['ort']);
        $land = htmlspecialchars($_POST['land']);
        $stadt = htmlspecialchars($_POST['stadt']);
        
        $userRepository = new UserRepository();
        $userRepository->createUser($benutzername, $vorname, $nachname, $email, $passwort, $geburtstag, $geburtsmonat, $geburtsjahr, $strasse, $hausnummer, $plz, $ort, $land, $stadt);
        
        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }
}
