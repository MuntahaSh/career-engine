<div class="mx-auto w-full max-w-[1600px] space-y-8">
    <section
        class="flex flex-col gap-4 rounded-3xl border border-outline-variant bg-white/80 p-6 shadow-soft lg:flex-row lg:items-center lg:justify-between lg:p-8">
        <div class="flex min-w-0 flex-wrap items-center gap-3">
            <nav class="flex items-center gap-2 text-sm text-on-surface-variant">
                <a class="transition-colors hover:text-primary" href="{{ route('certificates') }}">Certificates</a>
                <span class="material-symbols-outlined text-[16px] text-outline">chevron_right</span>
            </nav>
            <div class="min-w-0">
                <p class="text-sm font-medium text-on-surface-variant">Professional Certification</p>
                <h2 class="truncate font-headline text-display-2 text-on-surface"> {{ $certificate->name }}</h2>
            </div>
        </div>

        <a href="{{ asset('storage/'.$certificate->file_path) }}" download
            class="inline-flex items-center gap-2 rounded-full border border-outline-variant bg-white px-5 py-3 text-sm font-semibold">

            <span class="material-symbols-outlined text-[18px]">
                download
            </span>

            Download

        </a>
    </section>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">
        <div class="premium-card space-y-6 p-6 lg:col-span-8 lg:p-8">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div class="space-y-4">
                    <div>
                        <label
                            class="mb-2 block text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Issuing
                            Organization</label>
                        <div class="flex items-center gap-3">
                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-2xl bg-surface-strong border border-outline-variant">
                                <span class="material-symbols-outlined text-primary">corporate_fare</span>
                            </div>
                            <p class="font-headline text-headline-4 text-on-surface"> {{ $certificate->organization }}
                            </p>
                        </div>
                    </div>
                    <div>
                        <label
                            class="mb-2 block text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Issue
                            Date</label>
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-outline">calendar_today</span>
                            <p class="text-body-lg font-medium text-on-surface">

                                {{ $certificate->issue_date?->format('F d, Y') ?? 'Not provided' }}

                            </p>
                        </div>
                    </div>
                </div>
                <div class="space-y-4">
                    <div>
                        <label
                            class="mb-2 block text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Credential
                            ID</label>
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-outline">fingerprint</span>
                            <p
                                class="rounded-full border border-outline-variant bg-surface px-3 py-1 font-mono text-xs text-on-surface-variant">

                                {{ $certificate->credential_id ?? 'No credential ID' }}

                            </p>
                        </div>
                    </div>
                    <div>
                        <label
                            class="mb-2 block text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Verification
                            Link</label>
                        <a class="flex items-center gap-3 text-secondary transition hover:text-primary hover:underline"
                            href="{{ $certificate->credential_url }}" target="_blank">
                            <span class="material-symbols-outlined text-outline">link</span>
                            <p class="truncate text-sm">href="{{ $certificate->credential_url }}"</p>
                            <span class="material-symbols-outlined text-[16px]">open_in_new</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="border-t border-outline-variant pt-6">
                <label
                    class="mb-3 block text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Description</label>
                <p class="max-w-4xl text-body-lg leading-8 text-on-surface-variant">
                    {{ $certificate->description ?? 'No description available.' }}

                </p>
            </div>
        </div>

        <aside class="space-y-6 lg:col-span-4">
            <div class="premium-card p-6">
                <h3 class="mb-4 flex items-center gap-2 font-headline text-headline-4 text-on-surface">
                    <span class="material-symbols-outlined">psychology</span>
                    Key Skills
                </h3>
                <div class="flex flex-wrap gap-2">
                    <span class="premium-pill px-3 py-1 text-sm text-on-surface-variant">Cloud Architecture</span>
                    <span class="premium-pill px-3 py-1 text-sm text-on-surface-variant">Microservices</span>
                    <span class="premium-pill px-3 py-1 text-sm text-on-surface-variant">Docker &amp; K8s</span>
                    <span class="premium-pill px-3 py-1 text-sm text-on-surface-variant">Serverless (Lambda)</span>
                    <span class="premium-pill px-3 py-1 text-sm text-on-surface-variant">IAM Security</span>
                    <span class="premium-pill px-3 py-1 text-sm text-on-surface-variant">Terraform</span>
                </div>
            </div>

            <div
                class="premium-card overflow-hidden bg-[linear-gradient(135deg,#211925_0%,#4f3b5f_100%)] p-6 text-white">
                <div class="space-y-4">
                    <div class="flex items-start justify-between">
                        <span class="material-symbols-outlined text-[40px] text-white">verified</span>
                        <div class="text-right">
                            <p class="text-[10px] uppercase tracking-[0.18em] text-white/70">Authenticated by</p>
                            <p class="text-sm font-semibold">AWS Global Certs</p>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-headline text-headline-4">Secure Credential</h4>
                        <p class="mt-2 text-sm leading-6 text-white/78">This certificate is digitally signed and
                            verified on the blockchain.</p>
                    </div>
                    <button
                        class="inline-flex h-11 w-full items-center justify-center rounded-full border border-white/15 bg-white/10 px-4 text-sm font-semibold text-white transition hover:bg-white/16">
                        View Verification History
                    </button>
                </div>
            </div>
        </aside>
    </div>
</div>
