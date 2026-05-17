<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function adminList()
    {
        $activities = Activity::orderBy('name')->get();
        return view('catalogo', compact('activities'));
    }

    public function create()
    {
        return view('admin.activities.create');
    }
}