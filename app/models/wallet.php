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

            try{
                $sql = "INSERT INTO wallets (user_id, name, currency, initial_balance) 
                    VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                return $stmt->execute([
                $user_id, 
                $name, 
                $currency, 
                $initial_balance
                ]);
            }catch(PDOException $e){
                return false;
            }
            
        }
        public function getWalletsByUserId($user_id) {
            global $conn;
            $sql = "SELECT name, currency FROM wallets WHERE user_id = ? ORDER BY name ASC";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$user_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getWalletID($wallet){
            global $conn;
            $sql = 'SELECT id FROM wallets WHERE name = ? LIMIT 1';
            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute([$wallet]);

                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result ["id"];
            }
            catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return null;
            }
        }


        
        public function addTransaction($user_id, $wallet_id, $amount, $description, $date, $is_transfer = 0, $to_wallet_id = null) {
            global $conn;
            $sql = "INSERT INTO transactions (
                        user_id, 
                        wallet_id, 
                        amount, 
                        description, 
                        transaction_date, 
                        is_transfer, 
                        to_wallet_id
                    ) VALUES (?, ?, ?, ?, ?, ?, ?)"; 

            try {
                $stmt = $conn->prepare($sql);
                $success = $stmt->execute([
                    $user_id,
                    $wallet_id,
                    $amount,
                    $description,
                    $date,
                    $is_transfer,
                    $to_wallet_id
                ]);
                return $success;

            } catch (PDOException $e) {
                return false;
            }
        }
        
    }