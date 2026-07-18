<main class="mx-auto w-full max-w-[1600px] space-y-8">
    <section class="flex flex-col gap-4 rounded-3xl border border-outline-variant bg-white/80 p-6 shadow-soft lg:flex-row lg:items-end lg:justify-between lg:p-8">
        <div class="space-y-2">
            <div class="inline-flex items-center gap-2 rounded-full border border-outline-variant bg-surface px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-secondary">
                Professional History
            </div>
            <h2 class="font-headline text-display-2 text-on-surface">Work Experience</h2>
            <p class="max-w-3xl text-body-lg text-on-surface-variant">
                A chronological journey of my professional evolution, technical leadership, and contributions to global scale products.
            </p>
        </div>
        <a href="{{ route('experiences.create') }}"
            class="inline-flex items-center gap-2 rounded-full bg-primary px-5 py-3 text-sm font-semibold text-on-primary shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift">
            <span class="material-symbols-outlined text-[18px]">add</span>
            New Entry
        </a>
    </section>

    <div class="relative space-y-6 pl-4 sm:pl-8">
        <div class="absolute left-6 top-0 h-full w-px bg-gradient-to-b from-transparent via-outline-variant to-transparent sm:left-8"></div>

        <article class="relative pl-8 sm:pl-10">
            <div class="absolute left-[0.85rem] top-5 h-4 w-4 rounded-full border-4 border-background bg-primary shadow-soft sm:left-5"></div>
            <div class="premium-card p-6 sm:p-8">
                <div class="mb-6 flex flex-col gap-4 md:flex-row md:items-start md:justify-between">
                    <div class="flex items-center gap-4">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl border border-outline-variant bg-surface-strong text-primary shadow-soft">
                            <span class="material-symbols-outlined text-3xl" data-weight="fill">domain</span>
                        </div>
                        <div>
                            <h3 class="font-headline text-headline-3 text-on-surface">Senior Dev</h3>
                            <p class="text-sm font-semibold text-on-surface">TechCorp</p>
                        </div>
                    </div>
                    <div class="text-left md:text-right">
                        <span class="inline-flex rounded-full bg-secondary-container px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-on-secondary-container">Current</span>
                        <p class="mt-2 text-sm text-on-surface-variant">2021 - Present</p>
                    </div>
                </div>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined mt-0.5 text-primary text-lg">check_circle</span>
                        <span class="text-body-md text-on-surface-variant">Leading a cross-functional team of 12 engineers in building the next-generation AI-driven analytics dashboard for enterprise clients.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined mt-0.5 text-primary text-lg">check_circle</span>
                        <span class="text-body-md text-on-surface-variant">Optimized CI/CD pipelines resulting in a 40% reduction in deployment time and 99.9% system uptime across global regions.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined mt-0.5 text-primary text-lg">check_circle</span>
                        <span class="text-body-md text-on-surface-variant">Architected a micro-frontend architecture using React and Module Federation to improve development velocity by 30%.</span>
                    </li>
                </ul>
                <div class="mt-5 flex flex-wrap gap-2">
                    <span class="premium-pill px-3 py-1 text-xs font-medium text-on-surface-variant">React</span>
                    <span class="premium-pill px-3 py-1 text-xs font-medium text-on-surface-variant">Node.js</span>
                    <span class="premium-pill px-3 py-1 text-xs font-medium text-on-surface-variant">AWS</span>
                    <span class="premium-pill px-3 py-1 text-xs font-medium text-on-surface-variant">TypeScript</span>
                </div>
            </div>
        </article>

        <article class="relative pl-8 sm:pl-10">
            <div class="absolute left-[0.85rem] top-5 h-4 w-4 rounded-full border-4 border-background bg-outline-variant shadow-soft sm:left-5"></div>
            <div class="premium-card p-6 sm:p-8">
                <div class="mb-6 flex flex-col gap-4 md:flex-row md:items-start md:justify-between">
                    <div class="flex items-center gap-4">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl border border-outline-variant bg-surface-strong text-on-surface-variant shadow-soft">
                            <span class="material-symbols-outlined text-3xl">rocket_launch</span>
                        </div>
                        <div>
                            <h3 class="font-headline text-headline-3 text-on-surface">Junior Dev</h3>
                            <p class="text-sm font-semibold text-on-surface">StartupX</p>
                        </div>
                    </div>
                    <div class="text-left md:text-right">
                        <p class="mt-2 text-sm text-on-surface-variant">2019 - 2021</p>
                    </div>
                </div>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined mt-0.5 text-outline text-lg">check_circle</span>
                        <span class="text-body-md text-on-surface-variant">Built and maintained core features of the mobile-first e-commerce platform using Vue.js and Firebase.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined mt-0.5 text-outline text-lg">check_circle</span>
                        <span class="text-body-md text-on-surface-variant">Collaborated closely with the design team to implement a responsive, highly accessible UI components library.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined mt-0.5 text-outline text-lg">check_circle</span>
                        <span class="text-body-md text-on-surface-variant">Successfully integrated third-party payment gateways (Stripe, PayPal) resulting in a 20% increase in checkout conversion.</span>
                    </li>
                </ul>
                <div class="mt-5 flex flex-wrap gap-2">
                    <span class="premium-pill px-3 py-1 text-xs font-medium text-on-surface-variant">Vue.js</span>
                    <span class="premium-pill px-3 py-1 text-xs font-medium text-on-surface-variant">Firebase</span>
                    <span class="premium-pill px-3 py-1 text-xs font-medium text-on-surface-variant">Tailwind CSS</span>
                </div>
            </div>
        </article>

        <article class="relative pl-8 sm:pl-10">
            <div class="absolute left-[0.85rem] top-5 h-4 w-4 rounded-full border-4 border-background bg-outline-variant shadow-soft sm:left-5"></div>
            <div class="premium-card p-6 sm:p-8">
                <div class="mb-6 flex flex-col gap-4 md:flex-row md:items-start md:justify-between">
                    <div class="flex items-center gap-4">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl border border-outline-variant bg-surface-strong text-on-surface-variant shadow-soft">
                            <span class="material-symbols-outlined text-3xl">corporate_fare</span>
                        </div>
                        <div>
                            <h3 class="font-headline text-headline-3 text-on-surface">Internship</h3>
                            <p class="text-sm font-semibold text-on-surface">GlobalSoft</p>
                        </div>
                    </div>
                    <div class="text-left md:text-right">
                        <p class="mt-2 text-sm text-on-surface-variant">2018</p>
                    </div>
                </div>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined mt-0.5 text-outline text-lg">check_circle</span>
                        <span class="text-body-md text-on-surface-variant">Supported the legacy migration of internal ERP systems to a modern web-based interface.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined mt-0.5 text-outline text-lg">check_circle</span>
                        <span class="text-body-md text-on-surface-variant">Drafted comprehensive technical documentation for 50+ internal API endpoints.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined mt-0.5 text-outline text-lg">check_circle</span>
                        <span class="text-body-md text-on-surface-variant">Fixed 200+ bug tickets during the QA phase of a major retail application launch.</span>
                    </li>
                </ul>
                <div class="mt-5 flex flex-wrap gap-2">
                    <span class="premium-pill px-3 py-1 text-xs font-medium text-on-surface-variant">Python</span>
                    <span class="premium-pill px-3 py-1 text-xs font-medium text-on-surface-variant">SQL</span>
                    <span class="premium-pill px-3 py-1 text-xs font-medium text-on-surface-variant">Docker</span>
                </div>
            </div>
        </article>
    </div>
</main>
