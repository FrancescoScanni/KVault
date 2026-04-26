<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KVault | Your Digital Treasury</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .neon-glow {
            text-shadow: 0 0 25px rgba(163, 230, 53, 0.5);
        }
        .bg-gradient-dark {
            background: radial-gradient(circle at top right, #0c121e, #020617);
        }
        .glass-panel {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>


</head>
<body class="bg-slate-950 text-white selection:bg-lime-400 selection:text-black antialiased">

    <nav class="fixed w-full z-50 glass-panel border-b border-slate-800/50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-lime-400 rounded-xl rotate-3 flex items-center justify-center shadow-[0_0_15px_rgba(163,230,53,0.3)]">
                        <span class="text-black font-black text-2xl leading-none -rotate-3 uppercase">K</span>
                    </div>
                    <span class="text-2xl font-black uppercase tracking-tighter">KVault</span>
                </div>
                
                <div class="hidden md:flex items-center gap-8 text-sm font-bold text-slate-400 uppercase tracking-widest">
                    <a href="#features" class="hover:text-lime-400 transition-colors">Features</a>
                    <a href="pages/security.php" class="hover:text-lime-400 transition-colors">Security</a>
                    <a href="https://github.com/FrancescoScanni/KVault.git" class="hover:text-lime-400 transition-colors">Repository</a>
                </div>

                <div class="flex items-center gap-4">
                    <a href="pages/logIn.php" class="hidden sm:block text-sm font-bold text-white hover:text-lime-400 transition-colors uppercase tracking-wider">Log In</a>
                    <a href="pages/signUp.php" class="px-6 py-2.5 bg-lime-400 text-black rounded-lg text-sm font-black uppercase tracking-wider hover:bg-lime-300 transition-all transform hover:-translate-y-0.5 shadow-[0_0_15px_rgba(163,230,53,0.2)]">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden bg-gradient-dark min-h-screen flex items-center">
        <div class="absolute top-1/4 left-1/4 w-[500px] h-[500px] bg-lime-500/10 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-0 right-0 w-[600px] h-[600px] bg-blue-600/10 rounded-full blur-[150px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 w-full grid lg:grid-cols-2 gap-16 items-center relative z-10">
            
            <div class="text-center lg:text-left">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-slate-900/80 border border-slate-800 rounded-full mb-8 backdrop-blur-sm">
                    <span class="w-2 h-2 bg-lime-400 rounded-full animate-pulse"></span>
                    <span class="text-xs font-bold tracking-[0.2em] uppercase text-slate-300">The new financial standard</span>
                </div>
                
                <h1 class="text-7xl lg:text-8xl xl:text-9xl font-black uppercase leading-none mb-6 italic neon-glow text-lime-400">
                    KVAULT
                </h1>
                
                <p class="text-2xl lg:text-3xl font-light text-slate-300 mb-10 tracking-tight">
                    Your digital <span class="text-lime-400 font-medium italic">treasury</span>.
                </p>

                <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
                    <a href="pages/newWallet.php"><button class="px-8 py-4 bg-lime-400 text-black font-black uppercase tracking-wider text-sm rounded-xl hover:bg-lime-300 transition-all transform hover:-translate-y-1 shadow-[0_0_20px_rgba(163,230,53,0.3)]">
                        Create Your Vault
                    </button></a>
                    <button class="px-8 py-4 bg-slate-900 border border-slate-800 text-white font-bold uppercase tracking-wider text-sm rounded-xl hover:bg-slate-800 hover:border-slate-700 transition-all">
                        Manage your vault
                    </button>
                </div>
            </div>

            <div class="relative h-[500px] hidden md:block">
                <div class="absolute inset-0 grid grid-cols-2 grid-rows-2 gap-6 items-center justify-center p-4">
                    
                    <div class="w-full h-full bg-slate-900 border border-slate-800 rounded-[2rem] p-6 shadow-2xl -rotate-6 transform scale-90 opacity-50 transition-all hover:opacity-100 hover:rotate-0 duration-500">
                        <div class="w-full h-4 bg-slate-800 rounded-full mb-4"></div>
                        <div class="w-2/3 h-4 bg-slate-800 rounded-full mb-8"></div>
                        <div class="w-full h-32 bg-slate-800/50 rounded-xl border border-slate-700 flex items-end p-2 gap-2">
                            <div class="w-1/4 h-1/3 bg-lime-400/20 rounded-t-sm"></div>
                            <div class="w-1/4 h-2/3 bg-lime-400/40 rounded-t-sm"></div>
                            <div class="w-1/4 h-1/2 bg-lime-400/60 rounded-t-sm"></div>
                            <div class="w-1/4 h-full bg-lime-400 rounded-t-sm shadow-[0_0_10px_rgba(163,230,53,0.5)]"></div>
                        </div>
                    </div>

                    <div class="w-full h-full bg-slate-900 border border-slate-700 rounded-[2rem] p-8 shadow-[0_20px_50px_rgba(0,0,0,0.5)] relative z-20 transform scale-110">
                        <div class="flex justify-between items-center mb-6">
                            <div class="w-8 h-8 bg-lime-400 rounded-lg"></div>
                            <div class="w-12 h-4 bg-slate-800 rounded-full"></div>
                        </div>
                        <div class="w-full flex justify-between items-center text-xs text-slate-500 uppercase font-bold tracking-widest mb-2">
                            <span>Balance</span>
                        </div>
                        <p class="text-4xl font-light mb-8 text-white">$14,092.<span class="text-slate-500 text-2xl">50</span></p>
                        
                        <div class="space-y-4">
                            <div class="h-16 w-full bg-slate-800/50 rounded-xl border border-slate-700 flex items-center px-4 gap-4">
                                <div class="w-8 h-8 rounded-full bg-lime-400/20 flex items-center justify-center">
                                    <div class="w-3 h-3 bg-lime-400 rounded-full"></div>
                                </div>
                                <div class="flex-1">
                                    <div class="w-1/2 h-3 bg-slate-600 rounded-full mb-2"></div>
                                    <div class="w-1/3 h-2 bg-slate-700 rounded-full"></div>
                                </div>
                            </div>
                            <div class="h-16 w-full bg-slate-800/50 rounded-xl border border-slate-700 flex items-center px-4 gap-4">
                                <div class="w-8 h-8 rounded-full bg-slate-700 flex items-center justify-center"></div>
                                <div class="flex-1">
                                    <div class="w-2/3 h-3 bg-slate-600 rounded-full mb-2"></div>
                                    <div class="w-1/4 h-2 bg-slate-700 rounded-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full h-full bg-slate-900 border border-slate-800 rounded-[2rem] p-6 shadow-2xl rotate-6 transform scale-90 opacity-50 transition-all hover:opacity-100 hover:rotate-0 duration-500">
                        <div class="grid grid-cols-2 gap-4 h-full">
                            <div class="bg-slate-800 rounded-xl p-4 flex flex-col justify-end">
                                <div class="w-full h-2 bg-slate-700 rounded-full"></div>
                            </div>
                            <div class="bg-lime-400/10 border border-lime-400/20 rounded-xl p-4 flex flex-col justify-end">
                                <div class="w-full h-2 bg-lime-400 rounded-full"></div>
                            </div>
                            <div class="col-span-2 bg-slate-800 rounded-xl p-4"></div>
                        </div>
                    </div>

                    <div class="absolute top-0 right-10 w-16 h-16 bg-lime-400 border-4 border-slate-950 rounded-2xl flex items-center justify-center shadow-lg transform rotate-12 neon-glow z-30">
                        <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <section id="features" class="py-24 bg-slate-950 relative border-t border-slate-900">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-5xl font-black uppercase italic mb-6">Absolute <span class="text-lime-400">Control</span></h2>
                <p class="text-slate-400 text-lg">Designed for professionals and enterprises needing a clear, secure, and immediate view of their liquidity.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="p-8 rounded-3xl bg-slate-900 border border-slate-800 hover:border-lime-400/50 transition-colors group">
                    <div class="w-14 h-14 bg-slate-950 border border-slate-800 rounded-xl flex items-center justify-center mb-6 group-hover:bg-lime-400/10 transition-colors">
                        <svg class="w-6 h-6 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 uppercase tracking-wide">Military-Grade Security</h3>
                    <p class="text-slate-400 leading-relaxed text-sm">AES-256 encryption and Zero-Knowledge architecture. Your financial data is inaccessible to anyone, including us.</p>
                </div>

                <div class="p-8 rounded-3xl bg-slate-900 border border-slate-800 hover:border-lime-400/50 transition-colors group">
                    <div class="w-14 h-14 bg-slate-950 border border-slate-800 rounded-xl flex items-center justify-center mb-6 group-hover:bg-lime-400/10 transition-colors">
                        <svg class="w-6 h-6 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 uppercase tracking-wide">Real-Time Analytics</h3>
                    <p class="text-slate-400 leading-relaxed text-sm">Dynamic dashboards that process your cash flows in real time, providing accurate projections on your capital.</p>
                </div>

                <div class="p-8 rounded-3xl bg-slate-900 border border-slate-800 hover:border-lime-400/50 transition-colors group">
                    <div class="w-14 h-14 bg-slate-950 border border-slate-800 rounded-xl flex items-center justify-center mb-6 group-hover:bg-lime-400/10 transition-colors">
                        <svg class="w-6 h-6 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 uppercase tracking-wide">Fast Integration</h3>
                    <p class="text-slate-400 leading-relaxed text-sm">Import data from CSV or connect your banks via secure APIs. Operational in minutes, not weeks.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="border-t border-slate-900 bg-slate-950 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-12">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-slate-800 rounded-lg flex items-center justify-center">
                        <span class="text-lime-400 font-black text-lg leading-none uppercase">K</span>
                    </div>
                    <span class="text-xl font-black uppercase tracking-tighter text-slate-300">KVault</span>
                </div>
                <div class="flex gap-6 text-sm font-bold text-slate-500 uppercase tracking-widest">
                    <a href="#" class="hover:text-lime-400 transition-colors">Privacy</a>
                    <a href="#" class="hover:text-lime-400 transition-colors">Terms</a>
                    <a href="pages/contacts.php" class="hover:text-lime-400 transition-colors">Contact</a>
                </div>
            </div>
            <div class="text-center text-slate-700 text-xs font-semibold uppercase tracking-widest">
                &copy; 2026 KVault Enterprise. All rights reserved.
            </div>
        </div>
    </footer>

</body>
</html>