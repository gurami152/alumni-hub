<?php

namespace Znu\ModuleAlumni\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Znu\Core\Traits\HierarchicalDataScope;

class Story extends Model
{
    use HierarchicalDataScope;
    protected $fillable = [
        'department_id',
        'author_id',
        'title',
        'content',
        'status',
    ];

    public function department()
    {
        return $this->belongsTo(\Znu\Core\Models\Department::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
