<div class="w-full space-y-6">
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">
            <div class="space-y-6 lg:col-span-8">
                <section class="premium-card p-6 sm:p-8">
                    <h3 class="mb-6 flex items-center gap-2 font-headline text-headline-4 text-on-surface">
                        <span class="material-symbols-outlined text-primary">account_circle</span>
                        Profile Settings
                    </h3>
                    <div class="flex flex-col gap-8 md:flex-row md:items-start">
                        <div class="flex flex-col items-center gap-3">
                            <div
                                class="relative h-32 w-32 overflow-hidden rounded-3xl border border-outline-variant bg-surface-strong shadow-soft">
                                <img class="h-full w-full object-cover" id="profile-preview" data-alt="Profile preview"
                                    src="{{ $user->profile_photo_url }}">
                            </div>
                            <button id="profile-photo-button"
                                class="inline-flex items-center gap-2 rounded-full border border-outline-variant bg-white px-4 py-2 text-sm font-semibold text-primary transition hover:bg-surface-strong hover:-translate-y-0.5"
                                type="button">
                                <span class="material-symbols-outlined text-[18px]">upload</span>
                                Change Photo
                            </button>
                            <input class="hidden" id="photo-upload" name="profile_photo" type="file" accept="image/*">
                            <p id="photo-upload-name" class="text-center text-sm text-on-surface-variant">
                                No file chosen
                            </p>
                        </div>

                        <div class="min-w-0 flex-1 space-y-4">
                            <div class="space-y-2">
                                <label
                                    class="px-1 text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Full
                                    Name</label>
                                <input class="premium-input h-12 px-4 text-sm @error('name')
                                    border-red-500 ring-1 ring-red-500 @enderror" placeholder="Enter your full name"
                                    name="name" type="text" value="{{ old('name', $user->name) }}">
                                @error('name')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                             <div class="min-w-0 flex-1 space-y-4">
                            <div class="space-y-2">
                                <label
                                    class="px-1 text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Username</label>
                                <input class="premium-input h-12 px-4 text-sm @error('username')
                                    border-red-500 ring-1 ring-red-500 @enderror" placeholder="Enter unique username"
                                    name="username" type="text" value="{{ old('username', $user->username) }}">
                                @error('username')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="px-1 text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Location</label>
                                <div class="relative">
                                    <span
                                        class="material-symbols-outlined pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-[20px] text-on-surface-variant">location_on</span>
                                    <input class="premium-input h-12 pl-12 pr-4 text-sm @error('location')
                                    border-red-500 ring-1 ring-red-500 @enderror" placeholder="City, Country"
                                        name="location" type="text" value="{{ old('location', $user->location) }}">
                                    @error('location')
                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <section class="premium-card p-6 sm:p-8">
                    <h3 class="mb-6 flex items-center gap-2 font-headline text-headline-4 text-on-surface">
                        <span class="material-symbols-outlined text-primary">work</span>
                        Professional Information
                    </h3>

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">


                        {{-- University --}}
                        <div class="space-y-2">
                            <label
                                class="px-1 text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">
                                University
                            </label>
                            <input type="text" name="university" value="{{ old('university', $user->university) }}"
                                class="premium-input h-12 px-4 text-sm @error('university') border-red-500 ring-1 ring-red-500 @enderror">

                            @error('university')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Degree --}}
                        <div class="space-y-2">
                            <label
                                class="px-1 text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">
                                Degree
                            </label>
                            <input type="text" name="degree" value="{{ old('degree', $user->degree) }}"
                                class="premium-input h-12 px-4 text-sm @error('degree') border-red-500 ring-1 ring-red-500 @enderror">

                            @error('degree')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Field of Study --}}
                        <div class="space-y-2">
                            <label
                                class="px-1 text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">
                                Field of Study
                            </label>
                            <input type="text" name="field_of_study"
                                value="{{ old('field_of_study', $user->field_of_study) }}"
                                class="premium-input h-12 px-4 text-sm @error('field_of_study') border-red-500 ring-1 ring-red-500 @enderror">

                            @error('field_of_study')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Graduation Year --}}
                        <div class="space-y-2 ">
                            <label
                                class="px-1 text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">
                                Graduation Year
                            </label>
                            <input type="number" min="1980" max="{{ date('Y') + 10 }}" name="graduation_year"
                                value="{{ old('graduation_year', $user->graduation_year) }}"
                                class="premium-input h-12 px-4 text-sm @error('graduation_year') border-red-500 ring-1 ring-red-500 @enderror">

                            @error('graduation_year')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Target Role --}}
                        <div class="space-y-2">
                            <label
                                class="px-1 text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">
                                Target Role
                            </label>
                            <input type="text" name="target_role" value="{{ old('target_role', $user->target_role) }}"
                                class="premium-input h-12 px-4 text-sm @error('target_role') border-red-500 ring-1 ring-red-500 @enderror">

                            @error('target_role')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Years of Experience --}}
                        <div class="space-y-2">
                            <label
                                class="px-1 text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">
                                Years of Experience
                            </label>
                            <input type="number" min="0" max="50" name="years_experience" placeholder="2"
                                value="{{ old('years_experience', $user->years_experience) }}"
                                class="premium-input h-12 px-4 text-sm @error('years_experience') border-red-500 ring-1 ring-red-500 @enderror">

                            @error('years_experience')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>





                    </div>
                </section>




