<main class="mx-auto w-full max-w-[1600px] space-y-8">
    <nav class="flex items-center gap-2 text-sm text-on-surface-variant">
        <a class="transition-colors hover:text-primary" href="{{ route('projects.index') }}">Projects</a>
        <span class="material-symbols-outlined text-[16px] text-outline">chevron_right</span>
        <span class="font-semibold text-primary">{{ $mode === 'create' ? 'Add New Project' : 'Update Project' }}</span>
    </nav>

    <header class="rounded-3xl border border-outline-variant bg-white/80 p-6 shadow-soft lg:p-8">
        <h2 class="mb-2 font-headline text-display-2 text-on-surface">Showcase New Work</h2>
        <p class="max-w-3xl text-body-lg text-on-surface-variant">
            Fill in the details below to add a new project to your professional portfolio. High-quality descriptions and
            live demos significantly increase recruiter engagement.
        </p>
    </header>

    @php

    $projectModel=$project;


    $techStackSeed=
    old(
    'tech_stack',
    $projectModel?->tech_stack ?? ''
    );


    $techStackItems=
    array_filter(
    array_map(
    'trim',
    explode(',',$techStackSeed)
    )
    );



    $isPublicValue=
    old(
    'is_public',
    $projectModel?->is_public ?? 1
    );



    $thumbnailPreview=
    $projectModel?->thumbnail
    ?
    Storage::url($projectModel->thumbnail)
    :
    null;


    @endphp

    <div class="premium-card p-6 lg:p-8">
        <form class="space-y-8" action="{{ $mode === 'create'
        ? route('projects.store')
        : route('projects.update', $projectId ?? ($projectModel?->id ?? 0)) }}" method="POST"
            enctype="multipart/form-data">
            @csrf

            @if($mode === 'edit')
            @method('PUT')
            @endif

            <section class="grid grid-cols-1 gap-5 md:grid-cols-2">
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-on-surface">Project Title</label>
                    <input name="title" class="premium-input h-12 px-4 text-sm @error('title')
                                    border-red-500 ring-1 ring-red-500 @enderror"

                        placeholder="e.g. AI-Powered Analytics Dashboard" type="text"
                        value="{{ old('title', $projectModel?->title) }}">
                          @error('title')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                                @enderror
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-on-surface">Project Category</label>
                    <select name="category" class="premium-input h-12 px-4 text-sm bg-white @error('category')
                                    border-red-500 ring-1 ring-red-500 @enderror">
                        <option value="Frontend" @selected(old('category', $projectModel?->category) ===
                            'Frontend')>Frontend</option>
                        <option value="Backend" @selected(old('category', $projectModel?->category) ===
                            'Backend')>Backend</option>
                        <option value="Fullstack" @selected(old('category', $projectModel?->category) ===
                            'Fullstack')>Fullstack</option>
                        <option value="Mobile" @selected(old('category', $projectModel?->category) === 'Mobile')>Mobile
                        </option>
                    </select  >
                            @error('category')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                                @enderror
                </div>
            </section>

            <section class="space-y-2">
                <label class="text-sm font-semibold text-on-surface">Short Description</label>
                <textarea name="summary" class="premium-input min-h-[6rem] px-4 py-3 text-sm @error('summary')
                                    border-red-500 ring-1 ring-red-500 @enderror"
                    placeholder="A brief one-sentence summary of the project purpose..."
                    rows="2">{{ old('summary', $projectModel?->summary) }}</textarea>
                      @error('summary')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                                @enderror

            </section>

            <section class="space-y-2">
                <label class="flex items-center justify-between gap-4 text-sm font-semibold text-on-surface">
                    Detailed Overview
                    <span class="font-mono text-[0.72rem] uppercase tracking-[0.18em] text-on-surface-variant">Supports
                        Markdown</span>
                </label>
                <div class="overflow-hidden rounded-3xl border border-outline-variant bg-white/80 shadow-soft @error('description')
                                    border-red-500 ring-1 ring-red-500 @enderror">
                    <div class="flex flex-wrap items-center gap-2 border-b border-outline-variant bg-surface px-3 py-2">
                        <button class="rounded-full p-2 transition hover:bg-surface-strong" type="button"><span
                                class="material-symbols-outlined text-[18px]"
                                data-icon="format_bold">format_bold</span></button>
                        <button class="rounded-full p-2 transition hover:bg-surface-strong" type="button"><span
                                class="material-symbols-outlined text-[18px]"
                                data-icon="format_italic">format_italic</span></button>
                        <button class="rounded-full p-2 transition hover:bg-surface-strong" type="button"><span
                                class="material-symbols-outlined text-[18px]" data-icon="link">link</span></button>
                        <div class="hidden h-4 w-px bg-outline-variant sm:block"></div>
                        <button class="rounded-full p-2 transition hover:bg-surface-strong" type="button"><span
                                class="material-symbols-outlined text-[18px]"
                                data-icon="format_list_bulleted">format_list_bulleted</span></button>
                        <button class="rounded-full p-2 transition hover:bg-surface-strong" type="button"><span
                                class="material-symbols-outlined text-[18px]" data-icon="code">code</span></button>
                    </div>
                    <textarea name="description"
                        class="min-h-[12rem] w-full border-0 bg-transparent p-4 text-sm focus:ring-0 "
                        placeholder="Explain the problem, your technical solution, and the impact..."
                        rows="6">{{ old('description', $projectModel?->description) }}</textarea>

                </div>
                      @error('description')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                                @enderror
            </section>

            <section class="grid grid-cols-1 gap-5 md:grid-cols-2">
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-on-surface">Tech Stack</label>
                    <div class="space-y-3 rounded-3xl border border-outline-variant bg-white/80 p-4 shadow-soft">
                        <input id="project-tech-stack" name="tech_stack" type="hidden" class="@error('tech_stack')
                                    border-red-500 ring-1 ring-red-500 @enderror"
                            value="{{ implode(', ', $techStackItems) }}">
                              @error('tech_stack')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                                @enderror

                        <div class="flex min-h-[3rem] flex-wrap gap-2" id="project-tech-stack-list">
                            @foreach($techStackItems as $tech)
                            <span
                                class="premium-pill inline-flex items-center gap-2 px-3 py-1 text-xs font-medium text-on-surface-variant"
                                data-tech-chip="{{ $tech }}">
                                {{ $tech }}
                                <button class="transition hover:text-error" type="button"
                                    aria-label="Remove {{ $tech }}" data-tech-remove>
                                    <span class="material-symbols-outlined text-[14px]" data-icon="close">close</span>
                                </button>
                            </span>
                            @endforeach
                        </div>

                        <div class="flex flex-col gap-3 sm:flex-row">
                            <input id="project-tech-stack-input" class="premium-input flex-1 px-4 py-3 text-sm"
                                placeholder="Add tech and press Enter" type="text">
                            <button id="project-tech-stack-add"
                                class="inline-flex items-center justify-center rounded-full bg-surface-strong px-5 py-3 text-sm font-semibold text-on-surface transition hover:bg-primary hover:text-on-primary"
                                type="button">
                                Add
                            </button>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-on-surface">Repository URL</label>
                        <div class="relative">
                            <span
                                class="material-symbols-outlined pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-[20px] text-outline"
                                data-icon="terminal">terminal</span>
                            <input name="github_url" class="premium-input h-12 pl-12 pr-4 text-sm @error('github_url')
                                    border-red-500 ring-1 ring-red-500 @enderror"
                                placeholder="https://github.com/user/project" type="url"
                                value="{{ old('github_url', $projectModel?->github_url) }}">
                                  @error('github_url')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                                @enderror
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-on-surface">Live Demo URL</label>
                        <div class="relative">
                            <span
                                class="material-symbols-outlined pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-[20px] text-outline"
                                data-icon="rocket_launch">rocket_launch</span>
                            <input name="demo_url" class="premium-input h-12 pl-12 pr-4 text-sm @error('demo_url')
                                    border-red-500 ring-1 ring-red-500 @enderror"
                                placeholder="https://project-demo.com" type="url"
                                value="{{ old('demo_url', $projectModel?->demo_url) }}">
                                  @error('demo_url')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                                @enderror
                        </div>
                    </div>
                </div>
            </section>

            <section class="space-y-2">
                <label class="text-sm font-semibold text-on-surface">Project Image Upload</label>
                <div
                    class="drag-drop-zone premium-card flex cursor-pointer flex-col items-center justify-center gap-3 rounded-3xl border-dashed p-8 text-center">
                    <input id="project-thumbnail" type="file" name="thumbnail" accept="image/*" class="hidden @error('thumbnail')
                                    border-red-500 ring-1 ring-red-500 @enderror ">
                                       @error('thumbnail')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                                @enderror


                    <div
                        class="flex h-14 w-14 items-center justify-center rounded-3xl bg-secondary-container text-primary shadow-soft">
                        <span class="material-symbols-outlined" data-icon="cloud_upload">cloud_upload</span>
                    </div>

                    <p class="text-sm font-semibold text-on-surface">Click to upload</p>
                    <p class="text-sm text-on-surface-variant">SVG, PNG, JPG or GIF (max. 10MB)</p>
                </div>

                <div id="project-thumbnail-preview"
                    class="{{ $thumbnailPreview ? '' : 'hidden' }} mt-3 rounded-3xl border border-outline-variant bg-white/80 p-4 shadow-soft">
                    <div class="flex items-center gap-4">
                        <img id="project-thumbnail-preview-image"
                            class="h-16 w-16 rounded-2xl object-cover border border-outline-variant bg-surface-strong"
                            alt="Selected project preview" src="{{ $thumbnailPreview ?? '' }}">
                        <div class="min-w-0">
                            <p class="truncate text-sm font-semibold text-on-surface" id="project-thumbnail-name">{{
                                $thumbnailName }}</p>
                            <p class="text-sm text-on-surface-variant">Preview updates as soon as you pick a file.</p>
                        </div>
                    </div>
                </div>

                <script>
                    (function () {
                        const init = () => {
                        const drop = document.querySelector('.drag-drop-zone');
                        const input = document.getElementById('project-thumbnail');
                        const preview = document.getElementById('project-thumbnail-preview');
                        const previewImage = document.getElementById('project-thumbnail-preview-image');
                        const previewName = document.getElementById('project-thumbnail-name');
                        const techStackList = document.getElementById('project-tech-stack-list');
                        const techStackInput = document.getElementById('project-tech-stack-input');
                        const techStackHidden = document.getElementById('project-tech-stack');
                        const techStackAdd = document.getElementById('project-tech-stack-add');
                        let objectUrl = null;

                        const clearPreview = () => {
                            if (objectUrl) {
                                URL.revokeObjectURL(objectUrl);
                                objectUrl = null;
                            }

                            if (previewImage) {
                                previewImage.removeAttribute('src');
                            }

                            if (previewName) {
                                previewName.textContent = 'No file chosen';
                            }

                            if (preview) {
                                preview.classList.add('hidden');
                            }
                        };

                        const renderPreview = (file) => {
                            if (!file || !preview || !previewImage || !previewName) {
                                clearPreview();
                                return;
                            }

                            if (objectUrl) {
                                URL.revokeObjectURL(objectUrl);
                            }

                            objectUrl = URL.createObjectURL(file);
                            previewImage.src = objectUrl;
                            previewName.textContent = file.name;
                            preview.classList.remove('hidden');
                        };

                        if (drop && input) {
                            drop.addEventListener('click', () => input.click());

                            input.addEventListener('change', () => {
                                renderPreview(input.files && input.files[0] ? input.files[0] : null);
                            });
                        }

                        const normalizeTech = (value) => value.trim().replace(/\s+/g, ' ');

                        const syncTechStack = () => {
                            if (!techStackHidden || !techStackList) {
                                return;
                            }

                            const values = Array.from(techStackList.querySelectorAll('[data-tech-chip]'))
                                .map((chip) => chip.dataset.techChip || '')
                                .filter(Boolean);

                            techStackHidden.value = values.join(', ');
                        };

                        const addTechChip = (value) => {
                            if (!techStackList) {
                                return;
                            }

                            const tech = normalizeTech(value);

                            if (!tech) {
                                return;
                            }

                            const existing = Array.from(techStackList.querySelectorAll('[data-tech-chip]'))
                                .some((chip) => (chip.dataset.techChip || '').toLowerCase() === tech.toLowerCase());

                            if (existing) {
                                return;
                            }

                            const chip = document.createElement('span');
                            chip.className = 'premium-pill inline-flex items-center gap-2 px-3 py-1 text-xs font-medium text-on-surface-variant';
                            chip.dataset.techChip = tech;
                            chip.innerHTML = `
                                <span>${tech}</span>
                                <button class="transition hover:text-error" type="button" aria-label="Remove ${tech}" data-tech-remove>
                                    <span class="material-symbols-outlined text-[14px]" data-icon="close">close</span>
                                </button>
                            `;

                            techStackList.appendChild(chip);
                            syncTechStack();
                        };

                        if (techStackList) {
                            techStackList.addEventListener('click', (event) => {
                                const removeButton = event.target.closest('[data-tech-remove]');
                                if (!removeButton) {
                                    return;
                                }

                                const chip = removeButton.closest('[data-tech-chip]');
                                if (chip) {
                                    chip.remove();
                                    syncTechStack();
                                }
                            });
                        }

                        if (techStackAdd && techStackInput) {
                            const handleTechAdd = () => {
                                addTechChip(techStackInput.value);
                                techStackInput.value = '';
                                techStackInput.focus();
                            };

                            techStackAdd.addEventListener('click', handleTechAdd);

                            techStackInput.addEventListener('keydown', (event) => {
                                if (event.key === 'Enter') {
                                    event.preventDefault();
                                    handleTechAdd();
                                }
                            });
                        }

                        syncTechStack();

                        const visibilityInput = document.getElementById('project-is-public');
                        const visibilityButtons = document.querySelectorAll('[data-visibility-option]');

                        if (visibilityInput && visibilityButtons.length) {
                            const setVisibility = (isPublic) => {
                                visibilityInput.value = isPublic ? '1' : '0';

                                visibilityButtons.forEach((button) => {
                                    const active = button.dataset.visibilityOption === (isPublic ? 'public' : 'private');
                                    button.setAttribute('aria-pressed', active ? 'true' : 'false');
                                    button.classList.toggle('bg-primary', active);
                                    button.classList.toggle('text-on-primary', active);
                                    button.classList.toggle('text-on-surface-variant', !active);
                                    button.classList.toggle('hover:bg-surface-strong', !active);
                                });
                            };

                            visibilityButtons.forEach((button) => {
                                button.addEventListener('click', () => {
                                    setVisibility(button.dataset.visibilityOption !== 'private');
                                });
                            });

                            setVisibility(Boolean(Number(visibilityInput.value)));
                        }
                        };

                        if (document.readyState === 'loading') {
                            document.addEventListener('DOMContentLoaded', init, { once: true });
                        } else {
                            init();
                        }
                    })();
                </script>
            </section>

            <section
                class="flex flex-col gap-4 rounded-3xl border border-outline-variant bg-surface px-5 py-4 shadow-soft sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-primary" data-icon="visibility">visibility</span>
                    <div>
                        <p class="text-sm font-semibold text-on-surface">Visibility Settings</p>
                        <p class="text-sm text-on-surface-variant">Control who can view this project on your public
                            profile</p>
                    </div>
                </div>
                <div
                    class="flex items-center gap-1 rounded-full border border-outline-variant bg-white p-1 shadow-soft">
                    <input id="project-is-public" name="is_public" type="hidden" value="{{ $isPublicValue ? 1 : 0 }}">
                    <button class="rounded-full px-4 py-2 text-xs font-semibold bg-primary text-on-primary transition"
                        type="button" data-visibility-option="public" aria-pressed="true">Public</button>
                    <button
                        class="rounded-full px-4 py-2 text-xs font-semibold text-on-surface-variant transition-colors hover:bg-surface-strong"
                        type="button" data-visibility-option="private" aria-pressed="false">Private</button>
                </div>
            </section>

            <div
                class="flex flex-col gap-3 border-t border-outline-variant pt-6 sm:flex-row sm:items-center sm:justify-end">
                <button
                    class="w-full rounded-full border border-outline-variant px-6 py-3 text-sm font-semibold text-on-surface-variant transition hover:bg-surface-strong active:scale-[0.99] sm:w-auto"
                    type="button">
                    Cancel
                </button>
                <button
                    class="w-full rounded-full bg-primary px-6 py-3 text-sm font-semibold text-on-primary shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift active:scale-[0.99] sm:w-auto"
                    type="submit">
                    {{ $mode === 'create' ? 'Create Project' : 'Update Project' }}
                </button>
            </div>
        </form>
    </div>

    <section
        class="flex flex-col gap-4 rounded-3xl border border-dashed border-outline-variant bg-white/65 p-6 shadow-soft lg:flex-row lg:items-center">
        <div
            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-secondary-container text-primary shadow-soft">
            <span class="material-symbols-outlined" data-icon="auto_awesome">auto_awesome</span>
        </div>
        <div class="space-y-1">
            <h4 class="font-headline text-headline-4 text-on-surface">AI Content Assistant</h4>
            <p class="max-w-3xl text-sm text-on-surface-variant">Need help writing a compelling description? Describe
                your project in bullet points and click 'Generate' to create a high-impact professional overview.</p>
        </div>
        <button
            class="inline-flex items-center justify-center rounded-full bg-primary px-5 py-3 text-sm font-semibold text-on-primary shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift lg:ml-auto"
            type="button">
            Magic Write
        </button>
    </section>
