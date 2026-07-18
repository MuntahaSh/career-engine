<section class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
    <article class="premium-card group p-5 sm:p-6">
        <div class="mb-4 flex items-start justify-between gap-3">
            <span class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-secondary-container text-primary shadow-soft">
                <span class="material-symbols-outlined" data-icon="code">code</span>
            </span>
            <span class="rounded-full border border-outline-variant bg-white/80 px-3 py-1 text-xs font-semibold uppercase tracking-[0.16em] text-on-surface-variant">+{{ $stats['projects_this_month'] }} this month</span>
        </div>
        <h3 class="font-headline text-display-2 leading-none text-on-surface">    {{ $stats['active_projects'] }}</h3>
        <p class="mt-2 text-sm text-on-surface-variant">Active Projects</p>
    </article>

    <article class="premium-card group p-5 sm:p-6">
        <div class="mb-4 flex items-start justify-between gap-3">
            <span class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-tertiary-container text-primary shadow-soft">
                <span class="material-symbols-outlined" data-icon="workspace_premium">workspace_premium</span>
            </span>
            <span class="rounded-full border border-outline-variant bg-white/80 px-3 py-1 text-xs font-semibold uppercase tracking-[0.16em] text-on-surface-variant">{{ $stats['certificates_pending'] }} pending</span>
        </div>
        <h3 class="font-headline text-display-2 leading-none text-on-surface">{{ $stats['certificates'] }}</h3>
        <p class="mt-2 text-sm text-on-surface-variant">Certificates</p>
    </article>

    <article class="premium-card group p-5 sm:p-6">
        <div class="mb-4 flex items-start justify-between gap-3">
            <span class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-[#f4e8f1] text-primary shadow-soft">
                <span class="material-symbols-outlined" data-icon="psychology">psychology</span>
            </span>
            <span class="rounded-full border border-outline-variant bg-white/80 px-3 py-1 text-xs font-semibold uppercase tracking-[0.16em] text-on-surface-variant">Top 5%</span>
        </div>
        <h3 class="font-headline text-display-2 leading-none text-on-surface">{{ $stats['skills'] }}</h3>
        <p class="mt-2 text-sm text-on-surface-variant">Verified Skills</p>
    </article>

    <article class="premium-card group p-5 sm:p-6">
        <div class="mb-4 flex items-start justify-between gap-3">
            <span class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-[#efe8fb] text-primary shadow-soft">
                <span class="material-symbols-outlined" data-icon="work">work</span>
            </span>
            <span class="rounded-full border border-outline-variant bg-white/80 px-3 py-1 text-xs font-semibold uppercase tracking-[0.16em] text-on-surface-variant">Senior Lvl</span>
        </div>
        <h3 class="font-headline text-display-2 leading-none text-on-surface">{{$user->years_experience}}</h3>
        <p class="mt-2 text-sm text-on-surface-variant">Years Exp.</p>
    </article>
</section>
