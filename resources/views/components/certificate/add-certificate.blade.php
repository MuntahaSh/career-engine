@php
use Illuminate\Support\Facades\Storage;
@endphp
<main class="mx-auto w-full max-w-[1600px] space-y-8">
    <section
        class="flex flex-col gap-4 rounded-3xl border border-outline-variant bg-white/80 p-6 shadow-soft lg:flex-row lg:items-end lg:justify-between lg:p-8">
        <div class="space-y-2">
            <nav class="flex items-center gap-2 text-sm text-on-surface-variant">
                <a class="transition-colors hover:text-primary" href="{{ route('certificates') }}">Certificates</a>
                <span class="material-symbols-outlined text-[16px] text-outline">chevron_right</span>
                <span class="font-semibold text-primary"> {{ $mode === 'create'
                    ? 'Add New '
                    : 'Edit '
                    }}
                </span>
            </nav>
            <h2 class="font-headline text-display-2 text-on-surface">

                {{ $mode === 'create'
                ? 'Add New Certificate'
                : 'Edit Certificate'
                }}

            </h2>
            <p class="max-w-3xl text-body-lg text-on-surface-variant">
                Showcase your formal recognitions, professional licenses, and specialized training to enhance your
                expert profile.
            </p>
        </div>
    </section>
<form
    id="certificate-form"
    method="POST"
    enctype="multipart/form-data"
    action="{{ $mode === 'create'
        ? route('certificates.store')
        : route('certificates.update', $certificate) }}">

        @csrf


        @if($mode==='edit')
        @method('PUT')
        @endif

        @if ($errors->any())
    <div class="bg-red-100 border border-red-400 p-4 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">
            <div class="space-y-6 lg:col-span-8">
                <section class="premium-card space-y-5 p-6 sm:p-8">
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-on-surface">Certificate Name</label>
                            <input class="premium-input h-12 px-4 text-sm @error('name')
                                    border-red-500 ring-1 ring-red-500 @enderror " name="name"
                                value="{{old('name',$certificate?->name)}}"
                                placeholder="e.g. AWS Certified Solutions Architect" type="text">
                            @error('name')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-on-surface">Issuing Organization</label>
                            <input class="premium-input h-12 px-4 text-sm @error('organization')
                                    border-red-500 ring-1 ring-red-500 @enderror "
                                placeholder="e.g. Amazon Web Services" type="text" name="organization"
                                value="{{old('organization',$certificate?->organization)}}">
                            @error('organization')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-on-surface">Issue Date</label>
                            <input class="premium-input h-12 px-4 text-sm @error('issue_date')
                                    border-red-500 ring-1 ring-red-500 @enderror " type="date" name="issue_date"
                                value="{{old('issue_date',$certificate?->issue_date?->format('Y-m-d'))}}">
                            @error('issue_date')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror

                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-on-surface">Expiration Date</label>
                            <input class="premium-input h-12 px-4 text-sm @error('expiration_date')
                                    border-red-500 ring-1 ring-red-500 @enderror" type="date" name="expiration_date"
                                value="{{old('expiration_date',$certificate?->expiration_date?->format('Y-m-d'))}}">
                            @error('expiration_date')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-on-surface">Credential ID</label>
                            <input class="premium-input h-12 px-4 text-sm @error('credential_id')
                                    border-red-500 ring-1 ring-red-500 @enderror" placeholder="e.g. ABC-123-XYZ"
                                type="text" name="credential_id"
                                value="{{old('credential_id',$certificate?->credential_id)}}">
                            @error('credential_id')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-on-surface">Credential URL</label>
                            <input class="premium-input h-12 px-4 text-sm @error('credential_url')
                                    border-red-500 ring-1 ring-red-500 @enderror" placeholder="https://verify.org/..."
                                type="url" name="credential_url"
                                value="{{old('credential_url',$certificate?->credential_url)}}">
                            @error('credential_url')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-center justify-between gap-4">
                            <label class="text-sm font-semibold text-on-surface">Description</label>
                            <span
                                class="font-mono text-[0.72rem] uppercase tracking-[0.18em] text-on-surface-variant">Markdown
                                supported</span>
                        </div>




                        <textarea class="premium-input min-h-[10rem] px-4 py-3 text-sm @error('description')
                                    border-red-500 ring-1 ring-red-500 @enderror" name="description"
                            placeholder="Tell the story of this achievement... What did you learn? What rigor was required?"
                            rows="6">{{old('description',$certificate?->description)}}</textarea>
                        @error('description')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </section>



                <section class="space-y-2">
                    <label class="text-sm font-semibold text-on-surface">
                        Skills
                    </label>

                    <div
                        class="space-y-3 rounded-3xl border border-outline-variant bg-white/80 p-4 shadow-soft flex flex-col">

                        {{-- Hidden inputs sent to backend (rendered by JS to keep UI consistent) --}}
                        <div id="certificate-skills-hidden">

                        </div>
                        @error('skills')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                        @enderror


                        {{-- Selected skill chips (rendered by JS for consistent UI/hidden inputs) --}}
                        <div class="flex flex-wrap gap-2 pt-1" id="certificate-skills-list"></div>

                        {{-- Add skill --}}
                        <div class="flex flex-col gap-3 sm:flex-row">

                            <input id="certificate-skill-input" class="premium-input flex-1 px-4 py-3 text-sm"
                                placeholder="Add skill and press Enter" type="text">


                            <button id="certificate-skill-add" type="button"
                                class="inline-flex items-center justify-center rounded-full bg-surface-strong px-5 py-3 text-sm font-semibold text-on-surface transition hover:bg-primary hover:text-on-primary">
                                Add
                            </button>

                        </div>

                    </div>

                </section>



                <section class="premium-card p-6 sm:p-8">
                    <h3 class="mb-4 font-headline text-headline-4 text-on-surface">Certificate Media</h3>
                    <label for="certificate_file"
                        class="flex cursor-pointer flex-col items-center justify-center gap-3 rounded-3xl border-2 border-dashed border-outline-variant bg-surface px-6 py-10 text-center transition hover:bg-surface-strong">


                        <input id="certificate_file" type="file" name="file_path" class="hidden">


                        <div
                            class="flex h-16 w-16 items-center justify-center rounded-full bg-secondary-container text-primary shadow-soft">
                            <span class="material-symbols-outlined text-3xl">
                                upload_file
                            </span>
                        </div>


                        <p class="text-sm font-semibold text-on-surface">
                            Click to upload certificate
                        </p>


                        <p class="text-sm text-on-surface-variant">
                            SVG, PNG, JPG or PDF (max. 10MB)
                        </p>


                    </label>

                    <div id="certificate-file-preview"
                        class="{{ $certificate?->file_path ? '' : 'hidden' }} mt-3 rounded-3xl border border-outline-variant bg-white/80 p-4 shadow-soft">

                        <div class="flex items-center gap-4">

                    <img
