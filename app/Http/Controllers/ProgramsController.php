<?php

namespace App\Http\Controllers;

use App\Enums\ProgramCategoryEnum;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{
     public function index()
    {
        return view('home', [
            'morningProgram' => Program::where('category', ProgramCategoryEnum::Morning)->first(),
            'eveningProgram' => Program::where('category', ProgramCategoryEnum::Evening)->first(),
        ]);
    }
}
