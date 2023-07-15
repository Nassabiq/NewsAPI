<?php

namespace App\Traits;

use App\Models\ActivityLog as ModelsActivityLog;

trait ActivityLog
{
    public function writeLog($log_name, $activity, $causer)
    {
        $data = ModelsActivityLog::create([
            'log_name' => $log_name,
            'activity' => $activity,
            'causer' => $causer,
        ]);

        return $data->log_name;
    }
}
