<?php
$alreadySignedUp="<div class='fixed top-6 right-6 z-[100] animate-in fade-in slide-in-from-right-4 duration-500'>
                            <div class='bg-slate-900/95 backdrop-blur-md border-r-4 border-lime-400 p-4 rounded-l-xl shadow-2xl flex items-center gap-4 max-w-sm'>
                                
                                <button onclick='this.parentElement.parentElement.remove()' class='text-slate-500 hover:text-white transition-colors order-last ml-2'>
                                    <svg class='w-4 h-4' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path d='M6 18L18 6M6 6l12 12'></path></svg>
                                </button>

                                <div class='text-right'>
                                    <p class='text-white text-xs font-black uppercase tracking-widest leading-none mb-1'>Vault Detected</p>
                                    <p class='text-slate-400 text-[10px] font-medium'>Account already exists. <a href='login.php' class='text-lime-400 hover:underline font-bold'>Log in here</a>.</p>
                                </div>

                                <div class='text-lime-400'>
                                    <svg class='w-5 h-5' fill='none' stroke='currentColor' viewBox='0 0 24 24'>
                                        <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'></path>
                                    </svg>
                                </div>
                                
                            </div>
                </div>";

$signedUp="<div class='fixed top-6 right-6 z-[100] animate-in fade-in slide-in-from-right-4 duration-500'>
                    <div class='bg-slate-900/95 backdrop-blur-md border-r-4 border-lime-400 p-4 rounded-l-xl shadow-2xl flex items-center gap-4 max-w-sm'>
                        
                        <button onclick='this.parentElement.parentElement.remove()' class='text-slate-500 hover:text-white transition-colors order-last ml-2'>
                            <svg class='w-4 h-4' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path d='M6 18L18 6M6 6l12 12'></path></svg>
                        </button>

                        <div class='text-right'>
                            <p class='text-white text-xs font-black uppercase tracking-widest leading-none mb-1 text-lime-400'>Vault Deployed</p>
                            <p class='text-slate-400 text-[10px] font-medium'>Registration successful. <a href='login.php' class='text-white hover:underline font-bold'>Login to start</a>.</p>
                        </div>

                        <div class='text-lime-400'>
                            <svg class='w-6 h-6' fill='none' stroke='currentColor' viewBox='0 0 24 24'>
                                <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'></path>
                            </svg>
                        </div>
                        
                    </div>
                </div>
                <script>
                    // Auto-rimozione dopo 4 secondi per non intasare l'interfaccia
                    setTimeout(() => {
                        const toast = document.querySelector('.animate-in');
                        if(toast) {
                            toast.classList.add('fade-out');
                            setTimeout(() => toast.remove(), 500);
                        }
                    }, 4000);
                </script>
                ";


$wrongCredentials= "<div class='fixed top-6 right-6 z-[100] animate-in fade-in slide-in-from-right-4 duration-500'>
                    <div class='bg-slate-900/95 backdrop-blur-md border-r-4 border-rose-500 p-4 rounded-l-xl shadow-2xl flex items-center gap-4 max-w-sm'>
                        
                        <button onclick='this.parentElement.parentElement.remove()' class='text-slate-500 hover:text-white transition-colors order-last ml-2'>
                            <svg class='w-4 h-4' fill='none' stroke='currentColor' viewBox='0 0 24 24'>
                                <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M6 18L18 6M6 6l12 12'></path>
                            </svg>
                            </button>

                            <div class='text-right'>
                                <p class='text-white text-xs font-black uppercase tracking-widest leading-none mb-1'>Access Denied</p>
                                <p class='text-slate-400 text-[10px] font-medium'>Invalid username or password. Please try again.</p>
                            </div>

                            <div class='text-rose-500'>
                                <svg class='w-6 h-6' fill='none' stroke='currentColor' viewBox='0 0 24 24'>
                                    <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z'></path>
                                </svg>
                            </div>
                            
                        </div>
                    </div>";


$loginSuccess="<div class='fixed top-6 right-6 z-[100] animate-in fade-in slide-in-from-right-4 duration-500'>
            <div class='bg-slate-900/95 backdrop-blur-md border-r-4 border-lime-400 p-4 rounded-l-xl shadow-2xl flex items-center gap-4 max-w-sm'>
                <button onclick='this.parentElement.parentElement.remove()' class='text-slate-500 hover:text-white transition-colors order-last ml-2'>
                    <svg class='w-4 h-4' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M6 18L18 6M6 6l12 12'></path></svg>
                </button>
                <div class='text-right'>
                    <p class='text-white text-xs font-black uppercase tracking-widest leading-none mb-1'>Access Granted</p>
                    <p class='text-slate-400 text-[10px] font-medium'>Successfully logged in. Welcome back!</p>
                </div>
                <div class='text-lime-400'>
                    <svg class='w-6 h-6' fill='none' stroke='currentColor' viewBox='0 0 24 24'>
                        <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'></path>
                    </svg>
                </div>
            </div>
        </div>";

$addWallet="<div class='fixed top-6 right-6 z-[100] animate-in fade-in slide-in-from-right-4 duration-500'>
                <div class='bg-slate-900/95 backdrop-blur-md border-r-4 border-emerald-500 p-4 rounded-l-xl shadow-2xl flex items-center gap-4 max-w-sm'>
                    
                    <button onclick='this.parentElement.parentElement.remove()' class='text-slate-500 hover:text-white transition-colors order-last ml-2'>
                        <svg class='w-4 h-4' fill='none' stroke='currentColor' viewBox='0 0 24 24'>
                            <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M6 18L18 6M6 6l12 12'></path>
                        </svg>
                    </button>

                    <div class='text-right'>
                        <p class='text-white text-xs font-black uppercase tracking-widest leading-none mb-1'>Wallet Created</p>
                        <p class='text-slate-400 text-[10px] font-medium'>Your new vault is ready for transactions.</p>
                    </div>

                    <div class='text-emerald-500'>
                        <svg class='w-6 h-6' fill='none' stroke='currentColor' viewBox='0 0 24 24'>
                            <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'></path>
                        </svg>
                    </div>
                    
                </div>
            </div>";