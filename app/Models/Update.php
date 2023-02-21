<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    use HasFactory;

    protected $fillable = ['notification_id', 'username', 'updatestatus_id', 'remarks', 'lastupdate_username'];

    public function notification(){
        return $this->belongsTo(Notification::class);
    }

    public function updatestatus(){
        return $this->belongsTo(Updatestatus::class);
    }
}
