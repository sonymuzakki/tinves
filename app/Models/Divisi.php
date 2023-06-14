<?php

namespace App\Models;

use PhpParser\Node\Expr\FuncCall;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;

class Divisi extends Model
{
    // public $incrementing = false;
    // public $keyType = 'string';
    // protected $primaryKey = 'code';
    protected $table = 'divisi';
    protected $guarded = [];

    public function User(){
        return $this->hasMany(User::class);
    }

}