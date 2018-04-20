<?php

namespace App\Observers;

use App\Models\Video;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class VideoObserver
{
    public function creating(Video $video)
    {
        $url = $video->url;
        if (stripos($url,"http://")!== false){

        }else{
            $url = str_replace("\\","/",$url);
            $video->url = 'http://'.$_SERVER['HTTP_HOST'].'/uploads/videos/'.$url;
        }

    }

    public function updating(Video $video)
    {
        $url = $video->url;
        if (stripos($url,"http://")!== false){

        }else{
            $url = str_replace("\\","/",$url);
            $video->url = 'http://'.$_SERVER['HTTP_HOST'].'/uploads/videos/'.$url;
        }

    }

    public function deleted(Video $video)
    {
        $cover = str_replace('http://'.$_SERVER['HTTP_HOST'].'/','',$video->cover);
        $url = str_replace('http://'.$_SERVER['HTTP_HOST'].'/','',$video->url);
        unlink($url);
        unlink($cover);
    }
}