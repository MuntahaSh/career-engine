<section class="premium-card p-5 sm:p-6">
    <div class="mb-6 flex items-center justify-between gap-3">
        <div>
            <h3 class="font-headline text-headline-3 text-on-surface">Recent Activity</h3>
            <p class="text-sm text-on-surface-variant">Latest updates from your portfolio</p>
        </div>
        <button
            class="rounded-full border border-outline-variant bg-white px-4 py-2 text-sm font-semibold text-on-surface-variant transition hover:bg-surface-strong hover:text-on-surface">
            View all
        </button>
    </div>

    <div class="space-y-4">

        @foreach($activities as $activity)

        <div class="flex gap-4 rounded-2xl border border-outline-variant bg-white/75 p-4">


            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-secondary-container text-primary">

                <span class="material-symbols-outlined text-[20px]">

                    {{ $activity->icon }}

                </span>

            </div>


            <div>

                <p class="text-body-md text-on-surface">

                    <span class="font-semibold">

                        {{ $activity->title }}

                    </span>

                </p>


                <p class="text-body-sm text-on-surface-variant">

                    {{ $activity->description }}

                </p>


                <p class="text-xs text-on-surface-variant">

                    {{ $activity->created_at->diffForHumans() }}

                </p>


            </div>


        </div>

        @endforeach

    </div>
</section>