<section class="space-y-2">

    <label class="text-sm font-semibold text-on-surface">
        Technologies Used
    </label>


    <div class="
        space-y-3
        rounded-3xl
        border
        border-outline-variant
        bg-white/80
        p-4
        shadow-soft
    ">


        {{-- Hidden inputs sent to backend --}}
        <div id="technologies-hidden"></div>


        @error('technologies_used')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror



        {{-- Selected technologies --}}
        <div
            id="technologies-list"
            class="flex flex-wrap gap-2">
        </div>




        <div class="flex flex-col gap-3 sm:flex-row">


            <input

                id="technology-input"

                class="premium-input flex-1 px-4 py-3 text-sm"

                placeholder="Add technology and press Enter"

                type="text"

            >



            <button

                id="technology-add"

                type="button"

                class="
                rounded-full
                bg-surface-strong
                px-5
                py-3
                text-sm
                font-semibold
                "

            >

                Add

            </button>


        </div>


    </div>


</section>







                <section class="premium-card p-6 sm:p-8">
                    <div class="mb-5 flex items-center justify-between gap-4">
                        <h3 class="flex items-center gap-2 font-headline text-headline-4 text-on-surface">
                            <span class="material-symbols-outlined text-primary">description</span>
                            Professional Bio
                        </h3>
                        <button id="generate-bio-btn"
                            class="inline-flex items-center gap-2 rounded-full border border-primary/10 bg-primary px-4 py-2 text-sm font-semibold text-on-primary transition hover:-translate-y-0.5 hover:shadow-soft"
                            type="button">
                            <span id="generate-text" class="">✨ AI Generate Bio</span>
                        </button>
                    </div>
                    <div class="relative group">
                        <textarea class="premium-input min-h-[180px] resize-none p-4 text-sm placeholder:text-on-surface-variant/60 @error('bio')
                                    border-red-500 ring-1 ring-red-500 @enderror"
                            placeholder="Tell the world about your journey, tech stack, and what drives you..."
                            name="bio" id='bio' rows="6">{{ old('bio', $user->bio) }}</textarea>
                        @error('bio')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                        @enderror

                        <div class="absolute bottom-4 right-4 opacity-0 transition-opacity group-hover:opacity-100">
                            <span
                                class="rounded-full border border-outline-variant bg-white/90 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.18em] text-on-surface-variant">
                                Characters: <span id="bio-count">
                                    {{ strlen(old('bio', $user->bio ?? '')) }}
                                </span>/2000
                            </span>
                        </div>
                    </div>

                </section>

                <section class="premium-card p-6 sm:p-8">
                    <h3 class="mb-6 flex items-center gap-2 font-headline text-headline-4 text-on-surface">
                        <span class="material-symbols-outlined text-primary">contact_mail</span>
                        Contact Details
                    </h3>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div class="space-y-2">
                            <label
                                class="px-1 text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Email
                                Address</label>
                            <input class="premium-input h-12 px-4 text-sm  @error('email')
                                        border-red-500 ring-1 ring-red-500 @enderror" name="email" type="email"
                                value="{{ old('email', $user->email) }}">
                            @error('email')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror

                        </div>
                        <div class="space-y-2">
                            <label
                                class="px-1 text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Phone
                                Number</label>
                            <input class="premium-input h-12 px-4 text-sm  @error('phone')
                                        border-red-500 ring-1 ring-red-500 @enderror" name="phone" type="text"
                                value="{{ old('phone', $user->phone) }}">
                            @error('phone')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="space-y-2 md:col-span-2">
                            <label
                                class="px-1 text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Personal
                                Website</label>
                            <div class="relative">
                                <span
                                    class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-sm font-semibold text-on-surface-variant">https://</span>
                                <input class="premium-input h-12 pl-20 pr-4 text-sm  @error('website_url')
                                    border-red-500 ring-1 ring-red-500 @enderror" name="website_url" type="url"
                                    value="{{ old('website_url', $user->website_url) }}">
                                @error('website_url')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="space-y-6 lg:col-span-4">
                <section class="premium-card p-6">
                    <h3 class="mb-5 flex items-center gap-2 font-headline text-headline-4 text-on-surface">
                        <span class="material-symbols-outlined text-primary">link</span>
                        Social Presence
                    </h3>
                    <div class="space-y-4">
                        <div class="space-y-2">
                            <label
                                class="px-1 text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">GitHub</label>
                            <div
                                class="flex items-center gap-3 rounded-2xl border border-outline-variant bg-white/80 p-3 shadow-soft focus-within:ring-2 focus-within:ring-primary/15">
                                <svg class="h-6 w-6 opacity-60" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true">
                                    <path
                                        d="M12 .5C5.73.5.71 5.61.71 11.89c0 4.99 3.22 9.22 7.68 10.71.56.1.76-.24.76-.53 0-.26-.01-.95-.02-1.87-3.12.68-3.78-1.5-3.78-1.5-.51-1.31-1.25-1.66-1.25-1.66-1.02-.7.08-.69.08-.69 1.13.08 1.73 1.18 1.73 1.18 1 .11 1.53-.72 1.69-1.12.1-.7.39-1.12.71-1.38-2.49-.29-5.12-1.25-5.12-5.56 0-1.23.43-2.23 1.13-3.02-.11-.29-.49-1.44.11-2.99 0 0 .92-.3 3.02 1.16.88-.24 1.82-.36 2.76-.36.94 0 1.88.12 2.76.36 2.1-1.46 3.02-1.16 3.02-1.16.6 1.55.22 2.7.11 2.99.7.79 1.13 1.79 1.13 3.02 0 4.32-2.64 5.27-5.14 5.56.4.35.76 1.03.76 2.08 0 1.5-.01 2.71-.01 3.08 0 .29.2.64.77.53 4.45-1.49 7.67-5.72 7.67-10.71C23.29 5.61 18.27.5 12 .5z" />
                                </svg>
                                <input class="min-w-0 flex-1 border-0 bg-transparent p-0 text-sm focus:ring-0  @error('github_username')
                                    border-red-500 ring-1 ring-red-500 @enderror" name="github_username" type="text"
                                    value="{{ old('github_username', $user->github_username) }}">
                                @error('github_username')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label
                                class="px-1 text-xs font-semibold uppercase tracking-[0.18em] text-on-surface-variant">LinkedIn</label>
                            <div
                                class="flex items-center gap-3 rounded-2xl border border-outline-variant bg-white/80 p-3 shadow-soft focus-within:ring-2 focus-within:ring-primary/15">
                                <svg class="h-6 w-6 opacity-60" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true">
                                    <path
                                        d="M20.45 20.45h-3.55v-5.57c0-1.33-.03-3.04-1.85-3.04-1.85 0-2.13 1.45-2.13 2.95v5.66H9.37V9h3.41v1.56h.05c.47-.9 1.63-1.85 3.35-1.85 3.58 0 4.24 2.36 4.24 5.43v6.31zM5.34 7.43a2.06 2.06 0 1 1 0-4.12 2.06 2.06 0 0 1 0 4.12zM7.12 20.45H3.56V9h3.56v11.45z" />
                                </svg>
                                <input class="min-w-0 flex-1 border-0 bg-transparent p-0 text-sm focus:ring-0  @error('linkedin_url')
                                    border-red-500 ring-1 ring-red-500 @enderror" name="linkedin_url" type="url"
                                    value="{{ old('linkedin_url', $user->linkedin_url) }}">
                                @error('linkedin_url')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </section>

                <section class=" premium-card overflow-hidden bg-[linear-gradient(135deg,#211925_0%,#4f3b5f_100%)] p-6
                                    text-white">
                    <div class="space-y-3">
                        <div class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-white/10">
                            <span class="material-symbols-outlined text-white">smart_toy</span>
                        </div>
                        <div>
                            <h4 class="text-headline-4 font-semibold">Optimize for SEO?</h4>
                            <p class="mt-2 text-sm text-white/78 leading-6">Let our AI analyze your profile
                                to suggest
                                keywords that attract high-tier recruiters.</p>
                        </div>
                        <button
                            class="inline-flex h-11 w-full items-center justify-center rounded-full bg-white px-4 text-sm font-semibold text-primary transition hover:-translate-y-0.5 hover:bg-white/95"
                            type="button">Run Analysis</button>
                    </div>
                </section>
            </div>
        </div>

        <div
            class="flex flex-col gap-3 border-t border-outline-variant pt-6 sm:flex-row sm:items-center sm:justify-end">
            <p class="mr-auto hidden text-sm italic text-on-surface-variant sm:block">Last updated: {{
                old('updated_at',$user->updated_at) }}</p>
            <button
                class="w-full rounded-full border border-outline-variant px-5 py-3 text-sm font-semibold text-on-surface transition hover:bg-surface-strong active:scale-[0.99] sm:w-auto"
                type="button">Discard Changes</button>
            <button
                class="w-full rounded-full bg-primary px-6 py-3 text-sm font-semibold text-on-primary shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift active:scale-[0.99] sm:w-auto"
                type="submit">
                Save Changes
                <span class="material-symbols-outlined text-sm">done_all</span>
            </button>
        </div>
    </form>

    <script>
        (function () {
            const uploadButton = document.getElementById('profile-photo-button');
            const input = document.getElementById('photo-upload');
            const preview = document.getElementById('profile-preview');
            const fileName = document.getElementById('photo-upload-name');
            let objectUrl = null;

            if (!uploadButton || !input || !preview || !fileName) {
                return;
            }

            uploadButton.addEventListener('click', () => input.click());

            input.addEventListener('change', () => {
                const file = input.files && input.files[0] ? input.files[0] : null;

                if (!file) {
                    fileName.textContent = 'No file chosen';
                    return;
                }

                if (objectUrl) {
                    URL.revokeObjectURL(objectUrl);
                }

                objectUrl = URL.createObjectURL(file);
                preview.src = objectUrl;
                fileName.textContent = file.name;
            });
        })();
    </script>
