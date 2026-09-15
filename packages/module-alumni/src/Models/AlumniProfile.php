<?php

namespace Znu\ModuleAlumni\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Znu\Core\Traits\HierarchicalDataScope;

class AlumniProfile extends Model
{
    use HierarchicalDataScope;
    protected $fillable = [
        'user_id',
        'department_id',
        'specialty',
        'graduation_year',
        'group_number',
        'maiden_name',
        'current_job',
        'status',
        'privacy_show_profile',
        'enrollment_year',
        'education_level',
        'awards_state',
        'awards_other',
        'contact_preferences',
        'suggestions',
        'social_links',
    ];

    protected $casts = [
        'privacy_show_profile' => 'boolean',
        'contact_preferences' => 'array',
        'social_links' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(\Znu\Core\Models\Department::class);
    }
}
