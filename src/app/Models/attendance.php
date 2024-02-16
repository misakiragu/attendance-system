<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendances';
    protected $fillable = ['user_id', 'date', 'start_time', 'end_time', 'break_start_time', 'break_end_time'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}