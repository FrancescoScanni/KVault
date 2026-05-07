<?php
    session_start();
    require_once '../../models/wallet.php';

    $wallet = new Wallet();
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $budgetId = $_GET['id'];
        $userId = $_SESSION['userID'];
        $wallet->deleteBudget($userId, $budgetId);
        header("Location: strategy.php");
        
    }