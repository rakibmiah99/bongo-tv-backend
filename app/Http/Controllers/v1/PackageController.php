<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\SubscriberPackageResource;
use App\Models\SubscriberPackage;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function get(){
        $data =  SubscriberPackage::get();
        $data = [
            'packages' => $data->map(function ($item){
                return [
                    'value' => $item->uuid,
                    'name' => $item->name
                ];
            }),
            'data' => SubscriberPackageResource::make($data->first())
        ];

        return $this->sendResponse('200','', $data);
    }


    public function uuidWiseData($uuid){
        $data =  SubscriberPackage::where('uuid', $uuid)->firstOrFail();
        $data = SubscriberPackageResource::make($data);
        return $this->sendResponse('200','', $data);
    }
}
