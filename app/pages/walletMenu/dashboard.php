<?php
    session_start();
    include_once("../../models/wallet.php");
    
    $wallet = new Wallet();
    //total balance and wallets
    $totalBalance = number_format($wallet->getTotalBalance($_SESSION["userID"]), 2, ',', '.');
    $totalIncome = $wallet->getTotalIncome($_SESSION["userID"]);
    $totalExpense = $wallet->getTotalExpense($_SESSION["userID"]);
    $wallets = $wallet->getWallets($_SESSION["userID"]);

    //last transactions
    $lastTransactions = $wallet->lastTransactions(($_SESSION["userID"]));
    $res = $wallet->getName($_SESSION['userID']);

    if($_SESSION["logged"] == false){
        header("Location: ../logIn.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KVault | Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass-panel { background: rgba(15, 23, 42, 0.4); backdrop-filter: blur(12px); }
        .neon-border { box-shadow: 0 0 10px rgba(163, 230, 53, 0.2); border-color: rgba(163, 230, 53, 0.5); }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #020617; }
        ::-webkit-scrollbar-thumb { background: #1e293b; border-radius: 10px; }
        
        @keyframes fillWidth { from { width: 0; } }
        .animate-width { animation: fillWidth 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    </style>
</head>
<body class="bg-slate-950 text-white selection:bg-lime-400 selection:text-black h-screen flex overflow-hidden">

    <aside class="w-64 border-r border-slate-900 bg-slate-950 flex flex-col hidden md:flex relative z-20">
        <div class="h-20 flex items-center px-8 border-b border-slate-900">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-lime-400 rounded-lg flex items-center justify-center">
                    <span class="text-black font-black text-xl leading-none uppercase">K</span>
                </div>
                <a href="../../index.php"><span class="text-xl font-black uppercase tracking-tighter">KVault</span></a>
            </div>
        </div>
        <nav class="flex-1 px-4 py-8 space-y-2">
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-sm font-bold uppercase tracking-widest text-lime-400 bg-lime-400/10 rounded-xl neon-border">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                Dashboard
            </a>
            <a href="../newWallet.php" class="flex items-center gap-3 px-4 py-3 text-sm font-bold uppercase tracking-widest text-slate-500 hover:text-white transition-colors rounded-xl hover:bg-slate-900/50">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Operations
            </a>
            <a href="strategy.php" class="flex items-center gap-3 px-4 py-3 text-sm font-bold uppercase tracking-widest text-slate-500 hover:text-white transition-colors rounded-xl hover:bg-slate-900/50">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                Strategy
            </a>
        </nav>
        
        <div class="p-4 border-t border-slate-900">
            <div class="flex items-center gap-3 px-4 py-2 bg-slate-900 rounded-xl">
                <div class="w-8 h-8 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                <div class="flex-1">
                    <div class="text-xs font-bold text-white uppercase"><?php echo $res; ?></div>
                    <div class="text-[10px] text-lime-400 font-bold tracking-wider">Online</div>
                </div>
            </div>
        </div>
    </aside>

    <main class="flex-1 relative overflow-y-auto bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-slate-900 via-slate-950 to-slate-950">
        <div class="max-w-6xl mx-auto px-6 py-12 lg:px-12">
            
            <header class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <h1 class="text-4xl font-black uppercase italic tracking-tight text-white mb-2">Vault <span class="text-lime-400">Overview</span></h1>
                    <p class="text-slate-400">Global net worth and live transaction feed of the linked assets.</p>
                </div>
                <div class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-lime-400/10 border border-lime-400/20">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-lime-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-lime-500"></span>
                    </span>
                    <span class="text-[10px] font-bold text-lime-400 uppercase tracking-widest">End-to-End Encrypted</span>
                </div>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                
                <div class="md:col-span-2 p-8 bg-slate-800 border border-slate-700 rounded-3xl relative overflow-hidden flex flex-col justify-center">
                    <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-lime-400/10 rounded-full blur-3xl pointer-events-none"></div>
                    <h2 class="text-sm font-black uppercase tracking-widest text-slate-400 mb-2">Total Liquidity</h2>
                    <div class="flex items-baseline gap-1">
                        <span class="text-4xl font-bold text-slate-500">$</span>
                        <span id="total-balance" class="text-6xl font-black tracking-tighter text-white ml-[5px]"> <?php echo $totalBalance; ?> </span>
                    </div>
                </div>

                <div class="glass-panel border border-slate-800 p-6 rounded-3xl flex flex-col justify-between">
                    <h2 class="text-xs font-black uppercase tracking-widest text-slate-400 mb-4">Current Month</h2>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between text-xs font-bold mb-1">
                                <span class="text-lime-400 uppercase tracking-wider">In</span>
                                <span id="total-income" class="text-white">$ <?php echo number_format($totalIncome, 2, ',', '.'); ?> </span>
                            </div>
                            <div class="w-full bg-slate-900 rounded-full h-1.5 overflow-hidden">
                                <div id="bar-income" class="bg-lime-400 h-1.5 rounded-full animate-width" style="width: <?php echo $totalIncome > 0 ? ($totalIncome / ($totalIncome + $totalExpense)) * 100 : 0; ?>%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-xs font-bold mb-1">
                                <span class="text-red-500 uppercase tracking-wider">Out</span>
                                <span id="total-expense" class="text-white">$ <?php echo number_format($totalExpense, 2, ',', '.'); ?> </span>
                            </div>
                            <div class="w-full bg-slate-900 rounded-full h-1.5 overflow-hidden">
                                <div id="bar-expense" class="bg-red-500 h-1.5 rounded-full animate-width" style="width: <?php echo $totalExpense > 0 ? ($totalExpense / ($totalIncome + $totalExpense)) * 100 : 0; ?>%"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 space-y-6">
                    <div class="flex justify-between items-end mb-4">
                        <h2 class="text-sm font-black uppercase tracking-widest text-slate-500 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            Asset Distribution
                        </h2>
                    </div>

                    <div id="wallets-container" class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="glass-panel border border-slate-800 p-8 rounded-3xl text-center md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <?php
                                if (empty($wallets)) {
                                    echo '<div class="md:col-span-2 py-10 flex flex-col items-center justify-center space-y-4">
                                            <div class="w-16 h-16 rounded-2xl bg-slate-900 flex items-center justify-center border border-slate-800">
                                                <svg class="w-8 h-8 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            </div>
                                            <p class="text-slate-500 font-bold uppercase tracking-widest text-sm italic">Add one or more wallets to start tracking...</p>
                                            <a href="../newWallet.php" class="text-lime-400 text-xs font-black uppercase tracking-tighter hover:underline">Create your first asset &rarr;</a>
                                          </div>';
                                } else {
                                    $total=0;
                                    foreach($wallets as $w){
                                        $total += (float)$w["initial_balance"];
                                    }
                                    $total = $total == 0 ? 1 : $total; // Avoid division by zero
                                    foreach($wallets as $w){
                                        $rawAmount = $w["initial_balance"];
                                        $formattedForSplit = number_format($rawAmount, 2, ',', '');
                                        $parts = explode(',', $formattedForSplit);
                                        $integers = number_format((float)$parts[0], 0, '', '.');
                                        $decimals = $parts[1];
                                        
                                        echo '<div class="glass-panel border border-slate-800 p-6 rounded-3xl hover:border-slate-700 transition-all duration-300 group shadow-lg">
                                                    <div class="flex justify-between items-start mb-6">
                                                        <div class="w-10 h-10 rounded-xl bg-slate-900 border border-slate-800 flex items-center justify-center group-hover:border-slate-600 transition-colors">
                                                            <svg class="w-5 h-5 text-slate-500 group-hover:text-lime-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                                            </svg>
                                                        </div>

                                                        <div class="text-right">
                                                            <h3 class="text-2xl font-black text-white uppercase tracking-tighter leading-none group-hover:text-lime-400 transition-colors">
                                                                ' . $w["name"] . '
                                                            </h3>
                                                            <span class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">Vault</span>
                                                        </div>
                                                    </div>

                                                    <div class="flex justify-between items-end mb-4">
                                                        <div>
                                                            <span class="text-3xl text-auto font-black text-white block leading-none mt-[5px]">
                                                                <span class="text-lg font-bold opacity-30">$</span> ' . $integers . '<span class="text-lg font-bold opacity-30">.' . $decimals . '</span>
                                                            </span>
                                                            <p class="text-[10px] text-slate-500 font-bold mt-1 italic">Total available balance</p>
                                                        </div>
                                                        
                                                        <div class="text-right">
                                                            <span class="text-xs font-black text-slate-400"> ' . round((float)$w["initial_balance"]/$total * 100, 1) . '%</span>
                                                        </div>
                                                    </div>

                                                    <div class="w-full bg-slate-950 rounded-full h-2 overflow-hidden border border-white/5">
                                                        <div class="bg-slate-700 h-full rounded-full group-hover:bg-gradient-to-r group-hover:from-lime-500 group-hover:to-emerald-500 transition-all duration-700" 
                                                            style="width: ' . round((float)$w["initial_balance"]/$total * 100, 1) . '%"></div>
                                                    </div>
                                                </div>';
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-sm font-black uppercase tracking-widest text-slate-500 mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Decrypted Feed
                    </h2>
                    
                    <div class=" border border-slate-800 p-2 rounded-3xl h-[400px] ">
                        <div id="transactions-container" class="space-y-1 flex flex-col h-full overflow-y-auto px-2 py-2 gap-2">
                            
                            <?php
                                if (empty($lastTransactions)) {
                                    echo '<div class="h-full flex flex-col items-center justify-center text-center p-6 space-y-3">
                                            <div class="w-12 h-12 rounded-full border border-dashed border-slate-800 flex items-center justify-center">
                                                <svg class="w-6 h-6 text-slate-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                            </div>
                                            <p class="text-[10px] font-bold text-slate-600 uppercase tracking-widest">No transactions detected in this vault</p>
                                          </div>';
                                } else {
                                    foreach($lastTransactions as $last){
                                        $sign = $last["income"] == 1 ? '+' : '-';
                                        $colorClass = $last["income"] == 1 ? 'text-lime-400' : 'text-white';
                                        echo '<div class="p-3 px-4 rounded-2xl hover:bg-slate-900/50 transition-colors flex justify-between items-center group border border-slate-800">
                                                <div class="flex items-center gap-4 pt-2">
                                                    <div class="w-10 h-10 rounded-full bg-slate-900 border border-slate-800 flex items-center justify-center group-hover:border-slate-700">
                                                        <svg class="w-4 h-4 ' . ($last["income"] == 1 ? 'text-lime-400' : 'text-slate-500') . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="' . ($last["income"] == 1 ? 'M19 14l-7 7m0 0l-7-7m7 7V3' : 'M5 10l7-7m0 0l7 7m-7-7v18') . '"></path></svg>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-bold text-white">' . $last["name"] . '</p>
                                                        <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">' . date("M d, Y", strtotime($last["transaction_date"])) . '</p>
                                                    </div>
                                                </div>
                                                <span class="font-black text-sm ' . $colorClass . '">' . $sign . '$' . number_format($last["amount"], 2, ',', '.') . '</span>
                                            </div>'; 
                                    }
                                }
                            ?>        
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
</body>
</html>