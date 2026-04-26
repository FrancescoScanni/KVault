<?php
    session_start();
    require_once("../models/user.php");
    
    $nameErr = $surnameErr = $emailErr = $passErr =$pass2Err = "";
    $name = $surname = $mail = $gender = $usage = $password = $password2= "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $name = trim($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "It must contain only letters";
        }

        $surname = trim($_POST["surname"]); // corretto surnae in surname
        if (!preg_match("/^[a-zA-Z-' ]*$/", $surname)) {
            $surnameErr = "It must contain only letters";
        }

        $mail = trim($_POST["mail"]);
        $gender=$_POST["gender"];
        $usage=$_POST["usage"];

        $password = $_POST["password"];
        if (!preg_match("/^(?=.*[0-9]).{6,}$/", $password)) {
            $passErr = "Password must be at least 6 characters long and contain at least one number";
        }
        $password2 = $_POST["password2"];

        //CONTROLLO FINALE
        if (empty($nameErr) && empty($surnameErr) && empty($passErr)) {
            if($password!=$password2){
                $pass2Err="Password must be equal to the original one";
            }else{
                $user = new User($name,$surname,$mail,$gender,$usage,$password);
                $user->signUp();
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KVault | Initialize Vault</title>
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
        /* Custom scrollbar for an enterprise feel */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #020617; }
        ::-webkit-scrollbar-thumb { background: #1e293b; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #334155; }
        
        /* Custom styling for select dropdowns to remove default webkit styling */
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1em;
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
                <span class="w-2 h-2 bg-lime-400 rounded-full"></span>
                <span class="text-[10px] font-bold tracking-[0.2em] uppercase text-slate-400">System Initialization</span>
            </div>
            <h1 class="text-6xl xl:text-7xl font-black uppercase leading-none mb-6 italic neon-glow text-lime-400">
                SECURE<br>YOUR ASSETS
            </h1>
            <p class="text-2xl font-light text-slate-300 tracking-tight max-w-md">
                Create your digital <span class="text-lime-400 font-medium italic">treasury</span> today and gain absolute control over your liquidity.
            </p>
        </div>

        <div class="relative z-10 flex gap-8 text-slate-600 font-bold text-sm tracking-widest uppercase">
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                <span>End-to-End Encrypted</span>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-1/2 h-full bg-slate-950 flex flex-col px-8 py-12 sm:px-12 relative">
        
        <div class="lg:hidden flex items-center gap-2 mb-10">
            <div class="w-8 h-8 bg-lime-400 rounded-lg flex items-center justify-center">
                <span class="text-black font-black text-xl leading-none uppercase">K</span>
            </div>
            <span class="text-xl font-black uppercase tracking-tighter">KVault</span>
        </div>

        <div class="w-full max-w-lg mx-auto my-auto space-y-8">
            
            <div>
                <h2 class="text-3xl font-bold mb-2">Initialize your vault</h2>
                <p class="text-slate-400 text-sm">Enter your personal details to set up your secure environment.</p>
            </div>

            <form class="space-y-5"  method="post">
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="space-y-2">
                        <label for="firstName" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">First Name</label>
                        <input name="name" type="text" id="firstName" required
                            class="block w-full px-4 py-3 bg-slate-900 border border-slate-800 rounded-xl text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-lime-400/50 focus:border-lime-400 transition-all"
                            placeholder="John">
                        <h1 class="text-[11px] text-[#a1d907]"> <?php echo $nameErr; ?> </h1>
                    </div>
                    <div class="space-y-2">
                        <label for="lastName" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Last Name</label>
                        <input name="surname" type="text" id="lastName" required
                            class="block w-full px-4 py-3 bg-slate-900 border border-slate-800 rounded-xl text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-lime-400/50 focus:border-lime-400 transition-all"
                            placeholder="Doe">
                        <h1 class="text-[11px] text-[#a1d907]"> <?php echo $surnameErr; ?> </h1>
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="email" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" /></svg>
                        </div>
                        <input name="mail" type="email" id="email" required
                            class="block w-full pl-11 pr-4 py-3 bg-slate-900 border border-slate-800 rounded-xl text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-lime-400/50 focus:border-lime-400 transition-all"
                            placeholder="john.doe@example.com">
                        <h1 class="text-[11px] text-[#a1d907]"> <?php echo $emailErr; ?> </h1>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="space-y-2">
                        <label for="gender" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Gender</label>
                        <select name="gender" id="gender" required class="block w-full px-4 py-3 bg-slate-900 border border-slate-800 rounded-xl text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-lime-400/50 focus:border-lime-400 transition-all cursor-pointer">
                            <option value="" disabled selected class="text-slate-600">Select...</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="non-binary">Non-binary</option>
                            <option value="prefer-not-to-say">Prefer not to say</option>
                        </select>
                        
                    </div>

                    <div class="space-y-2">
                        <label for="useCase" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Using KVault for</label>
                        <select name="usage" id="useCase" required class="block w-full px-4 py-3 bg-slate-900 border border-slate-800 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-lime-400/50 focus:border-lime-400 transition-all cursor-pointer">
                            <option value="" disabled selected>Select account type</option>
                            <option value="personal">Personal</option>
                            <option value="enterprise">Enterprise</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="space-y-2">
                        <label for="password" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Master Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                            </div>
                            <input name="password" type="password" id="password" required
                                class="block w-full pl-11 pr-4 py-3 bg-slate-900 border border-slate-800 rounded-xl text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-lime-400/50 focus:border-lime-400 transition-all"
                                placeholder="••••••••••••">
                            <h1 class="text-[11px] text-[#a1d907]"> <?php echo $passErr; ?> </h1>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="confirmPassword" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Confirm Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                            </div>
                            <input name="password2" type="password" id="confirmPassword" required
                                class="block w-full pl-11 pr-4 py-3 bg-slate-900 border border-slate-800 rounded-xl text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-lime-400/50 focus:border-lime-400 transition-all"
                                placeholder="••••••••••••">
                            <h1 class="text-[11px] text-[#a1d907]"> <?php echo $pass2Err; ?> </h1>
                        </div>
                    </div>
                </div>

                <div class="flex items-start gap-3 pt-2">
                    <div class="flex items-center h-5">
                        <input id="terms" type="checkbox" required class="w-4 h-4 bg-slate-900 border-slate-800 rounded text-lime-400 focus:ring-lime-400 focus:ring-offset-slate-950 cursor-pointer">
                    </div>
                    <label for="terms" class="text-xs text-slate-400 leading-relaxed">
                        I agree to the <a href="#" class="text-lime-400 hover:text-lime-300 font-semibold transition-colors">Terms of Service</a> and <a href="#" class="text-lime-400 hover:text-lime-300 font-semibold transition-colors">Privacy Policy</a>. I understand that my master password cannot be recovered by KVault.
                    </label>
                </div>

                <input type="submit" value="Create Account"
                    class="w-full flex justify-center py-4 px-4 mt-4 border border-transparent rounded-xl shadow-sm text-sm font-black uppercase tracking-wider text-black bg-lime-400 hover:bg-lime-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-400 focus:ring-offset-slate-950 transition-all transform hover:-translate-y-0.5">
                    
                </input>
            </form>

            <p class="text-center text-sm text-slate-500 mt-8 pb-8">
                Already have a vault? 
                <a href="logIn.php" class="font-bold text-white hover:text-lime-400 transition-colors">Log In here</a>
            </p>

        </div>
    </div>

</body>
</html>