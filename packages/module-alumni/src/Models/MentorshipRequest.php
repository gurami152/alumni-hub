<?php

namespace Znu\ModuleAlumni\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Znu\Core\Traits\HierarchicalDataScope;

class MentorshipRequest extends Model
{
    use HierarchicalDataScope;
    protected $fillable = [
        'author_id',
        'assignee_id',
        'title',
        'description',
        'type',
        'hours_spent',
        'status',
        'deadline',
    ];

    protected $casts = [
        'deadline' => 'date',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assignee_id');
    }
}
