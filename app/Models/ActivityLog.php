<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = ['log_name', 'activity', 'causer'];

    public function causer()
    {
        return $this->belongsTo(User::class, 'causer');
    }
}
