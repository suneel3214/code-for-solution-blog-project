<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\File;
use App\Models\State;
use App\Models\Skill;




class Newuser extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'address',
        'city',
        'state_id',
        'skill',
        'document',

    ];

    public function files(){
        return $this->hasMany(File::class);
    }

    public function skills(){
        return $this->hasMany(Skill::class);
    }

    public function states(){
        return $this->belongsTo(State::class, 'state_id');
    }


}