</main>

<script>
(function () {
  const textarea = document.querySelector('textarea[name="description"]');
  if (!textarea) return;

  const buttons = document.querySelectorAll('[data-icon]');

  const getSelection = () => ({
    start: textarea.selectionStart ?? 0,
    end: textarea.selectionEnd ?? 0,
  });

  const setSelection = (start, end) => {
    textarea.focus();
    textarea.setSelectionRange(start, end);
  };

  const wrapSelection = (before, after) => {
    const { start, end } = getSelection();
    const value = textarea.value;
    const selected = value.slice(start, end);
    const hasSelection = selected.length > 0;

    if (!hasSelection) {
      const placeholder = 'text';
      const next = value.slice(0, start) + before + placeholder + after + value.slice(end);
      textarea.value = next;
      const cursor = start + before.length + placeholder.length;
      setSelection(cursor, cursor);
      return;
    }

    const next = value.slice(0, start) + before + selected + after + value.slice(end);
    textarea.value = next;
    const cursorStart = start + before.length;
    const cursorEnd = cursorStart + selected.length;
    setSelection(cursorStart, cursorEnd);
  };

  const insertCodeFence = () => {
    const { start, end } = getSelection();
    const value = textarea.value;
    const selected = value.slice(start, end);

    const lang = prompt('Code language (optional)', '');
    const open = '```' + (lang || '') + '\n';
    const close = '\n```';
    const body = selected.length ? selected : 'code';

    const markdown = open + body + close;
    const next = value.slice(0, start) + markdown + value.slice(end);
    textarea.value = next;

    const cursorStart = start + open.length;
    const cursorEnd = cursorStart + body.length;
    setSelection(cursorStart, cursorEnd);
  };

  const insertBullets = () => {
    const { start, end } = getSelection();
    const value = textarea.value;
    const selected = value.slice(start, end);

    const text = selected.length ? selected : 'item';
    const lines = text.split(/\r?\n/);
    const markdown = lines.map(l => `- ${l}`).join('\n');

    const next = value.slice(0, start) + markdown + value.slice(end);
    textarea.value = next;
    setSelection(start, start + markdown.length);
  };

  const insertLink = () => {
    const { start, end } = getSelection();
    const value = textarea.value;
    const selected = value.slice(start, end);

    const text = selected.length ? selected : 'link text';
    const url = prompt('Enter link URL:');
    if (!url) return;

    const markdown = `[${text}](${url})`;
    const next = value.slice(0, start) + markdown + value.slice(end);
    textarea.value = next;

    const cursor = start + markdown.length;
    setSelection(cursor, cursor);
  };

  document.addEventListener('click', (e) => {
    const span = e.target.closest('[data-icon]');
    if (!span) return;

    const icon = span.getAttribute('data-icon');
    if (!icon) return;

    e.preventDefault();

    switch (icon) {
      case 'format_bold':
        wrapSelection('**', '**');
        break;
      case 'format_italic':
        wrapSelection('*', '*');
        break;
      case 'code':
        insertCodeFence();
        break;
      case 'format_list_bulleted':
        insertBullets();
        break;
      case 'link':
        insertLink();
        break;
    }
  });
})();

        // Simple drag & drop visual feedback
        const dropZone = document.querySelector('.drag-drop-zone');
        if (dropZone) {
            ['dragenter', 'dragover'].forEach(eventName => {
                dropZone.addEventListener(eventName, (e) => {
                    e.preventDefault();
                    dropZone.classList.add('bg-secondary-container/20', 'border-primary');
                }, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                dropZone.addEventListener(eventName, (e) => {
                    e.preventDefault();
                    dropZone.classList.remove('bg-secondary-container/20', 'border-primary');
                }, false);
            });
        }

        // Project Visibility Toggle UI behavior
        const visibilityBtns = document.querySelectorAll('.flex.items-center.gap-xs.bg-white button');
        visibilityBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                visibilityBtns.forEach(b => {
                    b.classList.remove('bg-primary', 'text-on-primary');
                    b.classList.add('text-on-surface-variant', 'hover:bg-surface-container-high');
                });
                btn.classList.add('bg-primary', 'text-on-primary');
                btn.classList.remove('text-on-surface-variant', 'hover:bg-surface-container-high');
            });
        });

        // Search Bar Focus Effect
        const searchInput = document.querySelector('input[type="text"][placeholder*="Search"]');
        if (searchInput) {
            searchInput.addEventListener('focus', () => {
                searchInput.parentElement.classList.add('ring-2', 'ring-primary/10');
            });
            searchInput.addEventListener('blur', () => {
                searchInput.parentElement.classList.remove('ring-2', 'ring-primary/10');
            });
        }
    </script>
