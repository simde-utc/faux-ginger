<?php

class Users {
    protected static $users = array(
        array(
            "login" => "puyouart",
            "nom" => "Puyou",
            "prenom" => "Arthur",
            "mail" => "arthur.puyou@etu.utc.fr",
            "type" => "etu",
            "is_adulte" => true,
            "badge_uid" => "123456AB",
            "expiration_badge" => "2018-02-16"
        ),
        array(
            "login" => "trecouvr",
            "nom" => "Recouvreux",
            "prenom" => "Thomas",
            "mail" => "thomas.recouvreux@etu.utc.fr",
            "type" => "etu",
            "is_adulte" => true,
            "badge_uid" => "ABCDABCD",
            "expiration_badge" => "2018-01-01"
        ),
        array(
            "login" => "mguffroy",
            "nom" => "Guffroy",
            "prenom" => "Matthieu",
            "mail" => "matthieu.guffroy@etu.utc.fr",
            "type" => "etu",
            "is_adulte" => true,
            "badge_uid" => "01234567",
            "expiration_badge" => "2018-01-01"
        ),
        array(
            "login" => "amiotnoe",
            "nom" => "Amiot",
            "prenom" => "Noe",
            "mail" => "noe.amiot@etu.utc.fr",
            "type" => "etu",
            "is_adulte" => true,
            "badge_uid" => "00000001",
            "expiration_badge" => "2020-01-01"
        ),
    );

    public static function getByLogin($login){
        foreach(self::$users as $user){
            if($user["login"] == $login){
                $user["is_cotisant"] = self::isCotisant($login);
                return $user;
            }
        }
        return null;
    }

    public static function getByBadge($badge){
        foreach(self::$users as $user){
            if($user["badge_uid"] == $badge){
                $user["is_cotisant"] = self::isCotisant($user["login"]);
                return $user;
            }
        }
        return null;
    }

    public static function isCotisant($login) {
        $cotiz = Cotisations::getByUser($login);
        foreach ($cotiz as $cotisation) {
            if($cotisation["fin"] > date("Y-m-d")) {
                return true;
            }
        }
        return false;
    }

}

class Cotisations {
    protected static $cotisations = array(
        array(
            "user" => "amiotnoe",
            "id" => 1,
            "debut" => "1999-01-01",
            "fin" => "2017-01-01",
            "montant" => "20.00"
        ),
        array(
            "user" => "amiotnoe",
            "id" => 2,
            "debut" => "2017-12-31",
            "fin" => "2999-01-01",
            "montant" => "20.00"
        ),
        array(
            "user" => "puyouart",
            "id" => 3,
            "debut" => "2017-12-31",
            "fin" => "2999-01-01",
            "montant" => "20.00"
        ),
        array(
            "user" => "mguffroy",
            "id" => 4,
            "debut" => "2015-01-01",
            "fin" => "2016-01-01",
            "montant" => "10.00"
        ),
    );

    public static function getByUser($login){
        $cotiz = [];
        foreach(self::$cotisations as $cotisation){
            if($cotisation["user"] == $login){
                unset($cotisation["user"]);
                $cotiz[] = $cotisation;
            }
        }
        return !empty($cotiz) ? $cotiz : null;
    }
}
