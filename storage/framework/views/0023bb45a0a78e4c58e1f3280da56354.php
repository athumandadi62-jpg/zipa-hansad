<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>HANSAD Q&A System</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            :root {
                --primary: #6366f1;
                --primary-hover: #4f46e5;
                --bg: #0f172a;
                --card-bg: rgba(30, 41, 59, 0.7);
                --text-main: #f8fafc;
                --text-muted: #94a3b8;
                --glass-border: rgba(255, 255, 255, 0.1);
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Outfit', sans-serif;
                background-color: var(--bg);
                color: var(--text-main);
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                overflow: hidden;
                position: relative;
            }

            /* Animated Background */
            .bg-glow {
                position: absolute;
                width: 600px;
                height: 600px;
                background: radial-gradient(circle, rgba(99, 102, 241, 0.15) 0%, rgba(99, 102, 241, 0) 70%);
                border-radius: 50%;
                filter: blur(80px);
                z-index: -1;
                animation: float 20s infinite alternate;
            }

            @keyframes float {
                0% { transform: translate(-20%, -20%); }
                100% { transform: translate(20%, 20%); }
            }

            .container {
                max-width: 1000px;
                padding: 2rem;
                text-align: center;
                z-index: 10;
            }

            .glass-card {
                background: var(--card-bg);
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
                border: 1px solid var(--glass-border);
                border-radius: 24px;
                padding: 4rem 2rem;
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
                animation: fadeIn 0.8s ease-out;
            }

            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }

            .logo {
                font-size: 3rem;
                font-weight: 700;
                margin-bottom: 1.5rem;
                background: linear-gradient(to right, #818cf8, #c084fc);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                letter-spacing: -0.02em;
            }

            h1 {
                font-size: 1.5rem;
                color: var(--text-muted);
                margin-bottom: 3rem;
                font-weight: 300;
                line-height: 1.6;
            }

            .cta-group {
                display: flex;
                gap: 1.5rem;
                justify-content: center;
                flex-wrap: wrap;
            }

            .btn {
                padding: 1rem 2.5rem;
                border-radius: 12px;
                font-weight: 600;
                text-decoration: none;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                font-size: 1rem;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .btn-primary {
                background-color: var(--primary);
                color: white;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            }

            .btn-primary:hover {
                background-color: var(--primary-hover);
                transform: translateY(-2px);
                box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.4);
            }

            .btn-outline {
                background-color: transparent;
                color: var(--text-main);
                border: 1px solid var(--glass-border);
            }

            .btn-outline:hover {
                background-color: rgba(255, 255, 255, 0.05);
                border-color: rgba(255, 255, 255, 0.2);
                transform: translateY(-2px);
            }

            .features {
                margin-top: 4rem;
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 2rem;
            }

            .feature-item {
                padding: 1.5rem;
                text-align: left;
            }

            .feature-item h3 {
                color: #818cf8;
                margin-bottom: 0.5rem;
                font-size: 1.1rem;
            }

            .feature-item p {
                color: var(--text-muted);
                font-size: 0.9rem;
                line-height: 1.5;
            }

            footer {
                position: absolute;
                bottom: 2rem;
                color: var(--text-muted);
                font-size: 0.875rem;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="bg-glow"></div>
        <div class="container">
            <div class="glass-card">
                <div class="flex justify-center mb-6">
                    <img src="<?php echo e(asset('assets/img/logo-dark.png')); ?>" alt="ZIPA Logo" class="h-24 w-auto drop-shadow-2xl">
                </div>
                <div class="logo">HANSAD</div>
                <h1>Comprehensive Legislative Question & Answer Repository.<br>Empowering insights through data.</h1>
                
                <div class="cta-group">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Route::has('login')): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                            <a href="<?php echo e(url('/dashboard')); ?>" class="btn btn-primary">Enter Dashboard →</a>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>" class="btn btn-primary">Login to System</a>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Route::has('register')): ?>
                                <a href="<?php echo e(route('register')); ?>" class="btn btn-outline">Create Account</a>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <div class="features">
                    <div class="feature-item">
                        <h3>Smart Search</h3>
                        <p>Advanced filtering by session, topic, and participants for rapid retrieval.</p>
                    </div>
                    <div class="feature-item">
                        <h3>Admin Portal</h3>
                        <p>Robust management of meetings, participants, and legislative records.</p>
                    </div>
                    <div class="feature-item">
                        <h3>Data Insights</h3>
                        <p>Track legislative trends and participation with integrated analytics.</p>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            Copyright © dzsoftech. All rights reserved
        </footer>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\zipa-hansad\resources\views/welcome.blade.php ENDPATH**/ ?>