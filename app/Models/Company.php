<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;

class Company extends Model
{
     use HasFactory, Notifiable, HasUuids, softDeletes;

     protected $table = 'companies';

    protected $keyType = "string";

    public $incrementing = false;

    protected $fillable = [
        'name',
        'address',
        'industry',
        'website',
        'deleted_at',
        'ownerid'
        ];

      protected $dates =[
        'deleted_at',
    ];

    protected function casts() 
    {
        return ['deleted_at' => 'datetime',
        ];
    }


    public function owner(){
        return $this->belongsTo(user::class,'ownerId', 'id');
    }
     public function jobVecancy(){
        return $this-> hasMany(JobVecancy::class, 'companyId', 'id');
    }
  
    
}
