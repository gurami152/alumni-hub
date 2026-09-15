<?php

namespace Znu\ModuleAlumni\Api\Actions;

use Illuminate\Http\Request;
use Znu\ModuleAlumni\Api\Resources\AlumniResource;
use Znu\ModuleAlumni\Models\Alumni;

class GetAlumniListApiAction
{
    public function __invoke(Request $request)
    {
        $items = Alumni::paginate(15);

        return AlumniResource::collection($items);
    }
}
