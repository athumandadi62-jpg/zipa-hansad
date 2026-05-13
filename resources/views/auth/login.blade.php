<x-guest-layout>
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
            margin: 0;
        }

        .bg-glow {
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.15) 0%, rgba(99, 102, 241, 0) 70%);
            border-radius: 50%;
            filter: blur(80px);
            z-index: -1;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .glass-card {
            background: var(--card-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 2rem 2.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 450px;
        }

        .logo-text {
            font-size: 2.25rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(to right, #818cf8, #c084fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.02em;
            text-align: center;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-muted);
            margin-bottom: 0.5rem;
        }

        .form-input {
            width: 100%;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--glass-border);
            border-radius: 12px;
            padding: 0.75rem 1rem;
            color: white;
            transition: all 0.3s;
            outline: none;
        }

        .form-input:focus {
            background: rgba(255, 255, 255, 0.1);
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.2);
        }

        .btn-login {
            width: 100%;
            background: var(--primary);
            color: white;
            padding: 0.75rem;
            border-radius: 12px;
            font-weight: 700;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .btn-login:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.4);
        }

        footer {
            margin-top: 2rem;
            color: var(--text-muted);
            font-size: 0.875rem;
            text-align: center;
        }
    </style>

    <div class="bg-glow"></div>

    <div class="glass-card">
        <!-- Logo Section -->
        <div class="flex justify-center mb-4">
            <img src="{{ asset('assets/img/logo-dark.png') }}" alt="ZIPA Logo" class="h-16 w-auto drop-shadow-xl">
        </div>
        <div class="logo-text">HANSAD</div>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus 
                    placeholder="name@example.com" class="form-input">
            </div>

            <div>
                <div class="flex items-center justify-between mb-2">
                    <label for="password" class="form-label mb-0">Password</label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-xs font-semibold text-white hover:text-indigo-300">
                            Forgot?
                        </a>
                    @endif
                </div>
                <input id="password" type="password" name="password" required 
                    placeholder="••••••••" class="form-input">
            </div>

            <div class="flex items-center">
                <input id="remember_me" type="checkbox" name="remember" 
                    class="w-4 h-4 rounded border-slate-700 bg-slate-800 text-indigo-500 focus:ring-indigo-500/20">
                <span class="ms-2 text-sm text-white font-medium">Keep me signed in</span>
            </div>

            <button type="submit" class="btn-login">
                Sign In to Hansad
            </button>
        </form>
    </div>

    <footer>
        Copyright © dzsoftech. All rights reserved
    </footer>
</x-guest-layout>
