@php
$user = auth()->user();
@endphp
<header class="sticky top-0 z-40 w-full bg-surface dark:bg-background border-b border-outline-variant dark:border-outline shadow-sm"><div class="flex justify-between items-center h-16 px-lg sticky top-0 z-40 w-full bg-surface dark:bg-background border-b border-outline-variant dark:border-outline shadow-sm">
  <div class="flex items-center gap-xl flex-grow">
    <button data-sidebar-toggle aria-controls="sidebar" aria-expanded="false" class="lg:hidden p-sm hover:bg-surface-container-high rounded-full transition-colors">
      <span class="material-symbols-outlined">menu</span>
    </button>
    <div class="relative group">
      <span class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-secondary text-[20px]">search</span>
      <input class="bg-surface-container-high border-none rounded-full pl-10 pr-lg py-2 w-64 font-body-sm focus:ring-2 focus:ring-primary-fixed transition-all" placeholder="Search projects or skills..." type="text">
    </div>
  </div>
  <div class="flex items-center gap-lg">
    <nav class="hidden md:flex items-center gap-lg">


    </nav>
  </div>
  <div class="flex items-center gap-lg flex-grow justify-end">
    <div class="flex items-center gap-md">
      <div class="flex items-center gap-sm">
      <x-notification-bell />

      </div>

      <div class="w-8 h-8 rounded-full overflow-hidden border border-outline-variant cursor-pointer hover:opacity-80 transition-opacity">
        <img class="w-full h-full object-cover" alt="User profile photo" src="{{ $user->profile_photo_url }}">
      </div>
    </div>
  </div>
</div></header>
