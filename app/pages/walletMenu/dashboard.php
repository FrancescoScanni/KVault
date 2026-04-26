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
                    <div class="text-xs font-bold text-white uppercase">Operative_01</div>
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
                    <p class="text-slate-400">Global net worth and live transaction feed.</p>
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
                        <span id="total-balance" class="text-6xl font-black tracking-tighter text-white">--</span>
                    </div>
                </div>

                <div class="glass-panel border border-slate-800 p-6 rounded-3xl flex flex-col justify-between">
                    <h2 class="text-xs font-black uppercase tracking-widest text-slate-400 mb-4">Current Month</h2>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between text-xs font-bold mb-1">
                                <span class="text-lime-400 uppercase tracking-wider">In</span>
                                <span id="total-income" class="text-white">$--</span>
                            </div>
                            <div class="w-full bg-slate-900 rounded-full h-1.5 overflow-hidden">
                                <div id="bar-income" class="bg-lime-400 h-1.5 rounded-full animate-width" style="width: 0%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-xs font-bold mb-1">
                                <span class="text-red-500 uppercase tracking-wider">Out</span>
                                <span id="total-expense" class="text-white">$--</span>
                            </div>
                            <div class="w-full bg-slate-900 rounded-full h-1.5 overflow-hidden">
                                <div id="bar-expense" class="bg-red-500 h-1.5 rounded-full animate-width" style="width: 0%"></div>
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

                    <div id="wallets-container" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="glass-panel border border-slate-800 p-8 rounded-3xl text-center md:col-span-2">
                            <div class="w-8 h-8 mx-auto mb-4 border-4 border-slate-800 border-t-lime-400 rounded-full animate-spin"></div>
                            <p class="text-slate-500 text-xs font-bold uppercase tracking-widest">Scanning wallets...</p>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-sm font-black uppercase tracking-widest text-slate-500 mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Decrypted Feed
                    </h2>
                    
                    <div class="glass-panel border border-slate-800 p-2 rounded-3xl h-[400px] overflow-y-auto">
                        <div id="transactions-container" class="space-y-1">
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <script>
        // 1. STATO DELL'APP (Modificabile)
        // Cambia i saldi dei wallet e le transazioni. La UI calcolerà automaticamente i totali e le barre.
        const dashboardState = {
            wallets: [
                { id: "w1", name: "Revolut Main", balance: 4250.00, type: "digital" },
                { id: "w2", name: "Physical Safe", balance: 850.00, type: "fiat" },
                { id: "w3", name: "Binance Cold", balance: 6400.00, type: "crypto" }
            ],
            currentMonth: {
                income: 4500.00,
                expenses: 1250.00
            },
            recentTransactions: [
                { desc: "Freelance Client X", amount: 1200.00, type: "IN", date: "Today", wallet: "Revolut Main" },
                { desc: "AWS Server Host", amount: -45.00, type: "OUT", date: "Yesterday", wallet: "Revolut Main" },
                { desc: "Groceries", amount: -120.50, type: "OUT", date: "Apr 24", wallet: "Physical Safe" },
                { desc: "ETH Purchase", amount: -500.00, type: "OUT", date: "Apr 22", wallet: "Revolut Main" },
                { desc: "Crypto Yield", amount: 25.00, type: "IN", date: "Apr 20", wallet: "Binance Cold" },
                { desc: "Dining Out", amount: -65.00, type: "OUT", date: "Apr 18", wallet: "Revolut Main" }
            ]
        };

        // Utility Formattazione Valuta
        const formatMoney = (amount) => {
            return amount.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        };

        // 2. INIZIALIZZAZIONE
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                renderDashboard(dashboardState);
            }, 500); // Finta latenza di decrittazione
        });

        // 3. MOTORE DI RENDER
        function renderDashboard(state) {
            
            // --- MATEMATICA E TOTALI ---
            // Il totale è calcolato rigorosamente sommando i wallet, non è un numero a caso.
            const calculatedTotal = state.wallets.reduce((sum, wallet) => sum + wallet.balance, 0);
            
            // Aggiorna il bilancio principale
            document.getElementById('total-balance').innerText = formatMoney(calculatedTotal);
            
            // Aggiorna Entrate/Uscite
            document.getElementById('total-income').innerText = `$${formatMoney(state.currentMonth.income)}`;
            document.getElementById('total-expense').innerText = `$${formatMoney(state.currentMonth.expenses)}`;
            
            // Calcola la larghezza delle barre di Cashflow
            const maxCashflow = Math.max(state.currentMonth.income, state.currentMonth.expenses);
            const incPercent = (state.currentMonth.income / maxCashflow) * 100;
            const expPercent = (state.currentMonth.expenses / maxCashflow) * 100;
            
            document.getElementById('bar-income').style.width = `${incPercent}%`;
            document.getElementById('bar-expense').style.width = `${expPercent}%`;


            // --- RENDER WALLETS ---
            const walletsContainer = document.getElementById('wallets-container');
            walletsContainer.innerHTML = state.wallets.map(w => {
                const percentage = ((w.balance / calculatedTotal) * 100).toFixed(1);
                
                // Icone basate sul tipo
                let iconSVG = '';
                if(w.type === 'crypto') {
                    iconSVG = `<svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>`;
                } else if(w.type === 'fiat') {
                    iconSVG = `<svg class="w-5 h-5 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>`;
                } else {
                    iconSVG = `<svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>`;
                }

                return `
                <div class="glass-panel border border-slate-800 p-6 rounded-3xl hover:border-slate-700 transition-colors group">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 rounded-xl bg-slate-900 border border-slate-800 flex items-center justify-center group-hover:border-slate-600 transition-colors">
                            ${iconSVG}
                        </div>
                        <div class="text-right">
                            <span class="text-xl font-black text-white block">$${formatMoney(w.balance)}</span>
                            <span class="text-[10px] font-bold uppercase tracking-widest text-slate-500">${percentage}% of Vault</span>
                        </div>
                    </div>
                    <h3 class="font-bold text-slate-300 text-sm mb-3">${w.name}</h3>
                    <div class="w-full bg-slate-900 rounded-full h-1.5 overflow-hidden">
                        <div class="bg-slate-600 h-1.5 rounded-full animate-width group-hover:bg-lime-400 transition-colors" style="width: ${percentage}%"></div>
                    </div>
                </div>
                `;
            }).join('');


            // --- RENDER TRANSAZIONI ---
            const txContainer = document.getElementById('transactions-container');
            txContainer.innerHTML = state.recentTransactions.map(tx => {
                const isIncome = tx.type === 'IN';
                const colorClass = isIncome ? 'text-lime-400' : 'text-slate-300';
                const sign = isIncome ? '+' : '';
                const txIcon = isIncome 
                    ? `<svg class="w-4 h-4 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>`
                    : `<svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>`;

                return `
                <div class="p-3 rounded-2xl hover:bg-slate-900/50 transition-colors flex justify-between items-center group">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-slate-900 border border-slate-800 flex items-center justify-center group-hover:border-slate-700">
                            ${txIcon}
                        </div>
                        <div>
                            <p class="text-sm font-bold text-white">${tx.desc}</p>
                            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">${tx.date} • ${tx.wallet}</p>
                        </div>
                    </div>
                    <span class="font-black text-sm ${colorClass}">${sign}$${formatMoney(Math.abs(tx.amount))}</span>
                </div>
                `;
            }).join('');
        }
    </script>
</body>
</html>