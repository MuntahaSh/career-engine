<?php

namespace App\Services;


use App\Models\User;


class ActivityService
{


public function create(
    User $user,
    string $type,
    string $title,
    ?string $description=null,
    string $icon='info'
)
{


$user->activities()->create([

'type'=>$type,

'title'=>$title,

'description'=>$description,

'icon'=>$icon

]);


}


}
