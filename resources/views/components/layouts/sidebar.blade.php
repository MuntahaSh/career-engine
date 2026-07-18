<aside id="sidebar" data-sidebar
    class="fixed inset-y-0 left-0 z-50 flex w-[var(--sidebar-width)] -translate-x-full flex-col border-r border-outline-variant bg-[linear-gradient(180deg,rgba(255,255,255,0.92),rgba(246,238,243,0.75))] backdrop-blur-2xl shadow-[24px_0_60px_-34px_rgba(33,25,37,0.4)] transition-transform duration-300 ease-out lg:translate-x-0">
    <div class="flex h-full flex-col px-4 py-5 sm:px-5">
          <div class="mb-xl px-sm">
<h1 class="text-headline-h3 font-headline-h3 font-bold text-on-surface dark:text-inverse-on-surface">Career Engine</h1>
<p class="text-body-sm font-body-sm text-on-surface-variant">Smart Portfolio</p>
</div>




        <div class="mb-5 rounded-3xl border border-outline-variant bg-white/80 p-4 shadow-soft">
            <div class="flex items-center gap-3">
                <div class="h-12 w-12 overflow-hidden rounded-2xl ring-1 ring-white shadow-soft">
                    <img class="h-full w-full object-cover"
                        data-alt="A professional studio headshot of a young tech professional with a friendly smile, clean-cut appearance, set against a soft, minimalist neutral grey background. The lighting is soft and flattering, emphasizing a modern corporate aesthetic that aligns with the Smart Career Portfolio Platform's high-end professional identity."
                        src={{ $user->profile_photo_url }} alt="Profile Photo">
                </div>
                <div class="min-w-0">
                    <p class="truncate font-semibold text-on-surface"> {{ $user->name }} </p>
                    <p class="truncate text-sm text-on-surface-variant">{{$user->target_role}}</p>
                </div>
            </div>
        </div>

        <nav class="flex-1 space-y-2 overflow-y-auto pr-1">
            <a href="{{ route('dashboard') }}"
                class="group flex items-center gap-3 rounded-full px-4 py-3 text-sm font-medium transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/20 {{ request()->routeIs('dashboard') ? 'bg-primary text-on-primary shadow-soft' : 'text-on-surface-variant hover:bg-surface-strong hover:text-on-surface hover:translate-x-1' }}">
                <span class="material-symbols-outlined text-[20px]">dashboard</span>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('profile') }}"
                class="group flex items-center gap-3 rounded-full px-4 py-3 text-sm font-medium transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/20 {{ request()->routeIs('profile') ? 'bg-primary text-on-primary shadow-soft' : 'text-on-surface-variant hover:bg-surface-strong hover:text-on-surface hover:translate-x-1' }}">
                <span class="material-symbols-outlined text-[20px]">person</span>
                <span>Profile</span>
            </a>

            <a href="{{ route('projects.index') }}"
                class="group flex items-center gap-3 rounded-full px-4 py-3 text-sm font-medium transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/20 {{ request()->routeIs('projects.index', 'projects.create', 'projects.edit') ? 'bg-primary text-on-primary shadow-soft' : 'text-on-surface-variant hover:bg-surface-strong hover:text-on-surface hover:translate-x-1' }}">
                <span class="material-symbols-outlined text-[20px]">code</span>
                <span>Projects</span>
            </a>

            <a href="{{ route('certificates') }}"
                class="group flex items-center gap-3 rounded-full px-4 py-3 text-sm font-medium transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/20 {{ request()->routeIs('certificates', 'certificates.create', 'certificates.edit', 'certificates.show') ? 'bg-primary text-on-primary shadow-soft' : 'text-on-surface-variant hover:bg-surface-strong hover:text-on-surface hover:translate-x-1' }}">
                <span class="material-symbols-outlined text-[20px]">workspace_premium</span>
                <span>Certificates</span>
            </a>

            <a href="{{ route('skills') }}"
                class="group flex items-center gap-3 rounded-full px-4 py-3 text-sm font-medium transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/20 {{ request()->routeIs('skills') ? 'bg-primary text-on-primary shadow-soft' : 'text-on-surface-variant hover:bg-surface-strong hover:text-on-surface hover:translate-x-1' }}">
                <span class="material-symbols-outlined text-[20px]">psychology</span>
                <span>Skills</span>
            </a>

            <a href="{{ route('experiences') }}"
                class="group flex items-center gap-3 rounded-full px-4 py-3 text-sm font-medium transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/20 {{ request()->routeIs('experiences') ? 'bg-primary text-on-primary shadow-soft' : 'text-on-surface-variant hover:bg-surface-strong hover:text-on-surface hover:translate-x-1' }}">
                <span class="material-symbols-outlined text-[20px]">work</span>
                <span>Experience</span>
            </a>
        </nav>


    </div>
</aside>
