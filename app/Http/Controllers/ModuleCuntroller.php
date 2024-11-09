<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleCuntroller extends Controller
{
    function store(Request $request, string $id)  {
        $data = $request->validate([
            'name' => 'required|max:100'
        ]);

        Module::create([...$data, 'group_id' => $id]);
    }
}
