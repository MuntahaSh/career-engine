@if(session('success'))

<div class="rounded-2xl bg-green-100 px-5 py-4 text-green-700 shadow">
    {{ session('success') }}
</div>

@endif


@if(session('warning'))

<div class="rounded-2xl bg-yellow-100 px-5 py-4 text-yellow-700 shadow">
    {{ session('warning') }}
</div>

@endif

<main class="mx-auto w-full max-w-[1600px] space-y-8">
    <section
        class="flex flex-col gap-4 rounded-3xl border border-outline-variant bg-white/80 p-6 shadow-soft lg:flex-row lg:items-end lg:justify-between lg:p-8">
        <div class="space-y-2">
            <div
                class="inline-flex items-center gap-2 rounded-full border border-outline-variant bg-surface px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-secondary">
                Portfolio Work
            </div>
            <h2 class="font-headline text-display-2 text-on-surface">My Projects</h2>
            <p class="max-w-2xl text-body-lg text-on-surface-variant">Showcase and manage your latest technical
                achievements.</p>
        </div>
        <div class="flex flex-wrap gap-3">
            <button id="filter-toggle" type="button"
                class="inline-flex items-center gap-2 rounded-full border border-outline-variant bg-white px-5 py-3 text-sm font-semibold text-on-surface transition hover:bg-surface-strong">

                <span class="material-symbols-outlined text-[18px]">
                    filter_list
                </span>

                Filters
            </button>
            <a href="{{ route('projects.create') }}"
                class="inline-flex items-center gap-2 rounded-full bg-primary px-5 py-3 text-sm font-semibold text-on-primary shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift">
                <span class="material-symbols-outlined text-[18px]">add</span>
                Add New Project
            </a>
        </div>
    </section>
    <section id="filter-panel" class="hidden rounded-3xl border border-outline-variant bg-white/80 p-6 shadow-soft">

        <form method="GET" action="{{ route('projects.index') }}" class="grid grid-cols-1 gap-5 md:grid-cols-4">


            {{-- Search --}}
            <div>
                <label class="text-sm font-semibold">
                    Search
                </label>

                <input name="search" value="{{ request('search') }}" placeholder="Search projects..."
                    class="premium-input mt-2 h-12 w-full px-4">
            </div>



            {{-- Category --}}
            <div>

                <label class="text-sm font-semibold">
                    Category
                </label>


                <select name="category" class="premium-input mt-2 h-12 w-full px-4">

                    <option value="">
                        All Categories
                    </option>

                    <option value="Frontend" @selected(request('category')=='Frontend' )>
                        Frontend
                    </option>


                    <option value="Backend" @selected(request('category')=='Backend' )>
                        Backend
                    </option>


                    <option value="Fullstack" @selected(request('category')=='Fullstack' )>
                        Fullstack
                    </option>


                    <option value="Mobile" @selected(request('category')=='Mobile' )>
                        Mobile
                    </option>

                </select>

            </div>



            {{-- Visibility --}}
            <div>

                <label class="text-sm font-semibold">
                    Visibility
                </label>


                <select name="visibility" class="premium-input mt-2 h-12 w-full px-4">


                    <option value="">
                        All
                    </option>


                    <option value="public" @selected(request('visibility')=='public' )>
                        Public
                    </option>


                    <option value="private" @selected(request('visibility')=='private' )>
                        Private
                    </option>


                </select>


            </div>



            {{-- Submit --}}
            <div class="flex items-end">

                <button class="h-12 w-full rounded-full bg-primary text-on-primary font-semibold">

                    Apply Filters

                </button>

            </div>


        </form>

    </section>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
        @foreach($projects as $project)
        <article class="premium-card flex h-full flex-col overflow-hidden">
            <div class="group relative h-56 overflow-hidden">
                <img class="h-full w-full object-cover transition duration-500 group-hover:scale-105" src="{{ $project->thumbnail
        ? Storage::url($project->thumbnail)
        : 'https://via.placeholder.com/600x400' }}" alt="{{ $project->title }}">
                <div class="absolute inset-0 bg-[linear-gradient(180deg,rgba(18,14,24,0.05),rgba(18,14,24,0.7))]"></div>



                    <div class="absolute inset-x-0 bottom-0 flex items-end justify-between gap-3 p-5">

    <div class="flex gap-2">

        <span class="rounded-full bg-white/90 px-3 py-1 text-[0.7rem] font-semibold uppercase tracking-[0.18em] text-primary shadow-soft">
            {{ $project->category }}
        </span>


        @if($project->is_featured)

        <span class="flex items-center gap-1 rounded-full bg-primary px-3 py-1 text-xs text-white">

            <span class="material-symbols-outlined text-sm">
                auto_awesome
            </span>

            AI Featured

        </span>

        @endif


    </div>



                    <a href="{{ $project->demo_url ?? '#' }}"
                        class="inline-flex h-11 w-11 items-center justify-center rounded-full bg-white/90 text-primary shadow-soft transition hover:-translate-y-0.5 hover:bg-white"
                        aria-label="Open demo">
                        <span class="material-symbols-outlined">open_in_new</span>
                    </a>
                </div>
            </div>

            <div class="flex flex-1 flex-col gap-5 p-6">
                <div class="space-y-2">
                    <h3 class="font-headline text-headline-3 text-on-surface">{{ $project->title }}</h3>
                    <p class="line-clamp-2 text-body-sm text-on-surface-variant">{{ $project->summary }}</p>
                </div>

                <div class="flex flex-wrap gap-2">
                    @foreach(explode(',', $project->tech_stack ?? '') as $tech)
                    @if($tech)
                    <span class="premium-pill px-3 py-1 text-xs font-medium text-on-surface-variant">
                        {{ trim($tech) }}
                    </span>
                    @endif
                    @endforeach
                </div>

                <div
                    class="mt-auto flex flex-wrap items-center justify-between gap-4 border-t border-outline-variant pt-4">
                    <div class="flex items-center gap-2">

                        <a href="{{ route('projects.edit', $project->id) }}"
                            class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-outline-variant bg-white text-on-surface-variant transition hover:bg-surface-strong hover:text-primary"
                            aria-label="Edit project">
                            <span class="material-symbols-outlined text-[18px]">edit</span>
                        </a>
                        <form method="POST" action="{{ route('projects.destroy', $project->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-outline-variant bg-white text-on-surface-variant transition hover:bg-error-container hover:text-error"
                                aria-label="Delete project">
                                <span class="material-symbols-outlined text-[18px]">delete</span>
                            </button>
                        </form>
                    </div>

                    <span class="text-xs font-semibold uppercase tracking-[0.16em] text-on-surface-variant">
                        Updated {{ $project->updated_at->diffForHumans() }}
                    </span>
                </div>
            </div>
        </article>
        @endforeach

       <article class="premium-card flex min-h-[22rem] flex-col items-center justify-center gap-4 border-dashed p-6 text-center">

    <div class="flex h-16 w-16 items-center justify-center rounded-3xl bg-secondary-container text-primary shadow-soft">
        <span class="material-symbols-outlined text-3xl">
            auto_awesome
        </span>
    </div>


    <div class="space-y-2">

        <h3 class="font-headline text-headline-4 text-on-surface">
            Generate with AI
        </h3>


        <p class="max-w-sm text-body-sm text-on-surface-variant">
            Let AI analyze your projects and automatically select the best ones to feature on your portfolio.
        </p>

    </div>



    <form method="POST" action="{{ route('projects.ai.featured') }}">

        @csrf


        <button type="submit"
            class="inline-flex items-center justify-center gap-2 rounded-full border border-outline-variant bg-white px-5 py-3 text-sm font-semibold text-on-surface transition hover:bg-primary hover:text-on-primary hover:shadow-soft">


            <span class="material-symbols-outlined text-[18px]">
                psychology
            </span>


            Analyze My Projects


        </button>


    </form>


