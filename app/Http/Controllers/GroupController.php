<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Module;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:100',
            'description' => 'required',
            'code' => 'required|max:10'
        ]);
        
        
         Group::create([...$data, 'teacher_id' => $request->user()->id]);
        
        // dd('successssss');
        return redirect()->back()->with(['success' => 'success created']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $modules = Module::where('group_id', $id)->get();
        return view('group.show', ['modules' => $modules]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}
