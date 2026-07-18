<div class="relative" id="notification-wrapper">


    <!-- Bell Button -->

    <button
        id="notification-button"
        type="button"
        class="
        relative
        flex
        items-center
        justify-center
        rounded-full
        p-2
        hover:bg-gray-100
        transition">


        <span class="material-symbols-outlined">
            notifications
        </span>



        @if($unreadCount > 0)

    <span
id="notification-dot"
class="
absolute
right-1
top-1
h-3
w-3
rounded-full
bg-red-500
border-2
border-white">
</span>

        @endif


    </button>




    <!-- Dropdown -->

    <div
        id="notification-menu"
        class="
        hidden
        absolute
        right-0
        mt-3
        w-80
        rounded-2xl
        bg-white
        shadow-xl
        border
        border-gray-200
        z-50">


        <div class="
        p-4
        border-b
        font-semibold">

            Notifications

        </div>



        <div class="max-h-96 overflow-y-auto">


        @forelse($notifications as $notification)

<div
class="
block
p-4
hover:bg-gray-50
transition">



                <div class="flex gap-3">


                    <div
                    class="
                    h-9
                    w-9
                    rounded-full
                    bg-primary/10
                    flex
                    items-center
                    justify-center">


                        <span class="material-symbols-outlined text-primary">
                            {{ $notification->data['icon'] ?? 'notifications' }}
                        </span>


                    </div>



                    <div>


                        <p class="text-sm font-semibold">

                            {{ $notification->data['title'] }}

                        </p>


                        <p class="text-xs text-gray-500">

                            {{ $notification->data['message'] }}

                        </p>


                    </div>


                </div>


            </div>


        @empty


            <p class="p-5 text-sm text-gray-500">
                No notifications yet.
            </p>


        @endforelse


        </div>


    </div>


</div>
    <script>

document.addEventListener(
'DOMContentLoaded',
()=>{


const button =
document.getElementById(
'notification-button'
);


const menu =
document.getElementById(
'notification-menu'
);



if(!button)
return;


button.addEventListener(
'click',
async()=>{


menu.classList.toggle('hidden');


// only when opening menu
if(!menu.classList.contains('hidden'))
{

    await fetch(
        '/notifications/read',
        {
            method:'POST',

            headers:{
                'X-CSRF-TOKEN':
                document.querySelector(
                    'meta[name="csrf-token"]'
                ).content
            }
        }
    );


    const dot =
    document.getElementById(
        'notification-dot'
    );


    if(dot)
    {
        dot.remove();
    }

}


});



document.addEventListener(
'click',
(e)=>{


const wrapper =
document.getElementById(
'notification-wrapper'
);



if(
wrapper &&
!wrapper.contains(e.target)
)
{

menu.classList.add(
'hidden'
);

}


});


});


</script>
