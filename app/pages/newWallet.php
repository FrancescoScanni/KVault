<?php
    session_start();
    require_once("../models/wallet.php");
    require_once("../components/warnings.php");

    if($_SESSION["logged"]==false){
        header("Location: logIn.php");
        exit;
    }
    if (isset($_SESSION['succTrans'])) {
        echo $succTrans;
        unset($_SESSION['succTrans']);
    }
    if (isset($_SESSION['errTrans'])) {
        echo $errTrans;
        unset($_SESSION['errTrans']);
    }

    $wallet=new Wallet();
    $userWallets = $wallet->getWalletsByUserId($_SESSION["userID"]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KVault | Operations</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass-panel { background: rgba(15, 23, 42, 0.4); backdrop-filter: blur(12px); }
        .neon-border { box-shadow: 0 0 10px rgba(163, 230, 53, 0.2); border-color: rgba(163, 230, 53, 0.5); }
        /* Hide scrollbar for cleaner look */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #020617; }
        ::-webkit-scrollbar-thumb { background: #1e293b; border-radius: 10px; }
    </style>
</head>
<body class="bg-slate-950 text-white selection:bg-lime-400 selection:text-black h-screen flex overflow-hidden">

    <aside class="w-64 border-r border-slate-900 bg-slate-950 flex flex-col hidden md:flex relative z-20">
        <div class="h-20 flex items-center px-8 border-b border-slate-900">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-lime-400 rounded-lg flex items-center justify-center">
                    <span class="text-black font-black text-xl leading-none uppercase">K</span>
                </div>
                <a href="../index.php"><span class="text-xl font-black uppercase tracking-tighter">KVault</span></a>
            </div>
        </div>
        <nav class="flex-1 px-4 py-8 space-y-2">
            <a href="walletMenu/dashboard.php" class="flex items-center gap-3 px-4 py-3 text-sm font-bold uppercase tracking-widest text-slate-500 hover:text-white transition-colors rounded-xl hover:bg-slate-900/50">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                Dashboard
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-sm font-bold uppercase tracking-widest text-lime-400 bg-lime-400/10 rounded-xl neon-border">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Operations
            </a>
            <a href="walletMenu/strategy.php" class="flex items-center gap-3 px-4 py-3 text-sm font-bold uppercase tracking-widest text-slate-500 hover:text-white transition-colors rounded-xl hover:bg-slate-900/50">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                Strategy
            </a>
        </nav>
    </aside>

    <main class="flex-1 relative overflow-y-auto bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-slate-900 via-slate-950 to-slate-950">
        <div class="max-w-6xl mx-auto px-6 py-12 lg:px-12">
            
            <header class="mb-10">
                <h1 class="text-4xl font-black uppercase italic tracking-tight text-white mb-2">Operations <span class="text-lime-400">Hub</span></h1>
                <p class="text-slate-400">Insert, encrypt, and manage your vault's cash flow.</p>
            </header>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 space-y-6">
                    <div class="flex p-1 bg-slate-900 border border-slate-800 rounded-2xl w-full max-w-sm">
                        <button id="tab-tx" class="flex-1 py-2.5 text-xs font-bold uppercase tracking-widest bg-slate-800 text-white rounded-xl shadow-sm transition-all">Transaction</button>
                        <button id="tab-wallet" class="flex-1 py-2.5 text-xs font-bold uppercase tracking-widest text-slate-500 hover:text-slate-300 transition-all rounded-xl">New Wallet</button>
                    </div>
                    
                    <!-- TRANSACTION-->

                    <div id="form-tx" class="glass-panel border border-slate-800 p-8 rounded-3xl">
                        <form id="transactionForm" action="transaction.php" method="post">
                            
                            <div class="flex p-1 bg-slate-950 border border-slate-800 rounded-xl mb-8 w-full max-w-[200px]">
                                <label class="flex-1 text-center cursor-pointer relative">
                                    <input onclick="<?php $_SESSION["income"]="out";?>" type="radio" name="tx_type" value="OUT" class="peer sr-only" checked>
                                    <div class="py-2 text-xs font-bold uppercase tracking-wider text-slate-500 peer-checked:text-white peer-checked:bg-red-500/20 peer-checked:border peer-checked:border-red-500/50 rounded-lg transition-all">Expense</div>
                                </label>
                                <label class="flex-1 text-center cursor-pointer relative">
                                    <input onclick="<?php $_SESSION["income"]="in";?>" type="radio" name="tx_type" value="IN" class="peer sr-only">
                                    <div class="py-2 text-xs font-bold uppercase tracking-wider text-slate-500 peer-checked:text-black peer-checked:bg-lime-400 peer-checked:shadow-[0_0_15px_rgba(163,230,53,0.3)] rounded-lg transition-all">Income</div>
                                </label>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Amount</label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-4 flex items-center text-slate-500 font-bold">$</span>
                                        <input type="number" name="amount" step="0.01" required class="w-full pl-10 pr-4 py-3 bg-slate-900 border border-slate-800 rounded-xl text-white focus:outline-none focus:border-lime-400 transition-colors" placeholder="0.00">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Date</label>
                                    <input type="date" name="date" required class="w-full px-4 py-3 bg-slate-900 border border-slate-800 rounded-xl text-white focus:outline-none focus:border-lime-400 transition-colors cursor-pointer" id="today-date">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                                <div>
                                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Category</label>
                                    <select name="category" required class="w-full px-4 py-3 bg-slate-900 border border-slate-800 rounded-xl text-white focus:outline-none focus:border-lime-400 transition-colors appearance-none cursor-pointer">
                                        <option value="" disabled selected>Select...</option>
                                        <option value="food">Dining & Groceries</option>
                                        <option value="transport">Transport & Auto</option>
                                        <option value="subs">Subscriptions (Leaks)</option>
                                        <option value="shopping">Shopping</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Pay from (Vault)</label>
                                    <select name="wallet" required class="w-full px-4 py-3 bg-slate-900 border border-slate-800 rounded-xl text-white focus:outline-none focus:border-lime-400 transition-colors appearance-none cursor-pointer">
                                        <option value="" disabled selected>Select a wallet</option>
                                        <?php 
                                            // Recuperiamo i wallet dell'utente dalla sessione
                                            $userWallets = $wallet->getWalletsByUserId($_SESSION["userID"]); 

                                            // Verifichiamo se l'utente ha dei wallet
                                            if ($userWallets): 
                                                foreach ($userWallets as $w): ?>
                                                    <option>
                                                        <?php echo htmlspecialchars($w['name']); ?> 
                                                    </option>
                                                <?php endforeach; 
                                            else: ?>
                                                <option value="">No wallets found</option>
                                            <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-8">
                                <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Secure Notes (Optional)</label>
                                <input type="text" name="desc" class="w-full px-4 py-3 bg-slate-900 border border-slate-800 rounded-xl text-slate-300 focus:outline-none focus:border-lime-400 transition-colors" placeholder="e.g., Business dinner with clients">
                            </div>

                            <button type="submit" id="submitBtn" class="w-full flex items-center justify-center gap-2 py-4 px-6 bg-lime-400 hover:bg-lime-300 text-black rounded-xl font-black uppercase tracking-wider shadow-[0_0_20px_rgba(163,230,53,0.15)] transition-all transform hover:-translate-y-0.5">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                <span id="btnText">Save to Vault</span>
                            </button>
                        </form>
                    </div>


                    <!--Blocco nuovo wallet-->

                    <?php
                        $name=$initial_balance="";
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $name = trim($_POST["name"]);
                            $initial_balance = trim($_POST["initial_balance"]);

                            if($wallet->createWallet($_SESSION["userID"], $name, "$", $initial_balance)){
                                echo $addWallet;
                            }else{
                                echo $errWallet;
                            }
                        }

                    ?>

                    <div id="form-wallet" class="glass-panel border border-slate-800 p-8 rounded-3xl hidden">
                        <h2 class="text-xl font-bold mb-6">Initialize New Container</h2>
                        <form action="newWallet.php" method="post">
                            <div class="space-y-6 mb-8">
                                <div>
                                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Vault Name</label>
                                    <input type="text" name="name" required class="w-full px-4 py-3 bg-slate-900 border border-slate-800 rounded-xl text-white focus:outline-none focus:border-lime-400" placeholder="e.g., Binance, Cash, Savings">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Initial Balance (Liquidity)</label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-4 flex items-center text-slate-500 font-bold">$</span>
                                        <input type="number" name="initial_balance" step="0.01" required class="w-full pl-10 pr-4 py-3 bg-slate-900 border border-slate-800 rounded-xl text-white focus:outline-none focus:border-lime-400" placeholder="0.00">
                                    </div>
                                    <p class="mt-2 text-xs text-slate-500">Your balance will never be synced in plaintext with external servers.</p>
                                </div>
                            </div>
                            <button type="submit" class="w-full py-4 px-6 bg-slate-800 hover:bg-slate-700 text-white border border-slate-700 hover:border-slate-500 rounded-xl font-bold uppercase tracking-wider transition-all">
                                Create Vault
                            </button>
                        </form>
                    </div>

                </div>

                <div class="space-y-6 hidden lg:block">
                    <div class="p-6 border border-lime-400/20 bg-lime-400/5 rounded-3xl relative overflow-hidden">
                        <div class="absolute -right-4 -top-4 w-24 h-24 bg-lime-400/20 rounded-full blur-xl pointer-events-none"></div>
                        <div class="flex items-center gap-3 mb-4">
                            <span class="relative flex h-3 w-3">
                              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-lime-400 opacity-75"></span>
                              <span class="relative inline-flex rounded-full h-3 w-3 bg-lime-500"></span>
                            </span>
                            <span class="text-xs font-bold text-lime-400 uppercase tracking-widest">Zero-Knowledge Active</span>
                        </div>
                        <p class="text-sm text-slate-300">Data entered in this session will be encrypted (AES-256) via your Master Key prior to storage.</p>
                    </div>

                    <div class="glass-panel border border-slate-800 p-6 rounded-3xl">
                        <h3 class="font-black uppercase tracking-widest text-sm mb-6 flex items-center gap-2">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Vault Protocols
                        </h3>
                        <ul class="space-y-5 text-sm text-slate-400">
                            <li class="flex items-start gap-3">
                                <div class="w-6 h-6 rounded-full bg-slate-900 border border-slate-700 flex items-center justify-center shrink-0 mt-0.5"><span class="text-xs text-white">1</span></div>
                                <p><strong class="text-white block mb-1">Avoid micro-categorization.</strong> Instead of "Sushi" or "Pizza", use "Dining Out". Broad statistics are easier to track and forecast.</p>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="w-6 h-6 rounded-full bg-slate-900 border border-slate-700 flex items-center justify-center shrink-0 mt-0.5"><span class="text-xs text-white">2</span></div>
                                <p><strong class="text-white block mb-1">Use real Wallets.</strong> Don't create a single generic wallet. Separate "Cash" and "Bank Card" to know exactly where your money goes.</p>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="w-6 h-6 rounded-full bg-slate-900 border border-slate-700 flex items-center justify-center shrink-0 mt-0.5"><span class="text-xs text-white">3</span></div>
                                <p><strong class="text-white block mb-1">Identify the "Leaks".</strong> Track fixed subscriptions. They are the continuous micro-expenses that drain your vault without you noticing.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div id="toast" class="fixed bottom-6 right-6 transform translate-y-24 opacity-0 transition-all duration-300 ease-out z-50 flex items-center gap-3 px-6 py-4 bg-lime-400 text-black rounded-2xl shadow-[0_0_30px_rgba(163,230,53,0.3)]">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
        <div>
            <p class="font-black uppercase tracking-wider text-sm">Transaction Secured</p>
            <p class="text-xs font-medium opacity-80">Encrypted and saved to the Vault.</p>
        </div>
    </div>

    <script>
        document.getElementById('today-date').valueAsDate = new Date();

        const tabTx = document.getElementById('tab-tx');
        const tabWallet = document.getElementById('tab-wallet');
        const formTx = document.getElementById('form-tx');
        const formWallet = document.getElementById('form-wallet');

        function switchTab(active, inactive, showForm, hideForm) {
            active.classList.add('bg-slate-800', 'text-white', 'shadow-sm');
            active.classList.remove('text-slate-500', 'hover:text-slate-300');
            inactive.classList.remove('bg-slate-800', 'text-white', 'shadow-sm');
            inactive.classList.add('text-slate-500', 'hover:text-slate-300');
            showForm.classList.remove('hidden');
            hideForm.classList.add('hidden');
        }

        tabTx.addEventListener('click', () => switchTab(tabTx, tabWallet, formTx, formWallet));
        tabWallet.addEventListener('click', () => switchTab(tabWallet, tabTx, formWallet, formTx));

        function handleFormSubmit(e) {
            e.preventDefault(); 
            
            const btn = e.submitter;
            const originalText = btn.innerHTML;
            
            if(btn.id === 'submitBtn') {
                btn.innerHTML = `<svg class="animate-spin -ml-1 mr-2 h-5 w-5 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Encrypting...`;
                btn.classList.add('opacity-80', 'cursor-wait');
            }

            setTimeout(() => {
                if(btn.id === 'submitBtn') {
                    btn.innerHTML = originalText;
                    btn.classList.remove('opacity-80', 'cursor-wait');
                }
                e.target.reset(); 
                document.getElementById('today-date').valueAsDate = new Date(); 
                
                const toast = document.getElementById('toast');
                toast.classList.remove('translate-y-24', 'opacity-0');
                
                setTimeout(() => {
                    toast.classList.add('translate-y-24', 'opacity-0');
                }, 3500);

            }, 800);
        }
    </script>
</body>
</html>