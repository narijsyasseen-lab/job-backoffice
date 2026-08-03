<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Notifications\Notifiable;

class Resume extends Model
{
    use HasFactory, Notifiable, HasUuids, softDeletes;

     protected $table = 'resumes';

    protected $keyType = "string";

    public $incrementing = false;

    protected $fillable = [
        'fileName',
        'fileUri',
        'summary',
        'contactDetails',
        'education',
        'exprience',
        'skills',
        'userId',
    ];
       protected $dates =[
        'deleted_at',
    ];

    protected function casts() 
    {
        return ['deleted_at' => 'datetime',
        ];
    }
    public function usre(){
        return $this->belongsTo(user::class,'userId', 'id');
    }
     public function jobApplcations(){
        return $this-> hasMany(JobApplcation::class, 'resumeId', 'id');
    }
}
