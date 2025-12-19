<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityUpdate extends Model
{
    use HasFactory;

    public $timestamps = true; // we set updated_at manually

    protected $fillable = [
        'activity_id',
        'user_id',
        'status',
        'remarks',
        'updated_at',
        'user_name',
        'user_role',
        'user_department',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
