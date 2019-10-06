<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function toggle_setting(Request $request)
    {

        if (!$request->setting_id) {

        }
        else {
            $task = Settings::findOrFail($request->setting_id);
            if($task->enabled == 1){
                $task->enabled = 0;
            }else{
                $task->enabled = 1;
            }
            $task->save();

        }
        return response()->json(['setting' => 'changed']);
    }

}
