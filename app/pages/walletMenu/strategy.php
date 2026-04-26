<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KVault | Strategy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass-panel { background: rgba(15, 23, 42, 0.4); backdrop-filter: blur(12px); }
        .neon-border { box-shadow: 0 0 10px rgba(163, 230, 53, 0.2); border-color: rgba(163, 230, 53, 0.5); }
        .danger-border { box-shadow: 0 0 10px rgba(239, 68, 68, 0.2); border-color: rgba(239, 68, 68, 0.5); }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #020617; }
        ::-webkit-scrollbar-thumb { background: #1e293b; border-radius: 10px; }
        
        /* Animazione per le barre di progresso */
        @keyframes fillBar {
            from { width: 0; }
        }
        .progress-animate { animation: fillBar 1s ease-out forwards; }
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
            <a href="dashboard.php" class="flex items-center gap-3 px-4 py-3 text-sm font-bold uppercase tracking-widest text-slate-500 hover:text-white transition-colors rounded-xl hover:bg-slate-900/50">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                Dashboard
            </a>
            <a href="../newWallet.php" class="flex items-center gap-3 px-4 py-3 text-sm font-bold uppercase tracking-widest text-slate-500 hover:text-white transition-colors rounded-xl hover:bg-slate-900/50">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Operations
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-sm font-bold uppercase tracking-widest text-lime-400 bg-lime-400/10 rounded-xl neon-border">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                Strategy
            </a>
        </nav>
    </aside>

    <main class="flex-1 relative overflow-y-auto bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-slate-900 via-slate-950 to-slate-950">
        <div class="max-w-6xl mx-auto px-6 py-12 lg:px-12">
            
            <header class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <h1 class="text-4xl font-black uppercase italic tracking-tight text-white mb-2">Strategy <span class="text-lime-400">Command</span></h1>
                    <p class="text-slate-400">Forecast, budget, and control your financial leaks.</p>
                </div>
                <a href="newBudget.php"><button class="bg-slate-800 hover:bg-slate-700 text-white px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider transition-colors flex items-center gap-2 border border-slate-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    New Budget
                </button></a>
            </header>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 space-y-6">
                    <h2 class="text-sm font-black uppercase tracking-widest text-slate-500 mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                        Smart Budgets (April)
                    </h2>

                    <div class="space-y-4">
                        
                        <div class="glass-panel border border-slate-800 p-6 rounded-3xl">
                            <div class="flex justify-between items-end mb-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-xl bg-slate-900 border border-slate-700 flex items-center justify-center">
                                        <svg class="w-5 h-5 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-white">Transport & Auto</h3>
                                        <p class="text-xs text-slate-400">Gas, Maintenance, Uber</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="text-xl font-black">$45.00</span>
                                    <span class="text-sm text-slate-500 font-bold"> / $150.00</span>
                                </div>
                            </div>
                            <div class="w-full bg-slate-900 rounded-full h-2.5 border border-slate-800 overflow-hidden">
                                <div class="bg-lime-400 h-2.5 rounded-full progress-animate shadow-[0_0_10px_rgba(163,230,53,0.5)]" style="width: 30%"></div>
                            </div>
                            <div class="mt-2 text-right text-xs font-bold text-lime-400">30% Used - On Track</div>
                        </div>

                        <div class="glass-panel border border-slate-800 p-6 rounded-3xl">
                            <div class="flex justify-between items-end mb-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-xl bg-slate-900 border border-slate-700 flex items-center justify-center">
                                        <svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-white">Dining & Groceries</h3>
                                        <p class="text-xs text-slate-400">Restaurants, Supermarket</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="text-xl font-black">$340.50</span>
                                    <span class="text-sm text-slate-500 font-bold"> / $400.00</span>
                                </div>
                            </div>
                            <div class="w-full bg-slate-900 rounded-full h-2.5 border border-slate-800 overflow-hidden">
                                <div class="bg-orange-400 h-2.5 rounded-full progress-animate shadow-[0_0_10px_rgba(251,146,60,0.5)]" style="width: 85%"></div>
                            </div>
                            <div class="mt-2 text-right text-xs font-bold text-orange-400">85% Used - Approaching Limit</div>
                        </div>

                        <div class="glass-panel border border-red-900/30 p-6 rounded-3xl danger-border bg-red-950/10">
                            <div class="flex justify-between items-end mb-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-xl bg-red-950 border border-red-800 flex items-center justify-center">
                                        <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <h3 class="font-bold text-white">Shopping & Fun</h3>
                                            <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-red-500/20 text-red-400 border border-red-500/30 uppercase tracking-wider">Breach</span>
                                        </div>
                                        <p class="text-xs text-slate-400">Clothes, Gadgets, Hobbies</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="text-xl font-black text-red-400">$245.00</span>
                                    <span class="text-sm text-slate-500 font-bold"> / $200.00</span>
                                </div>
                            </div>
                            <div class="w-full bg-slate-900 rounded-full h-2.5 border border-slate-800 overflow-hidden">
                                <div class="bg-red-500 h-2.5 rounded-full progress-animate shadow-[0_0_10px_rgba(239,68,68,0.5)]" style="width: 100%"></div>
                            </div>
                            <div class="mt-2 text-right text-xs font-bold text-red-500">122% Used - Target Breached by $45.00</div>
                        </div>

                    </div>
                </div>

                <div class="space-y-6">
                    
                    <div class="p-6 bg-slate-800 border border-slate-700 rounded-3xl relative overflow-hidden">
                        <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-lime-400/10 rounded-full blur-2xl pointer-events-none"></div>
                        <h2 class="text-xs font-black uppercase tracking-widest text-slate-400 mb-2">Vault Runway</h2>
                        <div class="flex items-end gap-2 mb-1">
                            <span class="text-5xl font-black tracking-tighter text-white">45</span>
                            <span class="text-lg font-bold text-slate-400 mb-1">Days</span>
                        </div>
                        <p class="text-xs text-slate-400 leading-relaxed mt-2">At your current 30-day burn rate, your combined vault liquidity will last 45 days assuming zero incoming cash flow.</p>
                        <div class="mt-4 inline-flex items-center gap-2 px-3 py-1 rounded-full bg-lime-400/10 border border-lime-400/20">
                            <div class="w-2 h-2 rounded-full bg-lime-400 animate-pulse"></div>
                            <span class="text-xs font-bold text-lime-400 uppercase tracking-wider">Status: Stable</span>
                        </div>
                    </div>

                    <div class="glass-panel border border-slate-800 p-6 rounded-3xl">
                        <h3 class="font-black uppercase tracking-widest text-sm mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            Active Leaks
                        </h3>
                        <p class="text-xs text-slate-500 mb-6">Recurring payments silently draining the vault.</p>
                        
                        <div class="space-y-4">
                            <div class="flex justify-between items-center p-3 rounded-xl bg-slate-900 border border-slate-800 hover:border-slate-700 transition-colors cursor-pointer">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded bg-black flex items-center justify-center text-red-500 font-black text-xs border border-slate-800">N</div>
                                    <div>
                                        <p class="text-sm font-bold text-white">Netflix</p>
                                        <p class="text-[10px] text-slate-500 uppercase tracking-wider font-bold">Renews 15th</p>
                                    </div>
                                </div>
                                <span class="text-sm font-bold text-slate-300">-$15.99</span>
                            </div>

                            <div class="flex justify-between items-center p-3 rounded-xl bg-slate-900 border border-slate-800 hover:border-slate-700 transition-colors cursor-pointer">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded bg-black flex items-center justify-center text-green-500 font-black text-xs border border-slate-800">S</div>
                                    <div>
                                        <p class="text-sm font-bold text-white">Spotify</p>
                                        <p class="text-[10px] text-slate-500 uppercase tracking-wider font-bold">Renews 22nd</p>
                                    </div>
                                </div>
                                <span class="text-sm font-bold text-slate-300">-$10.99</span>
                            </div>

                            <div class="flex justify-between items-center p-3 rounded-xl bg-slate-900 border border-slate-800 hover:border-slate-700 transition-colors cursor-pointer">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded bg-black flex items-center justify-center text-white font-black text-xs border border-slate-800">G</div>
                                    <div>
                                        <p class="text-sm font-bold text-white">Gym Membership</p>
                                        <p class="text-[10px] text-slate-500 uppercase tracking-wider font-bold">Renews 01st</p>
                                    </div>
                                </div>
                                <span class="text-sm font-bold text-slate-300">-$45.00</span>
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-slate-800 flex justify-between items-center">
                            <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Monthly Drain</span>
                            <span class="text-lg font-black text-white">$71.98</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>