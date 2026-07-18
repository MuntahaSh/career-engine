<section class="premium-card relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_rgba(240,213,220,0.55),_transparent_38%),radial-gradient(circle_at_bottom_left,_rgba(220,227,246,0.55),_transparent_35%)]"></div>
    <div class="relative flex flex-col gap-6 p-6 sm:p-8 lg:flex-row lg:items-end lg:justify-between">
        <div class="max-w-3xl space-y-4">

            <div class="space-y-2">
                <h2 class="font-headline text-display-2 text-on-surface sm:text-[2.75rem]">Welcome , {{$user->name}}</h2>
                <p class="max-w-2xl text-body-lg text-on-surface-variant">
                    Your profile is <span class="font-semibold text-primary">{{ $profileCompletion }}%</span> complete and ready for a sharper presentation.
                </p>
            </div>
        </div>

        <div class="w-full max-w-md rounded-3xl border border-outline-variant bg-white/80 p-5 shadow-soft">
            <div class="mb-3 flex items-center justify-between text-xs font-semibold uppercase tracking-[0.16em] text-on-surface-variant">
                <span>Profile Strength</span>
                <span>Expert</span>
            </div>
            @php
                $completion = (int) $profileCompletion;
                $isHigh = $completion > 50;
            @endphp
            <div class="h-2 overflow-hidden rounded-full bg-surface-strong">
                {{--
                  If completion > 50 => bar sits higher (items-start)
                  else => bar sits lower (items-end)
                --}}
                <div
                    class="flex h-2 items-center {{ $isHigh ? 'items-start' : 'items-end' }} overflow-hidden rounded-full"
                >
                    <div
                        class="rounded-full bg-[linear-gradient(90deg,#1e1b2d,#a77378)] transition-all duration-1000 ease-out"
                        style="width: {{ max(0, min(100, $completion)) }}%; height: {{ $isHigh ? '0.75rem' : '0.25rem' }};"
                    ></div>
                </div>
            </div>
            <div class="mt-3 flex items-center justify-between text-sm text-on-surface-variant">
                <span>Completion</span>
                <span class="font-semibold text-primary">{{ $profileCompletion }}%</span>
            </div>
        </div>
    </div>
</section>
