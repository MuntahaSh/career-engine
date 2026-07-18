<main class="mx-auto w-full max-w-[1600px] space-y-8">
    <section
        class="flex flex-col gap-4 rounded-3xl border border-outline-variant bg-white/80 p-6 shadow-soft lg:flex-row lg:items-end lg:justify-between lg:p-8">
        <div class="space-y-2">
            <div
                class="inline-flex items-center gap-2 rounded-full border border-outline-variant bg-surface px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-secondary">
                Professional Credentials
            </div>
            <h2 class="font-headline text-display-2 text-on-surface">Professional Certifications</h2>
            <p class="max-w-3xl text-body-lg text-on-surface-variant">
                A comprehensive record of my verified professional credentials and industry certifications.
            </p>
        </div>

        <a href="{{ route('certificates.create') }}"
            class="inline-flex items-center gap-2 rounded-full bg-primary px-5 py-3 text-sm font-semibold text-on-primary shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift">
            <span class="material-symbols-outlined text-[18px]">add</span>
            Add Certificate
        </a>
    </section>

    <section class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-4">

        @forelse($certificates as $certificate)

        <article class="premium-card group flex flex-col p-5">

            <div class="absolute right-5 top-5 z-10 flex gap-2 opacity-0 transition-opacity group-hover:opacity-100">

                <a href="{{ route('certificates.show', $certificate) }}">
                    <span class="material-symbols-outlined text-[18px]">visibility</span>
                </a>

                <a href="{{ route('certificates.edit', $certificate) }}">
                    <span class="material-symbols-outlined text-[18px]">edit</span>
                </a>

                <form action="{{ route('certificates.destroy', $certificate) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        <span class="material-symbols-outlined text-[18px]">delete</span>
                    </button>
                </form>

            </div>

            <div
                class="mb-4 flex h-12 w-12 items-center justify-center rounded-2xl bg-secondary-container text-primary shadow-soft">
                <span class="material-symbols-outlined">workspace_premium</span>
            </div>

            <h5>{{ $certificate->name }}</h5>

            <p>{{ $certificate->organization }}</p>

            <p class="text-sm text-on-surface-variant">
                Issued {{ optional($certificate->issue_date)->format('M Y') }}
            </p>

        </article>

        @empty

        <p>No certificates found.</p>

        @endforelse

    </section>
</main>
