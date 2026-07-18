<div class="w-full max-w-[28rem] rounded-3xl border border-outline-variant bg-white/85 p-6 shadow-lift backdrop-blur-2xl sm:p-8">
    <div class="mb-6 space-y-2">
        <h2 class="font-headline text-2xl font-extrabold tracking-[-0.03em] text-on-surface">
            Create your account
        </h2>
        <p class="text-sm text-on-surface-variant">
            Build your smart career portfolio
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div class="space-y-2">
            <label for="name" class="text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">
                Full Name
            </label>
            <div class="relative">
                <span class="material-symbols-outlined pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-[20px] text-on-surface-variant transition-colors" id="name-icon">
                    person
                </span>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                    class="premium-input h-12 pl-12 pr-4 text-sm placeholder:text-on-surface-variant/60"
                    placeholder="John Doe" />
                @error('name')
                    <p class="mt-2 text-sm text-error">{{ $message }}</p>
                @enderror
            </div>
        </div>
                <div class="space-y-2">
            <label for="name" class="text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">
                Username
            </label>
            <div class="relative">
                <span class="material-symbols-outlined pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-[20px] text-on-surface-variant transition-colors" id="name-icon">
                    person
                </span>
                <input type="text" id="username" name="username" value="{{ old('username') }}" required autofocus
                    class="premium-input h-12 pl-12 pr-4 text-sm placeholder:text-on-surface-variant/60"
                    placeholder="john_doe" />
                @error('username')
                    <p class="mt-2 text-sm text-error">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="space-y-2">
            <label for="email" class="text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">
                Email Address
            </label>
            <div class="relative">
                <span class="material-symbols-outlined pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-[20px] text-on-surface-variant transition-colors" id="email-icon">
                    mail
                </span>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="premium-input h-12 pl-12 pr-4 text-sm placeholder:text-on-surface-variant/60"
                    placeholder="name@company.com" />
                @error('email')
                    <p class="mt-2 text-sm text-error">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="space-y-2">
            <label for="password" class="text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">
                Password
            </label>
            <div class="relative">
                <span class="material-symbols-outlined pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-[20px] text-on-surface-variant transition-colors" id="password-icon">
                    lock
                </span>
                <input type="password" id="password" name="password" required
                    class="premium-input h-12 pl-12 pr-4 text-sm placeholder:text-on-surface-variant/60"
                    placeholder="••••••••" />
                @error('password')
                    <p class="mt-2 text-sm text-error">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="space-y-2">
            <label for="password_confirmation" class="text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">
                Confirm Password
            </label>
            <div class="relative">
                <span class="material-symbols-outlined pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-[20px] text-on-surface-variant transition-colors" id="password-confirm-icon">
                    verified_user
                </span>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="premium-input h-12 pl-12 pr-4 text-sm placeholder:text-on-surface-variant/60"
                    placeholder="••••••••" />
                @error('password_confirmation')
                    <p class="mt-2 text-sm text-error">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <p class="text-center text-sm text-on-surface-variant">
            By creating an account, you agree to our
            <a href="#" class="font-semibold text-primary underline-offset-4 hover:underline">Terms of Service</a>
            and
            <a href="#" class="font-semibold text-primary underline-offset-4 hover:underline">Privacy Policy</a>.
        </p>

        <button type="submit"
            class="inline-flex h-12 w-full items-center justify-center gap-2 rounded-full bg-primary px-5 text-sm font-semibold text-on-primary shadow-soft transition duration-200 hover:-translate-y-0.5 hover:shadow-lift active:scale-[0.99]">
            Create Account
            <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
        </button>
    </form>

    <div class="my-7 flex items-center gap-3">
        <div class="h-px flex-1 bg-outline-variant"></div>
        <span class="font-mono text-[0.72rem] uppercase tracking-[0.18em] text-on-surface-variant">Or</span>
        <div class="h-px flex-1 bg-outline-variant"></div>
    </div>

    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
        <button type="button"
            class="inline-flex h-12 items-center justify-center gap-2 rounded-full border border-outline-variant bg-white px-4 text-sm font-medium text-on-surface transition hover:bg-surface-strong">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
            </svg>
            Google
        </button>
        <button type="button"
            class="inline-flex h-12 items-center justify-center gap-2 rounded-full border border-outline-variant bg-white px-4 text-sm font-medium text-on-surface transition hover:bg-surface-strong">
            <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v 3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
            </svg>
            GitHub
        </button>
    </div>

    <p class="mt-6 text-center text-sm text-on-surface-variant">
        Already have an account?
        <a href="{{ route('login') }}" class="font-semibold text-primary underline-offset-4 hover:underline">
            Sign In
        </a>
    </p>
</div>

<script>
    (() => {
        const inputs = [
            { element: 'name', icon: 'name-icon' },
            { element: 'email', icon: 'email-icon' },
            { element: 'password', icon: 'password-icon' },
            { element: 'password_confirmation', icon: 'password-confirm-icon' }
        ];

        inputs.forEach(({ element, icon }) => {
            const inputEl = document.getElementById(element);
            const iconEl = document.getElementById(icon);

            if (!inputEl || !iconEl) {
                return;
            }

            inputEl.addEventListener('focus', () => {
                iconEl.classList.add('text-primary');
                iconEl.classList.remove('text-on-surface-variant');
            });

            inputEl.addEventListener('blur', () => {
                iconEl.classList.remove('text-primary');
                iconEl.classList.add('text-on-surface-variant');
            });
        });
    })();
</script>