</div>




<script>
    document
    .getElementById("generate-bio-btn")
    .addEventListener("click", async function () {

        const button = this;
        const text = document.getElementById("generate-text");
        const bio = document.getElementById("bio");

        button.disabled = true;
        text.textContent = "Generating...";

        try {

            const response = await fetch("{{ route('profile.generate-bio') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Accept": "application/json"
                }
            });

            const data = await response.json();

            if (!response.ok) {
                throw new Error(data.message || "Failed to generate bio.");
            }

            bio.value = data.bio;

        } catch (error) {

            alert(error.message);

        } finally {

            button.disabled = false;
            text.textContent = "✨ AI Generate Bio";

        }
    });
</script>


<script>

document.addEventListener('DOMContentLoaded', function(){


const input = document.getElementById('technology-input');

const button = document.getElementById('technology-add');

const list = document.getElementById('technologies-list');

const hidden = document.getElementById('technologies-hidden');



if(!input || !button || !list || !hidden)
{
    return;
}




let technologies = @json(
    old('technologies_used', $user->technologies_used ?? [])
);



// Convert JSON string to array if needed

if(typeof technologies === "string")
{
    try {

        technologies = JSON.parse(technologies);

    } catch(e){

        technologies = [];

    }
}



if(!Array.isArray(technologies))
{
    technologies=[];
}




function escapeHtml(text)
{
    return text
        .replace(/&/g,"&amp;")
        .replace(/</g,"&lt;")
        .replace(/>/g,"&gt;")
        .replace(/"/g,"&quot;");
}




function render()
{


    list.innerHTML="";

    hidden.innerHTML="";



    technologies.forEach((tech,index)=>{


        list.innerHTML += `


        <div
            class="
            flex
            items-center
            gap-2
            rounded-full
            bg-gray-100
            px-3
            py-1
            text-sm
            ">


            <span>
                ${escapeHtml(tech)}
            </span>



            <button

                type="button"

                data-index="${index}"

                class="
                remove-tech
                text-gray-400
                hover:text-red-500
                "

            >

                ×

            </button>


        </div>


        `;



        hidden.innerHTML += `


        <input

            type="hidden"

            name="technologies_used[]"

            value="${escapeHtml(tech)}"

        >


        `;


    });



    document
    .querySelectorAll('.remove-tech')
    .forEach(button=>{


        button.addEventListener('click',function(){


            let index =
            this.dataset.index;


            technologies.splice(index,1);


            render();


        });


    });



}




function addTechnology()
{


    let value =
    input.value.trim();



    if(value === "")
    {
        return;
    }




    let exists =
    technologies.some(tech=>

        tech.toLowerCase()
        ===
        value.toLowerCase()

    );



    if(!exists)
    {
        technologies.push(value);
    }



    input.value="";


    render();


    input.focus();


}




button.addEventListener(
    'click',
    addTechnology
);





input.addEventListener(
    'keydown',
    function(e){


        if(e.key==="Enter")
        {

            e.preventDefault();

            addTechnology();

        }


    }
);





render();



});


</script>

