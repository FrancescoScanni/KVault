<?php
    require_once("connectionDB.php");
    
    class Wallet {
        private $table = "wallets";
        public $id;
        public $user_id;
        public $name;
        public $currency;
        public $initial_balance;
        

        //WALLETS  
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


        //TRANSACTIONS
        public function addTransaction($user_id, $wallet_id, $amount, $description, $date, $income) {
            global $conn;

            try {
                $conn->beginTransaction();

                $sqlInsert = "INSERT INTO transactions (
                                user_id, wallet_id, amount, description, 
                                transaction_date, income
                            ) VALUES (?, ?, ?, ?, ?, ?)";
                
                $stmtInsert = $conn->prepare($sqlInsert);
                $stmtInsert->execute([
                    $user_id,
                    $wallet_id,
                    $amount,
                    $description,
                    $date,
                    $income
                ]);


                if ($income) {
                    $sqlUpdate = "UPDATE wallets SET initial_balance = initial_balance + ? WHERE id = ? AND user_id = ?";
                }else {
                    $sqlUpdate = "UPDATE wallets SET initial_balance = initial_balance - ? WHERE id = ? AND user_id = ?";
                }
                
                $stmtUpdate = $conn->prepare($sqlUpdate);
                $stmtUpdate->execute([
                    $amount, 
                    $wallet_id, 
                    $user_id
                ]);

                $conn->commit();
                return true;

            } catch (PDOException $e) {
                if ($conn->inTransaction()) {
                    $conn->rollBack();
                }
                error_log("Errore transazione: " . $e->getMessage());
                return false;
            }
        }

        
        //DASHBOARD
        public function getTotalBalance($user_id) {
            global $conn;
            $sql = "SELECT SUM(initial_balance) AS total_balance FROM wallets WHERE user_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$user_id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total_balance'] ?? 0;
        }
        public function getTotalIncome($user_id){
            global $conn;
            $sql="SELECT SUM(amount)FROM transactions WHERE income=1 AND user_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$user_id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['SUM(amount)'] ?? 0;
        }
        public function getTotalExpense($user_id){
            global $conn;
            $sql="SELECT SUM(amount)FROM transactions WHERE income=0 AND user_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$user_id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['SUM(amount)'] ?? 0;
        }
        public function getWallets($user_id) {
            global $conn;
            try {
            $sql = "SELECT * from wallets  WHERE user_id=? ORDER BY name ASC;";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$user_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log("Errore recupero portafogli: " . $e->getMessage());
                return [];
            }
        }
    }