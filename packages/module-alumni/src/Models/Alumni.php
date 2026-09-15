<?php

namespace Znu\ModuleAlumni\Models;

use Illuminate\Database\Eloquent\Model;
use Znu\Core\Traits\HierarchicalDataScope;

class Alumni extends Model
{
    use HierarchicalDataScope;

    protected $guarded = [];
}
