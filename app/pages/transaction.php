<?php
    session_start();
    require_once("../models/wallet.php");
    require_once("../components/warnings.php");

    $amount=$date=$category=$wallet=$desc="";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $amount = trim($_POST["amount"]);
        $date=trim($_POST["date"]);
        $category=trim($_POST["category"]);
        $wallet=trim($_POST["wallet"]);
        $desc=trim($_POST["desc"]);
    }


    $transaction=new Wallet();
    $wallet=$transaction->getWalletID($wallet);
    if($transaction->addTransaction($_SESSION["userID"], $wallet, $amount, $desc, $date)){
        $_SESSION["succTrans"]=true;
    }else{
        $_SESSION["errTrans"]=true;
    }
    header("Location: newWallet.php");


