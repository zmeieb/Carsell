<?php
require_once '../Libraries/Repository.php';

/**
 * UserRepository erbt zum Beispiel die Methode readById() oder getAll() vom Repository.
 */
class CarRepository extends Repository
{

    public function getAll()
    {
        $query = "SELECT * FROM auto, user where auto.user_id = user.id";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        if (! $result) {
            throw new Exception($statement->error);
        }
        
        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }
        
        return $rows;
    }

    /**
     * Die Funktion "create" ist dafür da, dass man ein Auto in die Datenbank schreiben kann, also in unserem Beispiel: ein Auto verkaufen.
     */
    public function create($marke, $model, $zustand, $leistung, $zylinder, $sofortkaufpreis, $startpreis, $aktuellesgebot, $user_id)
    {
        $query = "INSERT INTO auto (marke, model, zustand, leistung, zylinder, sofortkaufpreis, startpreis, aktuellesgebot, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $mysqli = ConnectionHandler::getConnection();
        $statement = $mysqli->prepare($query);
        
        if (false === $statement) {
            $errorMessage = $mysqli->error;
            throw new Exception($errorMessage);
        }
        
        $statement->bind_param('sssiiiiii', $marke, $model, $zustand, $leistung, $zylinder, $sofortkaufpreis, $startpreis, $aktuellesgebot, $user_id);
        
        /**
         * Falls das Statement nicht abgesetzt werden konnte, geht es in die if Schleife und wirft einen Error.
         */
        
        if (! $statement->execute()) {
            throw new Exception($statement->error);
        }
        
        return $statement->insert_id;
    }

    /**
     * Die Funktion "showByModel" gibt uns die einzelnen Autos nach ihren Modellen von der Datenbank aus.
     * Man muss einfach, via GET das Model mitgeben.
     */
    public function showByModel($model)
    {
        $query = "select marke, model, auto.id, zustand, leistung, zylinder, sofortkaufpreis, startpreis, aktuellesgebot, vorname, nachname from auto, user where model = ? and auto.user_id = user.id;";
        
        $mysqli = ConnectionHandler::getConnection();
        $statement = $mysqli->prepare($query);
        
        if (false === $statement) {
            $errorMessage = $mysqli->error;
            throw new Exception($errorMessage);
        }
        
        $statement->bind_param('s', $model);
        
        $statement->execute();
        
        $result = $statement->get_result();
        if (! $result) {
            throw new Exception($statement->error);
        }
        
        /**
         * Das Resultat schreibt man dan in ein Array und man muss es dann mit einer foreach- oder forschleife auslesen.
         */
        
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }
        
        $result->close();
        
        /**
         * Am Schluss wird die Liste "rows" mit den einzelnen Daten zurückgegeben.
         */
        
        return $rows;
    }

    /**
     * Die Funktion "showById" ist macht das genau gleiche wie die Funktion "showByModel" nur mit der "$id".
     */
    public function showById($id)
    {
        $query = "select marke, model, auto.id, zustand, leistung, zylinder, sofortkaufpreis, startpreis, aktuellesgebot, vorname, nachname from auto, user where auto.id = ? and auto.user_id = user.id;";
        
        $mysqli = ConnectionHandler::getConnection();
        $statement = $mysqli->prepare($query);
        
        if (false === $statement) {
            $errorMessage = $mysqli->error;
            throw new Exception($errorMessage);
        }
        
        $statement->bind_param('i', $id);
        
        $statement->execute();
        
        $result = $statement->get_result();
        if (! $result) {
            throw new Exception($statement->error);
        }
        
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }
        
        $result->close();
        
        return $rows;
    }

    /**
     * Die Funktion "delteById" ist hier um eine Auto aus der Datenbank zu löschen.
     */
    public function deleteById($id)
    {
        $query = "DELETE FROM auto WHERE id=?";
        
        $mysqli = ConnectionHandler::getConnection();
        $statement = $mysqli->prepare($query);
        
        if (false === $statement) {
            $errorMessage = $mysqli->error;
            throw new Exception($errorMessage);
        }
        
        $statement->bind_param('i', $id);
        
        if (! $statement->execute()) {
            throw new Exception($statement->error);
        }
    }

    /**
     * Die Funktion "search" ist da um nach einem einzelnen Auto oder nach etwas Anderem zu suchen.
     */
    public function search($attribut)
    {
        $query = "select marke, model, auto.id, zustand, leistung, zylinder, sofortkaufpreis, startpreis, aktuellesgebot, vorname, nachname from auto, user where marke like ? or model like ? or zustand like ?;";
        
        /**
         * Man muss zum Beispiel bei der Variable "$attribut1" noch ein % vornedranhenken, da man in SQL bei einer like-Abfrage, ein Prozent vorne und hinten gebrauchen kann/muss.
         */
        
        $attribut1 = "%" . $attribut . "%";
        $attribut2 = "%" . $attribut . "%";
        $attribut3 = "%" . $attribut . "%";
        
        $mysqli = ConnectionHandler::getConnection();
        $statement = $mysqli->prepare($query);
        
        if (false === $statement) {
            $errorMessage = $mysqli->error;
            throw new Exception($errorMessage);
        }
        
        $statement->bind_param('sss', $attribut1, $attribut2, $attribut3);
        
        $statement->execute();
        
        $result = $statement->get_result();
        if (! $result) {
            throw new Exception($statement->error);
        }
        
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }
        $result->close();
        
        return $rows;
    }
}
