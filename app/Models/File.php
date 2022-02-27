<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Newuser;

class File extends Model
{
    use HasFactory;
    protected $fillable =[
     'image',
     'newuser_id',
    ];

    public function newuser(){
        return $this->belongsTo(Newuser::class);
    }
}
