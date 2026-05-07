<?php
session_start();
// Assicurati di avere i dati utente in sessione
$user_name = $_SESSION['userName'] ?? 'Agent_00';
$user_email = $_SESSION['userEmail'] ?? 'vault@protocol.io';
$user_id = $_SESSION['userID'] ?? 'KV-9923';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KVault | Security Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass-panel { background: rgba(15, 23, 42, 0.4); backdrop-filter: blur(12px); }
        .neon-text { text-shadow: 0 0 10px rgba(163, 230, 53, 0.5); }
        .neon-border:focus { border-color: #a3e635; box-shadow: 0 0 15px rgba(163, 230, 53, 0.2); }
    </style>
</head>
<body class="bg-slate-950 text-white min-h-screen selection:bg-lime-400 selection:text-black">

    <header class="h-20 border-b border-slate-900 bg-slate-950/80 backdrop-blur-md flex items-center justify-between px-8 sticky top-0 z-50">
        <div class="flex items-center gap-4">
             <div class="w-10 h-10 bg-lime-400 rounded-lg flex items-center justify-center font-black text-black text-xl shadow-[0_0_15px_rgba(163,230,53,0.4)]">K</div>
             <span class="font-black text-xl tracking-tighter uppercase">KVAULT</span>
        </div>
        <nav class="flex items-center gap-8">
            <a href="strategy.php" class="text-xs font-bold uppercase text-slate-400 hover:text-white transition-colors">Strategy</a>
            <a href="operations.php" class="text-xs font-bold uppercase text-slate-400 hover:text-white transition-colors">Operations</a>
            <a href="logout.php" class="bg-lime-400 text-black px-5 py-2 rounded-lg font-black text-xs uppercase hover:bg-lime-500 transition-all">Logout</a>
        </nav>
    </header>

    <main class="max-w-6xl mx-auto px-6 py-12">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-12">
            <div>
                <span class="text-xs font-bold uppercase tracking-[0.3em] text-lime-400 mb-2 block neon-text">Access Authorized</span>
                <h1 class="text-5xl font-black uppercase tracking-tighter">System <span class="text-slate-500 italic">Profile</span></h1>
            </div>
            <div class="flex gap-4">
                <div class="glass-panel border border-slate-800 px-6 py-3 rounded-2xl">
                    <span class="block text-[10px] font-bold text-slate-500 uppercase">Vault ID</span>
                    <span class="font-mono text-lime-400">#<?php echo $user_id; ?></span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-1 space-y-6">
                <div class="glass-panel border border-slate-800 rounded-3xl p-8 relative overflow-hidden">
                    <div class="absolute -top-12 -right-12 w-32 h-32 bg-lime-400/5 rounded-full blur-3xl"></div>
                    
                    <div class="relative z-10 text-center">
                        <div class="w-24 h-24 bg-slate-900 border-2 border-slate-800 rounded-full mx-auto mb-6 flex items-center justify-center relative">
                            <span class="text-3xl font-black text-white"><?php echo strtoupper(substr($user_name, 0, 2)); ?></span>
                            <div class="absolute bottom-1 right-1 w-5 h-5 bg-lime-500 border-4 border-slate-950 rounded-full"></div>
                        </div>
                        <h2 class="text-2xl font-black tracking-tight mb-1"><?php echo $user_name; ?></h2>
                        <p class="text-slate-500 font-medium text-sm mb-6"><?php echo $user_email; ?></p>
                        
                        <div class="flex justify-center gap-2">
                            <span class="px-3 py-1 bg-slate-900 border border-slate-800 rounded-full text-[10px] font-bold uppercase text-slate-400">Level 4 Admin</span>
                            <span class="px-3 py-1 bg-slate-900 border border-slate-800 rounded-full text-[10px] font-bold uppercase text-lime-400 border-lime-400/30">Active</span>
                        </div>
                    </div>
                </div>

                <div class="glass-panel border border-slate-800 rounded-3xl p-6">
                    <h3 class="text-[10px] font-black uppercase text-slate-500 tracking-widest mb-4">Security Logs</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center border-b border-slate-900 pb-3">
                            <span class="text-xs text-slate-400">Last Encryption</span>
                            <span class="text-xs font-bold">2m ago</span>
                        </div>
                        <div class="flex justify-between items-center border-b border-slate-900 pb-3">
                            <span class="text-xs text-slate-400">Active Sessions</span>
                            <span class="text-xs font-bold">01</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 space-y-8">
                
                <div class="glass-panel border border-slate-800 rounded-3xl p-8">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-10 h-10 bg-slate-900 border border-slate-800 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold uppercase">Security Protocol</h3>
                    </div>

                    <form action="updateProfile.php" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase text-slate-500 ml-1">Username</label>
                            <input type="text" value="<?php echo $user_name; ?>" class="w-full bg-slate-900/50 border border-slate-800 rounded-xl px-4 py-3 text-white focus:outline-none neon-border transition-all">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase text-slate-500 ml-1">Email Source</label>
                            <input type="email" value="<?php echo $user_email; ?>" class="w-full bg-slate-900/50 border border-slate-800 rounded-xl px-4 py-3 text-white focus:outline-none neon-border transition-all">
                        </div>
                        <div class="space-y-2 md:col-span-2">
                            <label class="text-[10px] font-black uppercase text-slate-500 ml-1">New Security Phrase (Password)</label>
                            <input type="password" placeholder="••••••••••••" class="w-full bg-slate-900/50 border border-slate-800 rounded-xl px-4 py-3 text-white focus:outline-none neon-border transition-all">
                        </div>
                        
                        <div class="md:col-span-2 pt-4">
                            <button class="bg-white text-black font-black uppercase text-xs tracking-widest px-8 py-4 rounded-xl hover:bg-lime-400 transition-all duration-300">
                                Update Credentials
                            </button>
                        </div>
                    </form>
                </div>

                <div class="border border-red-900/30 bg-red-950/10 rounded-3xl p-8">
                    <h3 class="text-red-500 text-xs font-black uppercase tracking-widest mb-2">Danger Zone</h3>
                    <p class="text-slate-500 text-sm mb-6">Once you terminate the vault connection, all protocols will be permanently erased.</p>
                    <button class="text-red-500 border border-red-900/50 hover:bg-red-500 hover:text-white px-6 py-3 rounded-xl text-xs font-black uppercase transition-all">
                        Terminate Vault Instance
                    </button>
                </div>

            </div>
        </div>
    </main>

</body>
</html>