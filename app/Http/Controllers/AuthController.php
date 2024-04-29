<?php

namespace App\Http\Controllers;

use App\Enums\LoginOptions;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\SubscriberLoginRequest;
use App\Models\CelebrityProfile;
use App\Models\User;
use FFMpeg\Format\Video\X264;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class AuthController extends Controller
{
    public function adminLogin(AdminLoginRequest $request){
        $data = $request->validated();
    }

    function getUserWithToken($user){
        $user = $this->getUserWithHiddenField($user);
        $user['token'] = $user->createToken('Subscriber Token')->plainTextToken;
        return $user;
    }

    public function subscriberLogin($login_option, SubscriberLoginRequest $request){
        $data =  collect($request->validated())->except('login_option');
        $data = $data->toArray();
        if ($login_option == LoginOptions::Mobile->value){
            $user = User::firstOrCreate($data);
            return $this->getUserWithToken($user);
        }
        else if($login_option == LoginOptions::Email->value){

        }
        else if ($login_option == "provider"){
            $user = User::firstOrCreate($data);
            return $this->getUserWithToken($user);
        }
    }


    protected function getUserWithHiddenField($user){
        return $user->makeHidden('created_at', 'updated_at', 'type', 'email_verified_at');
    }


    function test(){

        return [];
        $clb = CelebrityProfile::first();

        $media = $clb->getMedia('*')[1];
        $disk_name = $media->disk;
        $full_path = $media->getPath();
        $basePath = Storage::path("$disk_name");
        $basePath = str_replace("\\$disk_name", '',$basePath);
        $path =  str_replace($basePath, '', $full_path);
        $path =  str_replace("/$disk_name\\", '', $path);
//        return $path;
//        $clb->addMediaFromUrl('https://www.w3schools.com/html/mov_bbb.mp4')->toMediaCollection('video');

//        return 'hello';
        $lowBitRate = (new X264)->setKiloBitrate(1000);
        $midBitRate = (new X264)->setKiloBitrate(2500);
        $highBitRate = (new X264)->setKiloBitrate(5000);
//        return FFMpeg::openUrl('https://www.w3schools.com/html/mov_bbb.mp4')
        FFMpeg::fromDisk('public')
        ->open($f)
        ->exportForHLS()
        ->addFormat($lowBitRate)
        ->addFormat($midBitRate)
        ->addFormat($highBitRate)
        ->onProgress(function ($progress){
            Log::info("progress: {$progress}%");
        })
        ->toDisk('secrets')
        ->save('video.m3u8');
    }
}
