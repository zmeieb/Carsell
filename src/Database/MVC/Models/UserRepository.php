<?php
require_once '../Libraries/Repository.php';

/**
 * UserRepository erbt zum Beispiel die Methode readById() oder getAll() vom Repository.
 */

class UserRepository extends Repository
{
    
    /**
    * Funktion "createUser" erstellt einen neuen User in der Datenbank
    */
    
    public function createUser($benutzername, $vorname, $nachname, $email, $passwort, $geburtstag, $geburtsmonat, $geburtsjahr, $strasse, $hausnummer, $plz, $ort, $land, $stadt)
    {
        $passwort = sha1($passwort);
        
        $query = "INSERT INTO user (benutzername, vorname, nachname, email, passwort, geburtstag, geburtsmonat, geburtsjahr, strasse, hausnummer, plz, ort, land, stadt) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $mysqli = ConnectionHandler::getConnection();
        $statement = $mysqli->prepare($query);
        
        if (false === $statement) {
            $errorMessage = $mysqli->error;
            throw new Exception($errorMessage);
        }
        
        $statement->bind_param('sssssssssiisss', $benutzername, $vorname, $nachname, $email, $passwort, $geburtstag, $geburtsmonat, $geburtsjahr, $strasse, $hausnummer, $plz, $ort, $land, $stadt);
        
        $statement->execute();
        
        return $statement->insert_id;
    }
    
    /**
     * Funktion "exissts" schaut ob der Benutzer, mit dem man sich anmelden will, vorhanden ist und ob das Passwort mit dem Benutzer übereinstimmt.
     */
    
    public function exissts($userName, $password)
    {
        $password = sha1($password);
        
        $query = "select id from user where benutzername = ? And passwort = ?";
        $mysqli = ConnectionHandler::getConnection();
        
        // escapen und preparen wegen Gefahr auf SQL Injection
        
        $userName = $mysqli->escape_string($userName);
        $statement = $mysqli->prepare($query);
        
        if (false === $statement) {
            $errorMessage = $mysqli->error;
            throw new Exception($errorMessage);
        }
        $statement->bind_param('ss', $userName, $password);
        
        $statement->execute();
        $result = $statement->get_result();
        $row = $result->fetch_object();
        if (isset($row)) {
            return $row->id;
        } else {
            return - 1;
        }
    }
}
