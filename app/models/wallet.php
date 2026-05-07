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

                if ($_SESSION["income"] == "in") {
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
                echo "Errore transazione: " . $e->getMessage();
                exit;
            }
        }
        public function lastTransactions($user_id){
            global $conn;
            $sql="SELECT transactions.id, transactions.amount, transactions.transaction_date, wallets.name, transactions.income FROM transactions JOIN wallets ON transactions.wallet_id=wallets.id WHERE transactions.user_id=? ORDER BY transaction_date DESC LIMIT 5";
            try{
                $stsmt = $conn->prepare($sql);
                $stsmt->execute([$user_id]);
                return $stsmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                error_log("Errore recupero transazioni: " . $e->getMessage());
                return [];
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


        //ONLINE
        public function getName($user_id){
            global $conn;
            $sql="SELECT name from users WHERE id=?;";
            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute([$user_id]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['name'] ?? 'Utente';
            } catch (PDOException $e) {
                error_log("Errore recupero nome utente: " . $e->getMessage());
                return 'Utente';
            }
        }


        //BUDGET
        public function addBudget($user_id, $name, $ceiling, $threshold) {
            global $conn;
            try {
                $sql = "INSERT INTO budgets (user_id, name, monthly_ceiling, alert_threshold) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                return $stmt->execute([$user_id, $name, $ceiling, $threshold]);
            } catch (PDOException $e) {
                error_log("Errore creazione budget: " . $e->getMessage());
                return false;
            }
        }

        public function getBudgets($user_id) {
            global $conn;
            try {
                $sql = "SELECT * FROM budgets WHERE user_id = ? ORDER BY name ASC";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$user_id]);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log("Errore recupero budget: " . $e->getMessage());
                return [];
            }
        }
    }