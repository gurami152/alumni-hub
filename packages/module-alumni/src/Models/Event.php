<?php

namespace Znu\ModuleAlumni\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Znu\Core\Traits\HierarchicalDataScope;

class Event extends Model
{
    use HierarchicalDataScope;
    protected $fillable = [
        'department_id',
        'author_id',
        'title',
        'description',
        'event_date',
        'location',
        'is_online',
        'language',
        'status',
        'max_participants',
    ];

    protected $casts = [
        'event_date' => 'datetime',
        'is_online' => 'boolean',
    ];

    public function department()
    {
        return $this->belongsTo(\Znu\Core\Models\Department::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }
}
