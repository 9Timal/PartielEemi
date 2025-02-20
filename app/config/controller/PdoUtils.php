<?php

class PdoUtils {

    private static $_pdo;
    private static $_db_name = 'partieleemi';
    private static $_db_host = 'localhost';
    private static $_db_user = 'root';
    private static $_db_pass = '';

    public static function getConnection() {
        try {
            self::$_pdo = new PDO('mysql:host='.self::$_db_host.';dbname='.self::$_db_name, self::$_db_user, self::$_db_pass);
            self::$_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Erreur de connexion : ' . $e->getMessage();
        }
        return self::$_pdo;
    }

    
    public static function ExecSQL($sql, $params = NULL){

        try{
            $pdo = PdoUtils::getConnection();
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
            return true ;
        }catch(Exception $e){
            die("Erreur lors de l'inscription : " . $e->getMessage());
        }
    } 


    public static function SelectSQL($sql, $params = NULL){

        try{
            $pdo = PdoUtils::getConnection();
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
            
            $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultat;
        
        }catch(Exception $e){

            die("Erreur: " . $e->getMessage());
        }
    }

    public static function SelectSQLAll($sql, $params = NULL){

        try{
            $pdo = PdoUtils::getConnection();
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
            
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        
        }catch(Exception $e){

            die("Erreur: " . $e->getMessage());
        }
    }
}

?>