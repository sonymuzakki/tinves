<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ups extends Model
{
    use HasFactory;
    protected $table = 'ups';
    protected $guarded = [];



    public function User(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function Jenis(){
        return $this->belongsTo(Jenis::class,'jenis_id','id');
    }
}
