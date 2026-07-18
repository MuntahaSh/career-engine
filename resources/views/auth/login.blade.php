<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In - CareerEngine</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Geist:wght@400;500;600;700&family=Inter:wght@400;500;600;700;800&family=Manrope:wght@500;600;700;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        background: "#f7f1f3",
                        surface: "#fffdfd",
                        "surface-soft": "#fdf7f8",
                        "surface-strong": "#f5ecef",
                        primary: "#1e1b2d",
                        secondary: "#7f6d8b",
                        "secondary-container": "#efe3ee",
                        outline: "#a59aa4",
                        "outline-variant": "#e2d9de",
                        "on-surface": "#211925",
                        "on-surface-variant": "#685c68",
                        "on-primary": "#ffffff",
                        error: "#be4f61",
                    },
                    borderRadius: {
                        xl: "1.25rem",
                        "2xl": "1.5rem",
                        "3xl": "1.875rem",
                        full: "9999px",
                    },
                    boxShadow: {
                        soft: "0 10px 30px -20px rgba(30, 27, 45, 0.4)",
                        lift: "0 20px 50px -28px rgba(30, 27, 45, 0.35)",
                    },
                    fontFamily: {
                        headline: ["Manrope", "Inter", "sans-serif"],
                        body: ["Inter", "sans-serif"],
                        mono: ["Geist", "monospace"],
                    },
                },
            },
        };
    </script>
    <style>
        body {
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, rgba(235, 206, 216, 0.7), transparent 30%),
                radial-gradient(circle at top right, rgba(214, 224, 244, 0.72), transparent 28%),
                linear-gradient(180deg, #fffdfd 0%, #f8f2f5 48%, #f5eef2 100%);
            color: #211925;
            font-family: "Inter", sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

<body class="min-h-screen overflow-x-hidden">
    <div class="pointer-events-none fixed inset-0 bg-[radial-gradient(circle_at_top,_rgba(255,255,255,0.65),_transparent_45%)]"></div>

    <main class="relative z-10 flex min-h-screen flex-col items-center justify-center px-4 py-10 sm:px-6">
        <div class="mb-8 text-center">
            <div class="mb-3 flex items-center justify-center gap-3">
                <span class="material-symbols-outlined text-[42px] text-primary" style="font-variation-settings: 'FILL' 1;">terminal</span>
                <h1 class="font-headline text-3xl font-extrabold tracking-[-0.04em] text-primary sm:text-4xl">CareerEngine</h1>
            </div>
            <p class="mx-auto max-w-lg text-body-md text-on-surface-variant">
                The smart career portfolio platform for modern professionals.
            </p>
        </div>

        <x-auth.login-card />
    </main>

    <footer class="relative z-10 w-full px-4 py-6 text-center sm:px-6">
        <p class="font-mono text-xs uppercase tracking-[0.18em] text-on-surface-variant">
            © 2026 CareerEngine. Built for professional precision.
        </p>
    </footer>
</body>

</html>
