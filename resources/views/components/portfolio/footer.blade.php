<footer class="w-full border-t border-outline-variant bg-white py-20">
<div class="max-w-max-content-width mx-auto px-lg md:px-xl flex flex-col md:flex-row justify-between items-center gap-10">
<div class="font-headline-h3 text-primary tracking-tight">AlexRivera</div>
<p class="text-on-surface-variant font-medium text-sm">© 2024 Alex Rivera. Engineered with Precision.</p>
<div class="flex gap-10">
<a class="font-bold text-[11px] uppercase tracking-[0.2em] text-on-surface-variant hover:text-primary transition-colors" href="#">GITHUB</a>
<a class="font-bold text-[11px] uppercase tracking-[0.2em] text-on-surface-variant hover:text-primary transition-colors" href="#">LINKEDIN</a>
<a class="font-bold text-[11px] uppercase tracking-[0.2em] text-on-surface-variant hover:text-primary transition-colors" href="#">X</a>
</div>
</div>
</footer>

<script>
    // Smooth scroll for nav links with offset for fixed header
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            const element = document.querySelector(targetId);
            if (element) {
                const navHeight = 80;
                const elementPosition = element.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - navHeight - 32;
                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
</script>