id="certificate-preview-image"
class="h-16 w-16 rounded-2xl object-cover border border-outline-variant bg-surface-strong"
alt="Certificate preview"

src="{{ $certificate?->file_path
    ? Storage::url($certificate->file_path)
    : '' }}"
>

                            <div class="min-w-0">

                                <p class="truncate text-sm font-semibold text-on-surface" id="certificate-file-name">

                                    {{ $certificate?->file_path ?? 'No file selected' }}

                                </p>

                                <p class="text-sm text-on-surface-variant">
                                    Preview updates as soon as you pick a file.
                                </p>

                            </div>

                        </div>

                    </div>
                </section>

                <div
                    class="flex flex-col gap-3 border-t border-outline-variant pt-6 sm:flex-row sm:items-center sm:justify-end">
                    <a href="{{ route('certificates') }}"
                        class="w-full rounded-full border border-outline-variant px-6 py-3 text-sm font-semibold text-on-surface-variant transition hover:bg-surface-strong sm:w-auto">
                        Cancel
                    </a>


                    <button
                        class="w-full rounded-full bg-primary px-6 py-3 text-sm font-semibold text-on-primary shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift sm:w-auto"
                        type="submit">
                        Save Certificate
                    </button>
                </div>
            </div>

            <div class="space-y-6 lg:col-span-4">
                <section
                    class="premium-card overflow-hidden bg-[linear-gradient(135deg,#22192f_0%,#4d375d_56%,#8f5d6a_100%)] p-6 text-white">
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-white/10">
                                <span class="material-symbols-outlined text-sm"
                                    style="font-variation-settings: 'FILL' 1;">auto_awesome</span>
                            </div>
                            <h3 class="font-headline text-headline-4 text-white">AI Copilot</h3>
                        </div>
                        <p class="text-sm leading-6 text-white/78">
                            Need help articulating the value of this certification? I can draft a high-impact
                            description based on the title and organization.
                        </p>
                        <div class="space-y-3">
                            <button
                                class="flex w-full items-center justify-between rounded-2xl bg-white/10 px-4 py-3 text-sm font-medium text-white transition hover:bg-white/16">
                                <span>Draft Certificate Overview</span>
                                <span class="material-symbols-outlined">chevron_right</span>
                            </button>
                            <button
                                class="flex w-full items-center justify-between rounded-2xl bg-white/10 px-4 py-3 text-sm font-medium text-white transition hover:bg-white/16">
                                <span>List Core Competencies Learned</span>
                                <span class="material-symbols-outlined">chevron_right</span>
                            </button>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </form>


