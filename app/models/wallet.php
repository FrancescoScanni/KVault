<?php
    require_once("connectionDB.php");
    require_once("../models/connectionDB.php");
    class Wallet {
        private $table = "wallets";
        public $id;
        public $user_id;
        public $name;
        public $currency;
        public $initial_balance;
        


        public function createWallet($user_id,$name,$currency,$initial_balance){
            global $conn;
            $sql = "INSERT INTO wallets (user_id, name, currency, initial_balance) 
                    VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            return $stmt->execute([
            $user_id, 
            $name, 
            $currency, 
            $initial_balance
            ]);
            return false;
        }
        
    }