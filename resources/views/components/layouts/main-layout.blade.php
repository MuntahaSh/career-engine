<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="color-scheme" content="light">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CareerEngine | Smart Portfolio Dashboard</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Geist:wght@400;500;600;700&family=Inter:wght@400;500;600;700;800&family=Manrope:wght@500;600;700;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet">
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        background: "#f7f1f3",
                        surface: "#fffdfd",
                        "surface-soft": "#fdf7f8",
                        "surface-strong": "#f5ecef",
                        primary: "#1e1b2d",
                        "primary-soft": "#4e466b",
                        "primary-container": "#241b35",
                        "secondary": "#7f6d8b",
                        "secondary-container": "#efe3ee",
                        "tertiary": "#a77378",
                        "tertiary-container": "#f6e7e8",
                        outline: "#a59aa4",
                        "outline-variant": "#e2d9de",
                        "on-surface": "#211925",
                        "on-surface-variant": "#685c68",
                        "on-primary": "#ffffff",
                        "on-primary-container": "#f7edf8",
                        "on-secondary-container": "#4f4057",
                        "on-tertiary-container": "#674247",
                        error: "#be4f61",
                        "error-container": "#fce5e8",
                    },
                    borderRadius: {
                        lg: "1rem",
                        xl: "1.25rem",
                        "2xl": "1.5rem",
                        "3xl": "1.875rem",
                        full: "9999px",
                    },
                    spacing: {
                        xs: "0.25rem",
                        sm: "0.5rem",
                        md: "1rem",
                        lg: "1.5rem",
                        xl: "2rem",
                        "2xl": "2.75rem",
                        "3xl": "4rem",
                        "sidebar-width": "18.75rem",
                        "max-content-width": "80rem",
                    },
                    boxShadow: {
                        soft: "0 10px 30px -20px rgba(30, 27, 45, 0.4)",
                        lift: "0 20px 50px -28px rgba(30, 27, 45, 0.35)",
                        glow: "0 0 0 1px rgba(255,255,255,0.65), 0 24px 60px -30px rgba(109, 92, 117, 0.42)",
                    },
                    fontFamily: {
                        headline: ["Manrope", "Inter", "sans-serif"],
                        body: ["Inter", "sans-serif"],
                        mono: ["Geist", "monospace"],
                    },
                    fontSize: {
                        "display-1": ["3rem", { lineHeight: "1.05", letterSpacing: "-0.04em", fontWeight: "800" }],
                        "display-2": ["2.25rem", { lineHeight: "1.08", letterSpacing: "-0.035em", fontWeight: "800" }],
                        "headline-3": ["1.5rem", { lineHeight: "1.2", letterSpacing: "-0.02em", fontWeight: "700" }],
                        "headline-4": ["1.125rem", { lineHeight: "1.35", letterSpacing: "-0.01em", fontWeight: "700" }],
                        "body-lg": ["1.0625rem", { lineHeight: "1.7", fontWeight: "400" }],
                        "body-md": ["0.95rem", { lineHeight: "1.65", fontWeight: "400" }],
                        "body-sm": ["0.875rem", { lineHeight: "1.55", fontWeight: "400" }],
                        "label-mono": ["0.72rem", { lineHeight: "1.25", letterSpacing: "0.12em", fontWeight: "600" }],
                    },
                },
            },
        }
    </script>
    <style>
        :root {
            --sidebar-width: 18.75rem;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            min-height: 100vh;
            overflow-x: hidden;
            background: linear-gradient(180deg, #fdfcfdf5 0%, #faf7f9 50%, #f8f4f6 100%);
            color: #211925;
            font-family: "Inter", sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .premium-card {
            border: 1px solid rgba(226, 217, 222, 0.9);
            border-radius: 1.5rem;
            background: rgba(255, 253, 253, 0.82);
            backdrop-filter: blur(18px);
            box-shadow: 0 18px 50px -28px rgba(33, 25, 37, 0.3);
            transition: transform 220ms ease, box-shadow 220ms ease, border-color 220ms ease;
        }

        .premium-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 24px 70px -34px rgba(33, 25, 37, 0.38);
            border-color: rgba(210, 194, 201, 0.95);
        }

        .premium-surface {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.92), rgba(251, 246, 248, 0.92));
            border: 1px solid rgba(226, 217, 222, 0.9);
            box-shadow: 0 18px 50px -34px rgba(33, 25, 37, 0.26);
        }

        .premium-input {
            width: 100%;
            border-radius: 1rem;
            border: 1px solid rgba(226, 217, 222, 1);
            background: rgba(255, 255, 255, 0.9);
            color: #211925;
            transition: border-color 220ms ease, box-shadow 220ms ease, transform 220ms ease, background-color 220ms ease;
        }

        .premium-input:focus {
            border-color: rgba(127, 109, 139, 0.75);
            box-shadow: 0 0 0 4px rgba(127, 109, 139, 0.14);
            outline: none;
        }

        .premium-pill {
            border-radius: 9999px;
            border: 1px solid rgba(226, 217, 222, 1);
            background: rgba(255, 255, 255, 0.8);
            transition: transform 220ms ease, background-color 220ms ease, border-color 220ms ease, color 220ms ease;
        }

        .premium-pill:hover {
            transform: translateY(-1px);
            border-color: rgba(210, 194, 201, 1);
        }

        .soft-grid {
            background-image:
                linear-gradient(rgba(162, 145, 160, 0.08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(162, 145, 160, 0.08) 1px, transparent 1px);
            background-size: 42px 42px;
        }
    </style>
</head>

<body>
    <div class="pointer-events-none fixed inset-0 soft-grid opacity-20"></div>
    <div class="pointer-events-none fixed inset-0 bg-[radial-gradient(circle_at_top,_rgba(255,255,255,0.45),_transparent_45%)]"></div>

    <x-layouts.sidebar />

    <div class="relative min-h-screen lg:pl-[var(--sidebar-width)]">
        <x-layouts.header />

        <main class="relative mx-auto w-full max-w-[1600px] px-4 pb-10 pt-6 sm:px-6 lg:px-8 lg:pt-8">
            <div class="space-y-6">
                {{ $slot }}
            </div>
        </main>
    </div>

    <div id="sidebar-overlay"
        class="fixed inset-0 z-40 hidden bg-slate-950/35 opacity-0 backdrop-blur-[2px] transition-opacity duration-300 lg:hidden"
        aria-hidden="true"></div>

    <script>
        (() => {
            const sidebar = document.querySelector('[data-sidebar]');
            const overlay = document.getElementById('sidebar-overlay');
            const toggles = document.querySelectorAll('[data-sidebar-toggle]');
            const closeTargets = document.querySelectorAll('[data-sidebar-close]');
            if (!sidebar || !overlay || !toggles.length) {
                return;
            }

            const openSidebar = () => {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
                overlay.classList.remove('hidden');
                requestAnimationFrame(() => overlay.classList.add('opacity-100'));
                document.body.classList.add('overflow-hidden');
                toggles.forEach((toggle) => toggle.setAttribute('aria-expanded', 'true'));
            };

            const closeSidebar = () => {
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('translate-x-0');
                overlay.classList.remove('opacity-100');
                document.body.classList.remove('overflow-hidden');
                toggles.forEach((toggle) => toggle.setAttribute('aria-expanded', 'false'));

                window.setTimeout(() => {
                    if (sidebar.classList.contains('-translate-x-full')) {
                        overlay.classList.add('hidden');
                    }
                }, 220);
            };

            toggles.forEach((toggle) => {
                toggle.addEventListener('click', () => {
                    const isOpen = !sidebar.classList.contains('-translate-x-full');
                    if (isOpen) {
                        closeSidebar();
                        return;
                    }
                    openSidebar();
                });
            });

            closeTargets.forEach((target) => target.addEventListener('click', closeSidebar));
            overlay.addEventListener('click', closeSidebar);

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') {
                    closeSidebar();
                }
            });

            window.addEventListener('resize', () => {
                if (window.innerWidth >= 1024) {
                    sidebar.classList.remove('-translate-x-full');
                    sidebar.classList.add('translate-x-0');
                    overlay.classList.add('hidden');
                    overlay.classList.remove('opacity-100');
                    document.body.classList.remove('overflow-hidden');
                    toggles.forEach((toggle) => toggle.setAttribute('aria-expanded', 'false'));
                }
            });
        })();
    </script>
</body>

</html>
