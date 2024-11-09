<?php

namespace App\Models;
use App\Model\User;
use App\Model\UserGroup;



use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
        'code',
        'is_active',
        'teacher_id'
    ];


    public function users() 
    { 
        return $this->belongsToMany(User::class, 'group_user'); 
    }

    public function userGroup() {
        return $this->belongsTo(UserGroup::class, 'group_id');
    }
}
