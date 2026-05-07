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
        public function getVaultRunway($user_id) {
            global $conn;
            $sqlBalance = "SELECT SUM(initial_balance) as total_liquidity FROM wallets WHERE user_id = ?";
            $stmt = $conn->prepare($sqlBalance);
            $stmt->execute([$user_id]);
            $liquidity = $stmt->fetch()['total_liquidity'] ?? 0;

            $sqlBurn = "SELECT SUM(amount) as total_spent FROM transactions 
                        WHERE user_id = ? AND income = 0 
                        AND transaction_date >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
            $stmt = $conn->prepare($sqlBurn);
            $stmt->execute([$user_id]);
            $totalSpent30Days = $stmt->fetch()['total_spent'] ?? 0;

            $dailyBurnRate = $totalSpent30Days / 30;

            if ($dailyBurnRate <= 0) return 999;

            return floor($liquidity / $dailyBurnRate);
        }


        //TRANSACTIONS
        public function addTransaction($user_id, $wallet_id, $amount, $description, $date, $income, $category) {
            global $conn;

            try {
                //TRANSACTION START
                $conn->beginTransaction();

                //ADD TRANSACTION
                $sqlInsert = "INSERT INTO transactions (
                                user_id, wallet_id, amount, description, 
                                transaction_date, income, category
                            ) VALUES (?, ?, ?, ?, ?, ?, ?)";
                
                $stmtInsert = $conn->prepare($sqlInsert);
                $stmtInsert->execute([
                    $user_id,
                    $wallet_id,
                    $amount,
                    $description,
                    $date,
                    $income,
                    $category
                ]);

                //VAULT UPDATE
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

                //TRANSACTION END BUDGET UPDATE
                if (!$income) {
                    $SQLBudget = "UPDATE budgets SET current_spending = current_spending + ? WHERE name = ? AND user_id = ?"; //
                    try {
                        $stmtBudget = $conn->prepare($SQLBudget);
                        $stmtBudget->execute([$amount, $category, $user_id]);
                    } catch (PDOException $e) {
                        error_log("Errore aggiornamento budget: " . $e->getMessage());
                    }
                }
                return true;

            } catch (PDOException $e) {
                if ($conn->inTransaction()) {
                    $conn->rollBack();
                }
                echo "Errore transazione: " . $e->getMessage();
                exit;
            }
        }        public function lastTransactions($user_id){
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
        public function deleteBudget($user_id, $budget_id) {
            global $conn;
            try {
                $sql = "DELETE FROM budgets WHERE id = ? AND user_id = ?";
                $stmt = $conn->prepare($sql);
                return $stmt->execute([$budget_id, $user_id]);
            } catch (PDOException $e) {
                error_log("Errore eliminazione budget: " . $e->getMessage());
                return false;
            }
        }
        public function getBudgetById($budget_id) {
            global $conn;
            try {
                $sql = "SELECT * FROM budgets WHERE id = ? LIMIT 1";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$budget_id]);
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log("Errore recupero budget: " . $e->getMessage());
                return null;
            }
        }


        public function getLeaks($user_id){
            global $conn;
            $sql="SELECT description, COUNT(*) as ripetizioni, SUM(amount) as totale_speso FROM transactions where user_id=? GROUP BY description HAVING COUNT(*) > 1;";
            try{
                $stmt=$conn->prepare($sql);
                $stmt->execute([$user_id]);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);

            }catch(PDOException $e){
                error_log("Errore recupero perdite: " . $e->getMessage());
                return [];
            }
        }
        public function populateLeaks($user_id){
            global $conn;
            $sql="SELECT SUM(amount) as tot, COUNT(*) as nt, category from transactions WHERE income=0 GROUP by category;";
            try{ //tot, nt, category
                $stmt=$conn->prepare($sql);
                $stmt->execute([$user_id]);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                error_log("Errore recupero perdite: " . $e->getMessage());
                return [];
        }
        }
    }