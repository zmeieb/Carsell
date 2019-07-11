<?php
require_once '../Libraries/View.php';
require_once '../MVC/Models/CarRepository.php';
require_once '../Libraries/Authentication.php';
class CarController
{

    /**
     * "index" ist die Hauptansicht die man hat.
     */
    public function index()
    {
        $CarRepository = new CarRepository();
        
        $view = new View('index');
        $view->title = 'Home - Carsell';
        $view->heading = '';
        $view->autos = $CarRepository->getAll();
        $view->display();
    }

    /**
     * "search" ist die Ansicht, falls man eine Suche macht.
     */
    public function search()
    {
        $CarRepository = new CarRepository();
        
        /**
         * Bei dieser Abrage wird erst mal geschaut, ob das "searchfield" nicht leer ist und falls das der Fall ist geht es weiter, genau gleich wie beim "index".
         * Falls das "searchfield" leer ist, passiert einfach nichts.
         */
        
        if (isset($_POST['searchfield'])) {
            $view = new View('search');
            $view->title = 'Search - Carsell';
            $view->heading = '';
            $view->autos = $CarRepository->search(htmlspecialchars($_POST['searchfield']));
            $view->display();
        }
    }

    /**
     * "showModel" ist die Ansicht bei der man zum Beispiel nur die Autos mit dem Model "cabriolet" hat.
     */
    public function showModel()
    {
        $CarRepository = new CarRepository();
        
        /**
         * Hier wird wieder geschaut ob "$__GET['model]" leer ist oder nicht falls nicht wird der Wert in die Variable "$model" geschrieben.
         */
        
        if (isset($_GET['model'])) {
            $model = htmlspecialchars($_GET['model']);
        } else {
            $model = "index";
        }
        
        $view = new View("carmodel");
        $view->title = htmlspecialchars($_GET['model']) . "- Carsell";
        $view->heading = '';
        $view->image = htmlspecialchars($_GET['model']);
        $view->autos = $CarRepository->showByModel(htmlspecialchars($_GET['model']));
        $view->display();
    }

    /**
     * "carview" ist die Ansicht, bei welcher man nur ein Auto sieht.
     */
    public function carview()
    {
        $CarRepository = new CarRepository();
        
        $view = new View("carview");
        $view->title = "Kaufen - Carsell";
        $view->heading = '';
        $view->auto = $CarRepository->showById(htmlspecialchars($_GET['id']));
        $view->display();
    }

    /**
     * "sell" ist die Ansicht, bei welcher man ein Auto "verkaufen" kann, also einfach einen Eintrag in die DB machen.
     */
    public function sell()
    {
        if (Authentication::isLoggedIn()) {
            $view = new View('sell');
            $view->title = 'Verkaufen - Carsell';
            $view->heading = '';
            $view->visible = true;
            $view->display();
        } 
    }

    /**
     * "doCreate" ist die Funktion, welche ausgelöst wird, wenn man den Submit-Button in der Sell-View drückt.
     */
    public function doCreate()
    {
        $marke = htmlspecialchars($_POST["marke"]);
        $model = htmlspecialchars($_POST["model"]);
        $zustand = htmlspecialchars($_POST['zustand']);
        $leistung = htmlspecialchars($_POST['leistung']);
        $zylinder = htmlspecialchars($_POST['zylinder']);
        $sofortkaufpreis = htmlspecialchars($_POST['sofortkaufpreis']);
        $startpreis = htmlspecialchars($_POST['startpreis']);
        $aktuellesgebot = $startpreis;
        $user_id = 1;
        $CarRepository = new CarRepository();
        $CarRepository->create($marke, $model, $zustand, $leistung, $zylinder, $sofortkaufpreis, $startpreis, $aktuellesgebot, $user_id);
        
        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /car');
    }

    /**
     * "doDelete" ist die Funktion, welche ausgelöst wird, wenn man ein Auto kauft.
     */
    public function doDelete()
    
    {
        $CarRepository = new CarRepository();
        $CarRepository->deleteById(htmlspecialchars($_GET['id']));
        
        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /car');
    }
}