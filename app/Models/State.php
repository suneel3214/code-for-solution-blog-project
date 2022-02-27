<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Newuser;

class State extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function newusers(){
        return $this->hasMany(Newuser::class);
    }
}
