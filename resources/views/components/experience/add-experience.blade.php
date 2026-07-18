<main class="mx-auto w-full max-w-[1600px] space-y-8">
    <div class="rounded-3xl border border-outline-variant bg-white/80 p-6 shadow-soft lg:p-8">
        <nav class="mb-3 flex items-center gap-2 text-sm text-on-surface-variant">
            <span class="font-medium">Experience</span>
            <span class="material-symbols-outlined text-[16px]">chevron_right</span>
            <span class="font-semibold text-primary">Add New Role</span>
        </nav>
        <h1 class="font-headline text-display-2 text-on-surface">Add Professional Experience</h1>
        <p class="mt-2 max-w-3xl text-body-lg text-on-surface-variant">Document your career milestones and achievements with AI-powered precision.</p>
    </div>

    <div class="grid grid-cols-1 gap-6 xl:grid-cols-12">
        <div class="space-y-6 xl:col-span-8 xl:mx-auto xl:w-full">
            <section class="premium-card space-y-6 p-6 sm:p-8">
                <h3 class="border-b border-outline-variant pb-4 font-headline text-headline-4 text-on-surface">Role Details</h3>
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                    <div class="space-y-2">
                        <label class="text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Job Title</label>
                        <input class="premium-input h-12 px-4 text-sm" placeholder="e.g. Senior Software Engineer" type="text" />
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Company Name</label>
                        <input class="premium-input h-12 px-4 text-sm" placeholder="e.g. Acme Corp" type="text" />
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                    <div class="space-y-2">
                        <label class="text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Employment Type</label>
                        <select class="premium-input h-12 px-4 text-sm bg-white">
                            <option>Full-time</option>
                            <option>Part-time</option>
                            <option>Contract</option>
                            <option>Freelance</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Location</label>
                        <div class="relative">
                            <span class="material-symbols-outlined pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-on-surface-variant">location_on</span>
                            <input class="premium-input h-12 px-4 pr-12 text-sm" placeholder="City, State / Remote" type="text" />
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                    <div class="space-y-2">
                        <label class="text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Start Date</label>
                        <input class="premium-input h-12 px-4 text-sm" type="date" />
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">End Date</label>
                        <input class="premium-input h-12 px-4 text-sm disabled:bg-surface-strong" id="endDateInput" type="date" />
                        <div class="mt-2 flex items-center gap-2">
                            <input class="h-4 w-4 rounded border-outline-variant text-primary focus:ring-primary"
                                id="currentlyWorking"
                                onchange="document.getElementById('endDateInput').disabled = this.checked"
                                type="checkbox" />
                            <label class="text-sm text-on-surface-variant" for="currentlyWorking">I currently work here</label>
                        </div>
                    </div>
                </div>
                <div class="space-y-2 pt-2" style="transition: transform 0.2s ease-out;">
                    <div class="mb-2 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <label class="text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Responsibilities &amp; Impact</label>
                        <div class="flex flex-wrap items-center gap-2">
                            <div class="flex gap-1">
                                <button class="rounded-full p-2 text-on-surface-variant transition hover:bg-surface-strong" title="Bold"><span class="material-symbols-outlined text-[18px]" data-icon="format_bold">format_bold</span></button>
                                <button class="rounded-full p-2 text-on-surface-variant transition hover:bg-surface-strong" title="Italic"><span class="material-symbols-outlined text-[18px]" data-icon="format_italic">format_italic</span></button>
                                <button class="rounded-full p-2 text-on-surface-variant transition hover:bg-surface-strong" title="List"><span class="material-symbols-outlined text-[18px]" data-icon="format_list_bulleted">format_list_bulleted</span></button>
                                <button class="rounded-full p-2 text-on-surface-variant transition hover:bg-surface-strong" title="Link"><span class="material-symbols-outlined text-[18px]" data-icon="link">link</span></button>
                            </div>
                            <button
                                class="inline-flex items-center gap-2 rounded-full bg-primary px-4 py-2 text-sm font-semibold text-on-primary shadow-soft transition hover:-translate-y-0.5"
                                type="button">
                                <span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">auto_awesome</span>
                                <span>Enhance with AI</span>
                            </button>
                        </div>
                    </div>
                    <textarea
                        class="premium-input min-h-[12rem] resize-none px-4 py-3 text-sm"
                        placeholder="Describe your key contributions and results..." rows="8"></textarea>
                    <p class="text-sm italic text-on-surface-variant">Markdown supported. Use the AI assistant to refine these points.</p>
                </div>
                <div class="space-y-2 pt-2">
                    <label class="text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Core Technologies &amp; Skills</label>
                    <div class="flex min-h-[3rem] flex-wrap gap-2 rounded-3xl border border-outline-variant bg-white/80 p-4 shadow-soft">
                        <span class="premium-pill inline-flex items-center gap-2 px-3 py-1 text-sm text-on-primary bg-primary">React
                            <button class="material-symbols-outlined text-[14px]">close</button></span>
                        <span class="premium-pill inline-flex items-center gap-2 px-3 py-1 text-sm text-on-primary bg-primary">TypeScript
                            <button class="material-symbols-outlined text-[14px]">close</button></span>
                        <span class="premium-pill inline-flex items-center gap-2 px-3 py-1 text-sm text-on-primary bg-primary">Tailwind
                            <button class="material-symbols-outlined text-[14px]">close</button></span>
                        <input class="min-w-[8rem] flex-1 border-0 bg-transparent p-0 text-sm outline-none focus:ring-0"
                            placeholder="Add skill..." type="text" />
                    </div>
                </div>
            </section>

            <div class="flex items-center justify-end gap-3 pb-12">
                <button
                    class="rounded-full px-6 py-3 text-sm font-semibold text-on-surface-variant transition hover:bg-surface-strong active:scale-[0.99]">
                    Cancel
                </button>
                <button
                    class="rounded-full bg-primary px-8 py-3 text-sm font-semibold text-on-primary shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift active:scale-[0.99]">
                    Save Experience
                </button>
            </div>
        </div>
    </div>
</main>
