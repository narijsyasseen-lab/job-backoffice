<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;
//Notifiable,
class JobCategory extends Model
{
     use HasFactory, HasUuids, softDeletes;

     protected $table = 'job_categories';

    protected $keyType = "string";

    public $incrementing = false;

    protected $fillable = [
        'name',
        ];

         protected $dates =[
        'deleted_at',
    ];

    protected function casts() 
    {
        return ['deleted_at' => 'datetime',
        ];
    }
     public function jobVecancies(){
        return $this-> hasMany(JobVecancy::class, 'catrgortId', 'id');
    }


}
