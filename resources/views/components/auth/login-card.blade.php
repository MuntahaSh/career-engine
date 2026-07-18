<div class="w-full max-w-[28rem] rounded-3xl border border-outline-variant bg-white/85 p-6 shadow-lift backdrop-blur-2xl sm:p-8">
    <div class="mb-6 space-y-2">
        <h2 class="font-headline text-2xl font-extrabold tracking-[-0.03em] text-on-surface">
            Sign in to your account
        </h2>
        <p class="text-sm text-on-surface-variant">
            Enter your credentials to access your dashboard.
        </p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div class="space-y-2">
            <label for="email" class="text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">
                Email Address
            </label>
            <div class="relative">
                <span class="material-symbols-outlined pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-[20px] text-on-surface-variant transition-colors" id="email-icon">mail</span>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                    class="premium-input h-12 pl-12 pr-4 text-sm placeholder:text-on-surface-variant/60"
                    placeholder="name@company.com" />
                @error('email')
                <p class="mt-2 text-sm text-error">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="space-y-2">
            <div class="flex items-center justify-between gap-4">
                <label for="password" class="text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">
                    Password
                </label>
                <a href="{{ route('password.request') }}" class="text-sm text-secondary transition-colors hover:text-primary">
                    Forgot password?
                </a>
            </div>

            <div class="relative">
                <span class="material-symbols-outlined pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-[20px] text-on-surface-variant transition-colors" id="password-icon">lock</span>
                <input type="password" id="password" name="password" required
                    class="premium-input h-12 pl-12 pr-4 text-sm placeholder:text-on-surface-variant/60"
                    placeholder="••••••••" />
                @error('password')
                <p class="mt-2 text-sm text-error">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <label class="flex items-center gap-3">
            <input type="checkbox" id="remember" name="remember"
                class="h-4 w-4 rounded border-outline-variant text-primary focus:ring-primary accent-primary" />
            <span class="text-sm text-on-surface-variant">Remember me for 30 days</span>
        </label>

        <button type="submit"
            class="inline-flex h-12 w-full items-center justify-center gap-2 rounded-full bg-primary px-5 text-sm font-semibold text-on-primary shadow-soft transition duration-200 hover:-translate-y-0.5 hover:shadow-lift active:scale-[0.99]">
            Sign In
            <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
        </button>
    </form>

    <div class="mt-6 text-center">
        <p class="text-sm text-on-surface-variant">
            Don't have an account?
            <a href="{{ route('register') }}" class="font-semibold text-primary underline-offset-4 hover:underline">
                Register
            </a>
        </p>
    </div>
</div>

<script>
    (() => {
        const wire = (inputId, iconId) => {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);

            if (!input || !icon) {
                return;
            }

            input.addEventListener('focus', () => {
                icon.classList.add('text-primary');
                icon.classList.remove('text-on-surface-variant');
            });

            input.addEventListener('blur', () => {
                icon.classList.remove('text-primary');
                icon.classList.add('text-on-surface-variant');
            });
        };

        wire('email', 'email-icon');
        wire('password', 'password-icon');
    })();
</script>
