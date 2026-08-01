<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;

class JobApplcation extends Model
{
     use HasFactory, Notifiable, HasUuids, softDeletes;

     protected $table = 'Job_applcations';

      protected $keyType = "string";

      public $incrementing = false;

      protected $fillable = [
        'status',
        'aiGeneratedScore',
        'aiGeneratedFeedback',
        'jobVecancyId',
        'userId',
        'resumeId',
        ];


         protected $dates =[
        'deleted_at',
    ];
     protected function casts() 
    {
        return ['deleted_at' => 'datetime',
        ];
    }
    public function jobVacancy(){
        return $this-> belongsTo(JobVacancy::class, 'jobVacancyid', 'id');
    }
    public function usre(){
        return $this->belongsTo(user::class,'userId', 'id');
    }
    public function resume(){
        return $this->belongsTo(Resume::class,'resumeId', 'id');
    }


}
