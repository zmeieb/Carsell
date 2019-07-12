<?php

require_once 'ConnectionHandler.php';


class Repository
{
    /**
     * Damit die generischen Querys wisse, um welche Tabelle es sich handelt,
     * gibt es diese Variabel. Diese muss in den konkreten Implementationen mit
     * dem Tabellennamen überschrieben werden. (Siehe beispiel oben).
     */
    protected $tableName = null;

    /**
     * Diese Funktion gibt den Datensatz mit der gegebenen id zurück.
     */
    public function readById($id)
    {
        // Query erstellen
        $query = "SELECT * FROM {$this->tableName} WHERE id=?";

        // Datenbankverbindung anfordern und, das Query "preparen" (vorbereiten)
        // und die Parameter "binden"
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $id);

        // Das Statement absetzen
        $statement->execute();

        // Resultat der Abfrage holen
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Ersten Datensatz aus dem Reultat holen
        $row = $result->fetch_object();

        // Datenbankressourcen wieder freigeben
        $result->close();

        // Den gefundenen Datensatz zurückgeben
        return $row;
    }

    /**
     * Diese Funktion gibt ein array mit allen Datensätzen aus der Tabelle
     * zurück.
     *
     *
     *
     */
    public function readAll($max = 100)
    {
        $query = "SELECT * FROM {$this->tableName} LIMIT 0, $max";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
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
     * Diese Funktion löscht den Datensatz mit der gegebenen id.
     *
     *
     */
    public function deleteById($id)
    {
        $query = "DELETE FROM {$this->tableName} WHERE id=?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $id);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }
}
