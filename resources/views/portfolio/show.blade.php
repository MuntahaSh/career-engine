<x-portfolio.navbar
    :user="$user"
/>


<main class="max-w-max-content-width mx-auto px-lg md:px-xl pt-32">

<x-portfolio.hero
    :user="$user"
/>


<x-portfolio.skills
    :skills="$user->skills"
/>


<x-portfolio.experience
    :experiences="$user->experiences"
/>


<x-portfolio.projects
    :projects="$user->projects"
/>


<x-portfolio.certificates
    :certificates="$user->certificates"
/>


<x-portfolio.contact
    :user="$user"
/>

</main>


<x-portfolio.footer
    :user="$user"
/>
