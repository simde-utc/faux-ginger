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
            "is_cotisant" => true,
            "badge_uid" => "123456AB",
            "expiration_badge" => "2018-02-16"
        ),
    );    

    public static function getByLogin($login){
        foreach(self::$users as $user){
            if($user["login"] == $login){
                return $user;
            }
        }
        return null;
    }

    public static function getByBadge($badge){
        foreach(self::$users as $user){
            if($user["badge_uid"] == $badge){
                return $user;
            }
        }
        return null;
    }

} 
