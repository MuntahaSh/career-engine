@foreach($projects as $project)

<article class="premium-card flex flex-col overflow-hidden">

    <div class="relative h-52 overflow-hidden">

        @if($project->thumbnail)

            <img
                class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                src="{{ Storage::url($project->thumbnail) }}"
                alt="{{ $project->title }}"
            >

        @else

            <div class="h-full w-full bg-secondary-container flex items-center justify-center">
                <span class="material-symbols-outlined text-5xl text-primary">
                    image
                </span>
            </div>

        @endif


        <div class="absolute inset-0 bg-[linear-gradient(180deg,rgba(16,12,22,0.08),rgba(16,12,22,0.68))]"></div>


        <div class="absolute bottom-4 left-4">

            <span class="rounded-full bg-white/90 px-3 py-1 text-[0.7rem] font-semibold uppercase tracking-[0.18em] text-primary shadow-soft">

                Featured

            </span>

        </div>

    </div>



    <div class="flex flex-1 flex-col gap-4 p-5 sm:p-6">

        <div class="space-y-2">

            <h4 class="font-headline text-headline-3 text-on-surface">

                {{ $project->title }}

            </h4>


            <p class="text-body-sm text-on-surface-variant line-clamp-3">

                {{ $project->summary }}

            </p>

        </div>



        <div class="flex items-center gap-2">

            <span class="text-sm text-on-surface-variant">
                AI Score:
            </span>

            <span class="font-bold text-primary">
                {{ $project->ai_score ?? 'N/A' }}
            </span>

        </div>



        <div class="mt-auto flex flex-wrap gap-2">

            @foreach(explode(',', $project->tech_stack ?? '') as $tech)

                <span class="premium-pill px-3 py-1 text-xs font-medium text-on-surface-variant">

                    {{ trim($tech) }}

                </span>

            @endforeach

        </div>

    </div>


</article>


@endforeach
