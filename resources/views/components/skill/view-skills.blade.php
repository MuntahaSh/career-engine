<main class="flex-1 p-lg max-w-max-content-width mx-auto w-full space-y-xl">
    <!-- Page Header -->
    <section class="flex flex-col md:flex-row md:items-end justify-between gap-md">
        <div>
            <h2 class="text-headline-h2 font-headline-h2 text-on-surface">Skills &amp; Expertise</h2>
            <p class="text-body-lg font-body-lg text-on-surface-variant">Validated technical proficiencies and
                professional certifications.</p>
        </div>
        <div class="flex gap-sm">

        </div>
    </section>
    <div class="flex border-b border-outline-variant mb-lg items-center p-4">
       <a href="{{ route('skills.create') }}"
            class="ml-auto flex items-center gap-sm px-md py-sm bg-primary text-on-primary rounded-lg font-bold text-body-sm hover:opacity-90 transition-all active:scale-95"><span
                class="material-symbols-outlined">add</span>Add Skill</a>
    </div>
    <!-- Bento Grid Layout -->
    <div class="block" id="panel-skills">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-lg">
            <!-- AI Skill Analysis Panel (Level 2 Elevation) -->
            <div
                class="md:col-span-12 lg:col-span-4 bg-primary-container text-on-primary-container rounded-xl p-lg border-2 border-dashed border-blue-400/30 ai-pulse shadow-md relative overflow-hidden group">
                <div class="relative z-10">
                    <div class="flex items-center gap-sm mb-md">
                        <span class="material-symbols-outlined text-primary-fixed">auto_awesome</span>
                        <h3 class="text-headline-h4 font-headline-h4">✨ AI Skill Analysis</h3>
                    </div>
                    <p class="text-body-sm font-body-sm mb-lg opacity-90">Based on your recent projects, you've
                        demonstrated a 15% increase in React architectural complexity. Consider adding "Next.js" to your
                        Top Skills.</p>
                    <div class="space-y-md">
                        <div class="p-sm bg-surface-container/10 rounded-lg border border-white/10">
                            <div class="flex justify-between mb-xs">
                                <span class="text-label-mono font-label-mono">MARKET RELEVANCE</span>
                                <span class="text-label-mono font-label-mono">92%</span>
                            </div>
                            <div class="w-full h-1 bg-white/10 rounded-full overflow-hidden">
                                <div class="skill-bar-fill h-full bg-primary-fixed" style="width: 92%;"></div>
                            </div>
                        </div>
                    </div>
                    <button
                        class="mt-xl w-full py-sm bg-white text-primary-container rounded-lg font-bold text-body-sm hover:bg-blue-50 transition-colors">
                        Generate Skill Graph
                    </button>
                </div>
            </div>
            <!-- Skills Section (Level 1 Elevation) -->
            <div
                class="md:col-span-12 lg:col-span-8 bg-surface border border-outline-variant rounded-xl p-lg space-y-xl">
                <!-- Frontend -->
                <div>
                    <div class="flex items-center gap-sm mb-lg">
                        <span class="material-symbols-outlined text-primary">terminal</span>
                        <h4 class="text-headline-h4 font-headline-h4">Frontend Development</h4>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-xl gap-y-lg">
                        <div class="space-y-xs">
                            <div class="flex justify-between items-center">
                                <span class="text-body-md font-body-md font-semibold">React &amp; Next.js</span>
                                <span class="text-body-sm font-body-sm text-on-surface-variant">95%</span>
                                <button
                                    class="ml-sm text-on-surface-variant hover:text-error transition-colors p-xs rounded-full hover:bg-surface-container-high"><span
                                        class="material-symbols-outlined text-[18px]">delete</span></button>
                            </div>
                            <div class="h-1 bg-surface-container-highest rounded-full overflow-hidden">
                                <div class="skill-bar-fill h-full bg-primary" style="width: 95%;"></div>
                            </div>
                        </div>
                        <div class="space-y-xs">
                            <div class="flex justify-between items-center">
                                <span class="text-body-md font-body-md font-semibold">Tailwind CSS</span>
                                <span class="text-body-sm font-body-sm text-on-surface-variant">98%</span>
                                <button
                                    class="ml-sm text-on-surface-variant hover:text-error transition-colors p-xs rounded-full hover:bg-surface-container-high"><span
                                        class="material-symbols-outlined text-[18px]">delete</span></button>
                            </div>
                            <div class="h-1 bg-surface-container-highest rounded-full overflow-hidden">
                                <div class="skill-bar-fill h-full bg-primary" style="width: 98%;"></div>
                            </div>
                        </div>
                        <div class="space-y-xs">
                            <div class="flex justify-between items-center">
                                <span class="text-body-md font-body-md font-semibold">TypeScript</span>
                                <span class="text-body-sm font-body-sm text-on-surface-variant">88%</span>
                                <button
                                    class="ml-sm text-on-surface-variant hover:text-error transition-colors p-xs rounded-full hover:bg-surface-container-high"><span
                                        class="material-symbols-outlined text-[18px]">delete</span></button>
                            </div>
                            <div class="h-1 bg-surface-container-highest rounded-full overflow-hidden">
                                <div class="skill-bar-fill h-full bg-primary" style="width: 88%;"></div>
                            </div>
                        </div>
                        <div class="space-y-xs">
                            <div class="flex justify-between items-center">
                                <span class="text-body-md font-body-md font-semibold">Vue.js</span>
                                <span class="text-body-sm font-body-sm text-on-surface-variant">70%</span>
                                <button
                                    class="ml-sm text-on-surface-variant hover:text-error transition-colors p-xs rounded-full hover:bg-surface-container-high"><span
                                        class="material-symbols-outlined text-[18px]">delete</span></button>
                            </div>
                            <div class="h-1 bg-surface-container-highest rounded-full overflow-hidden">
                                <div class="skill-bar-fill h-full bg-primary" style="width: 70%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-t border-outline-variant pt-xl">
                    <div class="flex items-center gap-sm mb-lg">
                        <span class="material-symbols-outlined text-primary">database</span>
                        <h4 class="text-headline-h4 font-headline-h4">Backend &amp; Infrastructure</h4>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-xl gap-y-lg">
                        <div class="space-y-xs">
                            <div class="flex justify-between items-center">
                                <span class="text-body-md font-body-md font-semibold">Node.js</span>
                                <span class="text-body-sm font-body-sm text-on-surface-variant">82%</span>
                                <button
                                    class="ml-sm text-on-surface-variant hover:text-error transition-colors p-xs rounded-full hover:bg-surface-container-high"><span
                                        class="material-symbols-outlined text-[18px]">delete</span></button>
                            </div>
                            <div class="h-1 bg-surface-container-highest rounded-full overflow-hidden">
                                <div class="skill-bar-fill h-full bg-secondary" style="width: 82%;"></div>
                            </div>
                        </div>
                        <div class="space-y-xs">
                            <div class="flex justify-between items-center">
                                <span class="text-body-md font-body-md font-semibold">PostgreSQL</span>
                                <span class="text-body-sm font-body-sm text-on-surface-variant">75%</span>
                                <button
                                    class="ml-sm text-on-surface-variant hover:text-error transition-colors p-xs rounded-full hover:bg-surface-container-high"><span
                                        class="material-symbols-outlined text-[18px]">delete</span></button>
                            </div>
                            <div class="h-1 bg-surface-container-highest rounded-full overflow-hidden">
                                <div class="skill-bar-fill h-full bg-secondary" style="width: 75%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                             <div class="border-t border-outline-variant pt-xl">
                    <div class="flex items-center gap-sm mb-lg">
                        <span class="material-symbols-outlined text-primary">construction</span>
                        <h4 class="text-headline-h4 font-headline-h4">Tools &amp; DevOps</h4>
                    </div>
                    <div class="flex flex-wrap gap-sm">
                        <span
                            class="px-md py-sm bg-surface-container-low border border-outline-variant rounded-full text-body-sm font-medium">Git
                            &amp; GitHub</span>
                        <span
                            class="px-md py-sm bg-surface-container-low border border-outline-variant rounded-full text-body-sm font-medium">Docker</span>
                        <span
                            class="px-md py-sm bg-surface-container-low border border-outline-variant rounded-full text-body-sm font-medium">AWS
                            (S3, EC2)</span>
                        <span
                            class="px-md py-sm bg-surface-container-low border border-outline-variant rounded-full text-body-sm font-medium">Figma</span>
                        <span
                            class="px-md py-sm bg-surface-container-low border border-outline-variant rounded-full text-body-sm font-medium">Postman</span>
                        <span
                            class="px-md py-sm bg-surface-container-low border border-outline-variant rounded-full text-body-sm font-medium">Jira</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Certificates Grid -->
</main>






