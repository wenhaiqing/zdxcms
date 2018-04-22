<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Video;

class VideoPolicy extends Policy
{
    public function update(User $user, Video $video)
    {
         return $user->can("edit_videos");
        //return true;
    }

    public function destroy(User $user, Video $video)
    {
        return $user->can("destory_videos");
    }
}
