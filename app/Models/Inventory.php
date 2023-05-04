<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    // protected $guarded = [];
    protected $table = 'inventory';
    protected $guarded = [];



    public function User(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function Jenis(){
        return $this->belongsTo(Jenis::class,'jenis_id','id');
    }
    public function Divisi(){
        return $this->belongsTo(Divisi::class);
    }

    public function history(){
        return $this->hasOne(history::class);
    }



}