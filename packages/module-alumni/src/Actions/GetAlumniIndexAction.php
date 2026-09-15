<?php

namespace Znu\ModuleAlumni\Actions;

use Inertia\Inertia;
use Illuminate\Http\Request;

class GetAlumniIndexAction
{
    public function __invoke(Request $request)
    {
        return Inertia::render('ModuleAlumni::Index');
    }
}