</main>

<script>

document.addEventListener('DOMContentLoaded', function () {


    const fileInput =
        document.getElementById('certificate_file');


    const previewImage =
        document.getElementById('certificate-preview-image');


    const previewContainer =
        document.getElementById('certificate-file-preview');


    const fileName =
        document.getElementById('certificate-file-name');



    if(!fileInput)
    {
        return;
    }




    fileInput.addEventListener('change', function(event){


        const file =
            event.target.files[0];



        if(!file)
        {
            return;
        }



        // show new file name
        fileName.textContent =
            file.name;



        // show image preview
        if(file.type.startsWith('image/'))
        {

            previewImage.src =
                URL.createObjectURL(file);

        }
        else
        {

            previewImage.src = '';

        }



        previewContainer.classList.remove('hidden');



    });



});


</script>

<script>


document.addEventListener('DOMContentLoaded',()=>{


const skillInput =
document.getElementById('certificate-skill-input');


const addButton =
document.getElementById('certificate-skill-add');


const skillList =
document.getElementById('certificate-skills-list');


const hiddenContainer =
document.getElementById('certificate-skills-hidden');



if(!skillInput || !addButton)
{
    return;
}




let selectedSkills =
@json(old('skills',$certificate?->skills ?? []));



if(!Array.isArray(selectedSkills))
{
    selectedSkills=[];
}




function renderSkills()
{

    skillList.innerHTML='';


    selectedSkills.forEach((skill,index)=>{


        skillList.innerHTML += `

        <div
        class="
        flex items-center gap-2
        rounded-full
        bg-gray-100
        px-3 py-1
        text-sm
        text-gray-700">


            <span>
                ${skill}
            </span>


            <button
            type="button"
            class="text-gray-400 hover:text-red-500"
            onclick="removeSkill(${index})">

                ×

            </button>


        </div>

        `;


    });



    renderHiddenInputs();

}




function renderHiddenInputs()
{

    hiddenContainer.innerHTML='';


    selectedSkills.forEach(skill=>{


        hiddenContainer.innerHTML += `

        <input
        type="hidden"
        name="skills[]"
        value="${skill}">

        `;


    });


}




function addSkill()
{

    let value =
    skillInput.value.trim();



    if(value==="")
    {
        return;
    }




    let exists =
    selectedSkills.some(
        skill =>
        skill.toLowerCase()
        === value.toLowerCase()
    );



    if(!exists)
    {
        selectedSkills.push(value);
    }




    renderSkills();



    // clear input
    skillInput.value="";


    skillInput.focus();

}




addButton.addEventListener(
'click',
(e)=>{

e.preventDefault();

addSkill();

});




skillInput.addEventListener(
'keydown',
(e)=>{


if(e.key==="Enter")
{

e.preventDefault();

addSkill();

}


});





window.removeSkill=function(index)
{

selectedSkills.splice(index,1);


renderSkills();


}




renderSkills();



});

</script>
