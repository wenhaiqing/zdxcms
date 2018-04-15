<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Video;

class VideoPolicy extends Policy
{
    public function update(User $user, Video $video)
    {
         return $video->user_id == $user->id;
        //return true;
    }

    public function destroy(User $user, Video $video)
    {
        return true;
    }
}
