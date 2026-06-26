<?php
    session_start();
    require_once("../models/wallet.php");
    require_once("../components/warnings.php");

    $amount = $date = $category = $wallet_name = $desc = $income_raw = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $amount   = trim($_POST["amount"]);
        $date     = trim($_POST["date"]);
        $category = trim($_POST["category"]);
        $wallet_name = trim($_POST["wallet"]);
        $desc     = trim($_POST["desc"]);
        $income_raw = trim($_POST["tx_type"]);

        $_SESSION["income"] = $income_raw;
        $income = ($income_raw == "out") ? 0 : 1;

        $transaction = new Wallet();
        
        $wallet_id = $transaction->getWalletID($wallet_name);
       
        if ($wallet_id === null) {
            echo "<script>
                alert('Wallet not found! Please create a wallet first.');
                window.location.href = 'newWallet.php';
            </script>";
            exit;
        }

        if ($transaction->addTransaction($_SESSION["userID"], $wallet_id, $amount, $desc, $date, $income, $category)){
            $_SESSION["succTrans"] = true;
        } else {
            $_SESSION["error_message"] = "Transaction failed!";
        }
        
        header("Location: newWallet.php");
        exit;
    }

    header("Location: newWallet.php");
    exit;