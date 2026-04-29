<?php
    session_start();
    require_once("../components/warnings.php");
    require_once("../models/user.php");
    $mail=$password="";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $mail = trim($_POST["mail"]);
        $password=trim($_POST["password"]);

        if(User::logIn($mail,$password)==true){
            //echo "giusto";
            $_SESSION["logged"]=true;
            $_SESSION["loginSuccess"]=$loginSuccess;
            header("Location: ../index.php");
            exit;
        }else{
            //echo "err";
            echo $wrongCredentials;
            $_SESSION["logged"]=false;
        }
    }
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KVault | Secure Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .neon-glow {
            text-shadow: 0 0 20px rgba(163, 230, 53, 0.5);
        }
        .bg-gradient-brand {
            background: radial-gradient(circle at 30% 30%, #0c121e, #020617);
        }
    </style>

</head>

<body class="bg-slate-950 text-white selection:bg-lime-400 selection:text-black h-screen flex overflow-hidden">

    <div class="hidden lg:flex w-1/2 bg-gradient-brand relative flex-col justify-between p-12 border-r border-slate-900">
        
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-lime-500/10 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-blue-500/10 rounded-full blur-[100px] pointer-events-none"></div>

        <div class="relative z-10 flex items-center gap-3">
            <div class="w-10 h-10 bg-lime-400 rounded-xl rotate-3 flex items-center justify-center shadow-[0_0_20px_rgba(163,230,53,0.3)]">
                <span class="text-black font-black text-2xl leading-none -rotate-3 uppercase">K</span>
            </div>
            <a href="../index.php"><span class="text-xl font-black uppercase tracking-tighter">KVault</span></a>
        </div>

        <div class="relative z-10 my-auto">
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-slate-900 border border-slate-800 rounded-full mb-6">
                <span class="w-2 h-2 bg-lime-400 rounded-full animate-pulse"></span>
                <span class="text-[10px] font-bold tracking-[0.2em] uppercase text-slate-400">Secure Gateway</span>
            </div>
            <h1 class="text-6xl xl:text-7xl font-black uppercase leading-none mb-6 italic neon-glow text-lime-400">
                ENTER<br>THE VAULT
            </h1>
            <p class="text-2xl font-light text-slate-300 tracking-tight max-w-md">
                Welcome back. Access your digital <span class="text-lime-400 font-medium italic">treasury</span> and monitor your liquidity.
            </p>
        </div>

        <div class="relative z-10 flex gap-8 text-slate-600 font-bold text-sm tracking-widest uppercase">
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                <span>Zero-Knowledge Auth</span>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-1/2 h-full flex flex-col px-8 py-12 sm:px-12 relative bg-slate-950">
        
        <div class="lg:hidden flex items-center gap-2 mb-10">
            <div class="w-8 h-8 bg-lime-400 rounded-lg flex items-center justify-center">
                <span class="text-black font-black text-xl leading-none uppercase">K</span>
            </div>
            <span class="text-xl font-black uppercase tracking-tighter">KVault</span>
        </div>

        <div class="w-full max-w-md mx-auto my-auto space-y-8">
            
            <div>
                <h2 class="text-3xl font-bold mb-2">Welcome Back</h2>
                <p class="text-slate-400 text-sm">Enter your credentials to decrypt and access your vault.</p>
            </div>

            <form class="space-y-6" action="logIn.php" method="post">
                
                <div class="space-y-2">
                    <label for="email" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" /></svg>
                        </div>
                        <input type="email" name="mail" required
                            class="block w-full pl-11 pr-4 py-3 bg-slate-900 border border-slate-800 rounded-xl text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-lime-400/50 focus:border-lime-400 transition-all"
                            placeholder="name@company.com">
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="password" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Master Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                        </div>
                        <input type="password" name="password" required
                            class="block w-full pl-11 pr-4 py-3 bg-slate-900 border border-slate-800 rounded-xl text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-lime-400/50 focus:border-lime-400 transition-all"
                            placeholder="••••••••••••">
                    </div>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <div class="flex items-center gap-2">
                        <input id="remember" type="checkbox" class="w-4 h-4 bg-slate-900 border-slate-800 rounded text-lime-400 focus:ring-lime-400 focus:ring-offset-slate-950 cursor-pointer">
                        <label for="remember" class="text-sm text-slate-400 cursor-pointer">Remember device</label>
                    </div>
                </div>

                <button type="submit" 
                    class="w-full flex justify-center py-4 px-4 mt-6 border border-transparent rounded-xl shadow-sm text-sm font-black uppercase tracking-wider text-black bg-lime-400 hover:bg-lime-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-400 focus:ring-offset-slate-950 transition-all transform hover:-translate-y-0.5">
                    Unlock Vault
                </button>
            </form>

            <p class="text-center text-sm text-slate-500 mt-8">
                Don't have a digital treasury yet? 
                <a href="signUp.php" class="font-bold text-white hover:text-lime-400 transition-colors">Initialize one here</a>
            </p>

        </div>
    </div>

</body>
</html>