</article>
    </div>

    <footer class="rounded-3xl border border-outline-variant bg-white/75 p-5 shadow-soft">
        <div class="flex flex-col items-start justify-between gap-4 md:flex-row md:items-center">
            <div class="flex items-center gap-3 text-sm text-on-surface-variant">
                <span class="material-symbols-outlined text-[18px] text-secondary">info</span>
                <p>Projects marked as 'Featured' will appear on your public profile home page.</p>
            </div>
            <div class="flex flex-wrap gap-4 text-sm">
                <a class="font-medium text-on-surface-variant transition-colors hover:text-primary" href="#">Privacy
                    Policy</a>
                <a class="font-medium text-on-surface-variant transition-colors hover:text-primary" href="#">Help
                    Center</a>
            </div>
        </div>
    </footer>
</main>

<div class="fixed bottom-6 right-6 z-30 md:hidden">
    <button
        class="inline-flex h-14 w-14 items-center justify-center rounded-full bg-primary text-on-primary shadow-lift transition hover:-translate-y-0.5 active:scale-95">
        <span class="material-symbols-outlined" data-icon="add">add</span>
    </button>
</div>


<script>
    const filterButton =
document.getElementById('filter-toggle');


const filterPanel =
document.getElementById('filter-panel');


filterButton.addEventListener('click',()=>{

    filterPanel.classList.toggle('hidden');

});

</script>
