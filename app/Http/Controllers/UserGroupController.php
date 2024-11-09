<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Module;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;

class UserGroupController extends Controller
{
    public function index(Request $request) {
        $groups = []; // Инициализация массива для групп
        $userGroups = UserGroup::where('user_id', $request->user()->id)->get(); // Получаем группы пользователя
        
        foreach ($userGroups as $userGroup) {
            // Получаем группу по id из userGroup
            $group = Group::where('id', $userGroup->group_id)->first(); // Изменяем на group_id
        
            if ($group) {
                $groups[] = $group; // Добавляем группу в массив
            }
        }
        
        // Теперь $groups содержит все группы пользователя
        

        // dd($groups);

        // $re = Group::where('')
 
        // foreach ($userGroups as $group) {
        //     $group = Group::where('id', $groups->id)->get();
        // }
        return view('pages.user.group', ['groups' => $groups]);
    }

    public function show(string $id)
    {
        $modules = Module::where('group_id', $id)->get();
        return view('group.show', ['modules' => $modules]);
    }


    public function join(Request $request)  {
        $request->validate([
            'code' => 'required|max:10'
        ]);

        $group = Group::where('code', $request->input('code'))->first();

        $proverka = UserGroup::where('group_id', $group->id)->where('user_id', $request->user()->id)->first();

        if ($proverka) {
            return redirect()->back()->withErrors(['code' => 'group is joined']);


        }
        if ($group) {
            
            UserGroup::create(['user_id' => $request->user()->id, 'group_id' => $group->id]);
    
            return redirect()->back()->with(['success' => 'joined']);
        }

        return redirect()->back()->withErrors(['error' => 'invalid code']);


        


    }
}
