<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Newuser;


class Skill extends Model
{
    use HasFactory;

    protected $fillable =[
      'skill',
      'newuser_id',
    ];

    public function newuser(){
        return $this->belongsTo(Newuser::class);
    }
}
