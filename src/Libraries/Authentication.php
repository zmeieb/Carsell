<?php
class Authentication
{
    public static function isLoggedIn()
    {
        if (isset($_SESSION["loggedIn"])) {
            if ($_SESSION["loggedIn"] > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
