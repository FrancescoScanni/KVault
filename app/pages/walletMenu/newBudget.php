<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KVault | New Budget</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass-panel { background: rgba(15, 23, 42, 0.4); backdrop-filter: blur(12px); }
        .neon-glow { box-shadow: 0 0 15px rgba(163, 230, 53, 0.3); }
        
        /* Custom Range Slider */
        input[type=range] {
            -webkit-appearance: none;
            width: 100%;
            background: transparent;
        }
        input[type=range]::-webkit-slider-thumb {
            -webkit-appearance: none;
            height: 20px;
            width: 20px;
            border-radius: 50%;
            background: #a3e635; /* Lime-400 */
            cursor: pointer;
            margin-top: -8px;
            box-shadow: 0 0 10px rgba(163, 230, 53, 0.5);
        }
        input[type=range]::-webkit-slider-runnable-track {
            width: 100%;
            height: 4px;
            cursor: pointer;
            background: #1e293b; /* Slate-800 */
            border-radius: 2px;
        }
    </style>
</head>
<body class="bg-slate-950 text-white selection:bg-lime-400 selection:text-black h-screen flex flex-col overflow-hidden">

    <header class="h-20 border-b border-slate-900 bg-slate-950/80 backdrop-blur-md flex items-center justify-between px-8 relative z-20">
        <div class="flex items-center gap-6">
            <a href="strategy.php" class="flex items-center justify-center w-10 h-10 rounded-xl bg-slate-900 border border-slate-800 hover:border-slate-600 hover:bg-slate-800 transition-colors group">
                <svg class="w-5 h-5 text-slate-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <div>
                <span class="text-xs font-bold uppercase tracking-widest text-slate-500 block mb-0.5">Strategy Command</span>
                <h1 class="text-xl font-black uppercase tracking-tight text-white leading-none">Deploy Budget</h1>
            </div>
        </div>
    </header>

    <main class="flex-1 relative overflow-y-auto bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-slate-900 via-slate-950 to-slate-950 flex items-center">
        <div class="max-w-5xl mx-auto px-6 py-12 w-full grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            
            <div class="space-y-8">
                <div>
                    <h2 class="text-2xl font-black uppercase italic tracking-tight text-white mb-2">Protocol <span class="text-lime-400">Parameters</span></h2>
                    <p class="text-slate-400 text-sm">Define the limits and alert thresholds for this specific cash flow.</p>
                </div>

                <form id="budget-form" class="space-y-6" onsubmit="event.preventDefault(); deployBudget();">
                    
                    <div class="space-y-2">
                        <label for="b-name" class="text-xs font-bold uppercase tracking-widest text-slate-400">Target Designation (Name)</label>
                        <input type="text" id="b-name" placeholder="e.g. Dining & Groceries" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-600 focus:outline-none focus:border-lime-400 focus:ring-1 focus:ring-lime-400 transition-all font-bold">
                    </div>

                    <div class="space-y-2">
                        <label for="b-limit" class="text-xs font-bold uppercase tracking-widest text-slate-400">Monthly Ceiling ($)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 font-bold">$</span>
                            <input type="number" id="b-limit" placeholder="0.00" step="10" min="10" class="w-full bg-slate-900 border border-slate-700 rounded-xl pl-8 pr-4 py-3 text-white placeholder-slate-600 focus:outline-none focus:border-lime-400 focus:ring-1 focus:ring-lime-400 transition-all font-black text-xl">
                        </div>
                    </div>

                    <div class="space-y-4 pt-2">
                        <div class="flex justify-between items-end">
                            <label class="text-xs font-bold uppercase tracking-widest text-slate-400">Alert Threshold</label>
                            <span id="threshold-val" class="text-lime-400 font-black text-lg">75%</span>
                        </div>
                        <input type="range" id="b-threshold" min="50" max="100" value="75">
                        <p class="text-[10px] text-slate-500 font-bold uppercase tracking-wide">The vault will warn you when spending reaches this percentage.</p>
                    </div>

                    <button type="submit" class="w-full bg-lime-400 hover:bg-lime-500 text-black font-black uppercase tracking-widest py-4 rounded-xl transition-all shadow-[0_0_15px_rgba(163,230,53,0.3)] hover:shadow-[0_0_25px_rgba(163,230,53,0.5)] flex justify-center items-center gap-2 mt-8">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Deploy Budget
                    </button>
                </form>
            </div>

            <div class="hidden lg:block relative">
                <div class="absolute -inset-4 bg-slate-800/30 rounded-[2.5rem] border border-slate-800 border-dashed pointer-events-none"></div>
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-lime-400/5 rounded-full blur-3xl pointer-events-none"></div>
                
                <h3 class="text-[10px] font-black uppercase tracking-widest text-slate-500 mb-6 text-center">Live Interface Preview</h3>
                
                <div id="preview-card" class="glass-panel border border-slate-800 p-8 rounded-3xl transition-all duration-300 transform hover:scale-105">
                    <div class="flex justify-between items-start mb-6">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-slate-900 border border-slate-700 flex items-center justify-center">
                                <svg class="w-6 h-6 text-lime-400" id="preview-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <div>
                                <h3 id="preview-name" class="font-bold text-white text-lg">New Target...</h3>
                                <p class="text-xs text-slate-400">Simulated Data</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between items-end mb-2">
                        <span class="text-sm font-bold text-slate-500 uppercase tracking-wider">Current / Limit</span>
                        <div class="text-right">
                            <span class="text-2xl font-black text-white" id="preview-spent">$0.00</span>
                            <span class="text-sm text-slate-500 font-bold"> / $<span id="preview-limit">0.00</span></span>
                        </div>
                    </div>
                    
                    <div class="w-full bg-slate-900 rounded-full h-3 border border-slate-800 overflow-hidden mb-2 relative">
                        <div id="preview-bar" class="bg-slate-700 h-3 rounded-full transition-all duration-500 w-0"></div>
                        <div id="preview-marker" class="absolute top-0 bottom-0 w-0.5 bg-red-500 z-10 transition-all duration-300" style="left: 75%;"></div>
                    </div>
                    <div class="flex justify-between items-center text-xs font-bold">
                        <span class="text-slate-500">Simulated 45% used</span>
                        <span id="preview-status" class="text-lime-400">System Ready</span>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <script>
        const inputs = {
            name: document.getElementById('b-name'),
            limit: document.getElementById('b-limit'),
            threshold: document.getElementById('b-threshold')
        };

        const preview = {
            name: document.getElementById('preview-name'),
            limit: document.getElementById('preview-limit'),
            bar: document.getElementById('preview-bar'),
            marker: document.getElementById('preview-marker'),
            status: document.getElementById('preview-status'),
            thresholdVal: document.getElementById('threshold-val')
        };

        // Aggiornamento Live del Testo
        inputs.name.addEventListener('input', (e) => {
            preview.name.innerText = e.target.value || "New Target...";
        });

        // Aggiornamento Live del Limite Monetario
        inputs.limit.addEventListener('input', (e) => {
            const val = parseFloat(e.target.value) || 0;
            preview.limit.innerText = val.toFixed(2);
            
            // Simula una spesa al 45% del limite impostato per far vedere la barra che si muove
            if(val > 0) {
                preview.bar.style.width = '45%';
                preview.bar.className = 'bg-lime-400 h-3 rounded-full transition-all duration-500 shadow-[0_0_10px_rgba(163,230,53,0.5)]';
            } else {
                preview.bar.style.width = '0%';
                preview.bar.className = 'bg-slate-700 h-3 rounded-full transition-all duration-500';
            }
        });

        // Aggiornamento Live dello Slider (Soglia di Allerta)
        inputs.threshold.addEventListener('input', (e) => {
            const val = e.target.value;
            preview.thresholdVal.innerText = `${val}%`;
            preview.marker.style.left = `${val}%`;

            // Cambia colore del testo in base alla severità
            if (val < 65) {
                preview.thresholdVal.className = "text-orange-400 font-black text-lg";
                preview.status.innerText = `Strict Alert at ${val}%`;
                preview.status.className = "text-orange-400";
            } else if (val > 85) {
                preview.thresholdVal.className = "text-red-500 font-black text-lg";
                preview.status.innerText = `Risky Alert at ${val}%`;
                preview.status.className = "text-red-500";
            } else {
                preview.thresholdVal.className = "text-lime-400 font-black text-lg";
                preview.status.innerText = `Standard Alert at ${val}%`;
                preview.status.className = "text-lime-400";
            }
        });

        // Simulazione di salvataggio (Submit del Form)
        function deployBudget() {
            const btn = document.querySelector('button[type="submit"]');
            const originalContent = btn.innerHTML;
            
            // UI Feedback per il salvataggio
            btn.innerHTML = `<svg class="w-5 h-5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg> Compiling...`;
            btn.classList.replace('bg-lime-400', 'bg-slate-700');
            btn.classList.replace('text-black', 'text-white');
            btn.classList.remove('shadow-[0_0_15px_rgba(163,230,53,0.3)]');

            // Simula latenza di rete
            setTimeout(() => {
                btn.innerHTML = `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Deployed Successfully`;
                btn.classList.replace('bg-slate-700', 'bg-lime-400');
                btn.classList.replace('text-white', 'text-black');
                
                // Ritorno allo stato normale dopo 2 secondi
                setTimeout(() => {
                    btn.innerHTML = originalContent;
                    // Qui, in un'app vera, faresti: window.location.href = 'strategy.html';
                }, 2000);
            }, 1500);
        }
    </script>
</body>
</html>