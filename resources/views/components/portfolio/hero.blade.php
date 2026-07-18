<section class="min-h-[80vh] flex flex-col md:flex-row items-center justify-between gap-element-gap mb-section-gap">
<div class="flex-1 space-y-10">
<div class="flex items-center gap-3 text-on-primary-fixed-variant bg-surface-container-high w-fit px-5 py-2 rounded-full font-semibold text-xs uppercase tracking-wider border border-outline-variant/30">
<span class="material-symbols-outlined text-[18px]">verified</span>
                {{ $user->years_experience }} Years Professional Experience
            </div>
<h1 class="font-headline-h1 text-primary max-w-2xl leading-[1.1] text-5xl md:text-6xl">
                I'm {{ $user->name }}, a <span class="text-on-primary-container">{{ $user->target_role ?? 'Developer' }}</span> crafting digital excellence with precision.
            </h1>
<p class="font-body-lg text-on-surface-variant max-w-xl leading-relaxed">
                Specializing in robust architectures and seamless user experiences. I bridge the gap between complex engineering and human-centric design.
            </p>
<div class="flex flex-wrap gap-4 pt-4">
<button class="primary-gradient text-on-primary px-10 py-4 rounded-full font-bold flex items-center gap-2 hover:shadow-lg transition-all active:scale-[0.98]">
                    Get in Touch
                    <span class="material-symbols-outlined">arrow_forward</span>
</button>
<button class="bg-white border border-outline-variant text-primary px-10 py-4 rounded-full font-bold hover:bg-surface-container-low transition-all active:scale-[0.98]">
                    Download CV
                </button>
</div>
<div class="flex gap-8 items-center pt-8">
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#"><span class="material-symbols-outlined text-[28px]">code</span></a>
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#"><span class="material-symbols-outlined text-[28px]">terminal</span></a>
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#"><span class="material-symbols-outlined text-[28px]">language</span></a>
</div>
</div>
<div class="flex-1 flex justify-end">
<div class="relative w-full max-w-[480px] aspect-[4/5] rounded-3xl overflow-hidden border border-outline-variant shadow-xl">
<img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDIjo929xNDSfSCheZD3HvW7jgfn9Md9lCIc6JiyYphED2AfuTk336m8ZrNrZMNVyDytXepz783IeKGLAA0Iburq1S6MYJr4Eg4_eRMrWzEcW_HQgzoNUxbi_cLypERT7cla81V3suX-qD_fHdmutKPAAYV7tGj6JD2Dotk2G65T5C9Dotk2G65T5C9DdFnTNS1KtoMc0iq2cw0Ns78U3t1DVaTd0SWqwUNPu-VDUlNPA0KP_48TcK5rjm7e-I-vLgJ"/>
<div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-primary/20 to-transparent"></div>
<div class="absolute bottom-10 left-10 text-white">
<p class="font-bold text-xl mb-1">San Francisco, CA</p>
<p class="text-sm opacity-90 border-b border-white/40 pb-1 inline-block cursor-pointer hover:border-white transition-all">Available for high-impact roles</p>
</div>
</div>
</div>
</section>
