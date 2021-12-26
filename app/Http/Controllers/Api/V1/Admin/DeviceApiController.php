<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DeviceApiController extends Controller
{

    public function save(Request $request)
    {
        $devise = Device::where("udid", $request->udid)->firstOrNew();
        if (empty($devise->key)) {
            $devise->key = Str::uuid();
        }
        $devise->udid = $request->udid;
        $devise->token = $request->token;
        $devise->save();
        return Device::where("udid", $request->udid)->first();
    }
}
