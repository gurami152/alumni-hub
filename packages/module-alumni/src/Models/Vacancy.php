<?php

namespace Znu\ModuleAlumni\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Znu\Core\Traits\HierarchicalDataScope;

class Vacancy extends Model
{
    use HierarchicalDataScope;
    protected $fillable = [
        'author_id',
        'department_id',
        'title',
        'description',
        'company_name',
        'location',
        'type',
        'status',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
