<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KVault | Security</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #050b14; /* Sfondo scuro preso dall'immagine */ }
        .glass-card { background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(16px); }
        .neon-text { text-shadow: 0 0 20px rgba(163, 230, 53, 0.5); }
        .neon-border-hover:hover { box-shadow: 0 0 20px rgba(163, 230, 53, 0.15); border-color: rgba(163, 230, 53, 0.5); }
        .badge-bg { background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.05); }
    </style>
</head>
<body class="text-white selection:bg-lime-400 selection:text-black antialiased">

    <section class="relative py-32 overflow-hidden flex items-center justify-center min-h-screen">
        
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[600px] bg-lime-400/5 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-blue-900/10 rounded-full blur-[100px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 lg:px-12 relative z-10 w-full">
            
            <div class="text-center max-w-3xl mx-auto mb-20">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full badge-bg mb-8">
                    <div class="w-2 h-2 rounded-full bg-lime-400 shadow-[0_0_8px_#a3e635]"></div>
                    <span class="text-[10px] font-bold tracking-[0.2em] text-slate-300 uppercase">Enterprise-Grade Protection</span>
                </div>
                
                <h2 class="text-5xl md:text-6xl font-black uppercase tracking-tight text-white mb-6">
                    Inviolabile. <br />
                    <span class="text-lime-400 italic neon-text">By Design.</span>
                </h2>
                
                <p class="text-lg text-slate-400 font-light leading-relaxed">
                    La tua liquidità non è solo archiviata, è crittografata e frammentata su nodi isolati. Nessun singolo punto di vulnerabilità. Nessun compromesso sulla tua sovranità finanziaria.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                
                <div class="glass-card border border-slate-800 p-10 rounded-[2rem] neon-border-hover transition-all duration-300 group">
                    <div class="w-14 h-14 bg-slate-900 border border-slate-700 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-lime-400/10 group-hover:border-lime-400/30 transition-colors">
                        <svg class="w-7 h-7 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3 uppercase tracking-wide">Zero-Knowledge Architecture</h3>
                    <p class="text-sm text-slate-400 leading-relaxed">
                        Solo tu possiedi le chiavi di decrittazione. I tuoi dati sensibili, i saldi e le strategie di budget sono crittografati client-side (AES-256) prima di raggiungere i nostri server. Noi non possiamo vedere, né toccare, i tuoi fondi.
                    </p>
                </div>

                <div class="glass-card border border-slate-800 p-10 rounded-[2rem] neon-border-hover transition-all duration-300 group">
                    <div class="w-14 h-14 bg-slate-900 border border-slate-700 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-lime-400/10 group-hover:border-lime-400/30 transition-colors">
                        <svg class="w-7 h-7 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3 uppercase tracking-wide">Multi-Sig Cold Storage</h3>
                    <p class="text-sm text-slate-400 leading-relaxed">
                        Il 98% degli asset crittografici collegati a KVault è mantenuto offline in ambienti air-gapped geograficamente distribuiti. Le transazioni ad alto volume richiedono approvazioni multi-firma biometriche.
                    </p>
                </div>

                <div class="glass-card border border-slate-800 p-10 rounded-[2rem] neon-border-hover transition-all duration-300 group">
                    <div class="w-14 h-14 bg-slate-900 border border-slate-700 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-lime-400/10 group-hover:border-lime-400/30 transition-colors">
                        <svg class="w-7 h-7 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3 uppercase tracking-wide">Neural Threat Defense</h3>
                    <p class="text-sm text-slate-400 leading-relaxed">
                        Il nostro motore AI analizza i modelli di spesa in background. Se rileva un "Leak" anomalo o una transazione fuori dai tuoi schemi abituali, congela l'operazione in millisecondi e richiede una tua verifica istantanea.
                    </p>
                </div>

                <div class="glass-card border border-slate-800 p-10 rounded-[2rem] neon-border-hover transition-all duration-300 group">
                    <div class="w-14 h-14 bg-slate-900 border border-slate-700 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-lime-400/10 group-hover:border-lime-400/30 transition-colors">
                        <svg class="w-7 h-7 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3 uppercase tracking-wide">Decentralized Backups</h3>
                    <p class="text-sm text-slate-400 leading-relaxed">
                        Il tuo ecosistema finanziario non dipende da un singolo server. I backup crittografati del tuo "Vault State" sono distribuiti su protocolli decentralizzati, garantendoti l'accesso anche nel caso di failover completi.
                    </p>
                </div>

            </div>

        </div>
    </section>

</body>
</html>