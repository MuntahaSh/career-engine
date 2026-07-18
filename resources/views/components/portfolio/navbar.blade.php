<!DOCTYPE html>

<html class="scroll-smooth" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Alex Rivera | Senior Full Stack Developer</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;family=Geist:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                "primary-fixed": "#dae2fd",
                "tertiary-fixed-dim": "#dec29a",
                "tertiary": "#000000",
                "surface-variant": "#e4e2e4",
                "on-error-container": "#93000a",
                "surface-bright": "#fcf8fa",
                "surface-container-low": "#f6f3f5",
                "on-primary": "#ffffff",
                "surface-container": "#f0edef",
                "tertiary-container": "#271901",
                "on-error": "#ffffff",
                "surface-dim": "#dcd9db",
                "outline-variant": "#c6c6cd",
                "on-surface-variant": "#45464d",
                "surface-tint": "#565e74",
                "surface": "#fcf8fa",
                "secondary-container": "#d5e3fd",
                "on-tertiary": "#ffffff",
                "secondary-fixed": "#d5e3fd",
                "on-surface": "#1b1b1d",
                "background": "#fcf8fa",
                "tertiary-fixed": "#fcdeb5",
                "inverse-primary": "#bec6e0",
                "error": "#ba1a1a",
                "surface-container-highest": "#e4e2e4",
                "surface-container-high": "#eae7e9",
                "on-secondary-container": "#57657b",
                "primary-fixed-dim": "#bec6e0",
                "on-primary-fixed": "#131b2e",
                "secondary": "#515f74",
                "primary": "#0f172a",
                "on-tertiary-fixed": "#271901",
                "on-tertiary-fixed-variant": "#574425",
                "inverse-surface": "#303032",
                "surface-container-lowest": "#ffffff",
                "outline": "#76777d",
                "on-primary-container": "#7c839b",
                "on-background": "#1b1b1d",
                "inverse-on-surface": "#f3f0f2",
                "primary-container": "#131b2e",
                "secondary-fixed-dim": "#b9c7e0",
                "on-secondary-fixed": "#0d1c2f",
                "on-secondary": "#ffffff",
                "on-tertiary-container": "#98805d",
                "on-secondary-fixed-variant": "#3a485c",
                "on-primary-fixed-variant": "#3f465c",
                "error-container": "#ffdad6"
            },
            "borderRadius": {
                "DEFAULT": "0.25rem",
                "lg": "0.5rem",
                "xl": "0.75rem",
                "2xl": "1rem",
                "3xl": "1.5rem",
                "full": "9999px"
            },
            "spacing": {
                "sidebar-width": "280px",
                "sm": "8px",
                "base": "4px",
                "3xl": "64px",
                "2xl": "48px",
                "xs": "4px",
                "xl": "32px",
                "max-content-width": "1200px",
                "md": "16px",
                "lg": "24px",
                "section-gap": "128px",
                "element-gap": "32px"
            },
            "fontFamily": {
                "body-sm": ["Inter"],
                "headline-h1": ["Inter"],
                "body-lg": ["Inter"],
                "label-mono": ["Geist"],
                "headline-h4": ["Inter"],
                "body-md": ["Inter"],
                "headline-h1-mobile": ["Inter"],
                "headline-h3": ["Inter"],
                "headline-h2": ["Inter"]
            },
            "fontSize": {
                "body-sm": ["14px", {"lineHeight": "1.5", "fontWeight": "400"}],
                "headline-h1": ["40px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                "label-mono": ["12px", {"lineHeight": "1.2", "letterSpacing": "0.05em", "fontWeight": "500"}],
                "headline-h4": ["20px", {"lineHeight": "1.4", "fontWeight": "600"}],
                "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
                "headline-h1-mobile": ["32px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                "headline-h3": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}],
                "headline-h2": ["30px", {"lineHeight": "1.3", "letterSpacing": "-0.01em", "fontWeight": "600"}]
            }
          },
        },
      }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .executive-card {
            background: #ffffff;
            border-radius: 1.5rem;
            box-shadow: 0 1px 3px 0 rgba(15, 23, 42, 0.05), 0 1px 2px -1px rgba(15, 23, 42, 0.05);
            border: 1px solid #e4e2e4;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .executive-card:hover {
            border-color: #76777d;
            box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.08);
        }
        .nav-blur {
            backdrop-filter: blur(12px);
            background: rgba(252, 248, 250, 0.85);
        }
        .primary-gradient {
            background: linear-gradient(135deg, #0f172a 0%, #334155 100%);
        }
    </style>
</head>
<body class="bg-surface-bright text-on-surface font-body-md selection:bg-primary-fixed">
<!-- Navigation -->
<nav class="fixed top-0 left-0 w-full h-20 nav-blur border-b border-outline-variant/50 z-50">
<div class="max-w-max-content-width mx-auto h-full px-lg md:px-xl flex justify-between items-center">
<div class="font-headline-h3 text-primary tracking-tight">AlexRivera</div>
<div class="hidden md:flex gap-10 items-center">
<a class="text-on-surface-variant font-medium hover:text-primary transition-colors" href="#skills">Skills</a>
<a class="text-on-surface-variant font-medium hover:text-primary transition-colors" href="#experience">Experience</a>
<a class="text-on-surface-variant font-medium hover:text-primary transition-colors" href="#projects">Projects</a>
</div>
<button class="bg-primary text-on-primary px-7 py-2.5 rounded-full font-semibold hover:bg-primary-container transition-all">
            Hire Me
        </button>
</div>
</nav>
