<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = [
        'title',
        'description',
        'activity_date',
        'assigned_to',
        'created_by'
    ];

     protected $casts = [
        'activity_date' => 'date',
    ];

    // Relationship: an activity has many updates
    public function updates()
    {
        return $this->hasMany(ActivityUpdate::class);
    }

    // Optional: who created this activity
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
