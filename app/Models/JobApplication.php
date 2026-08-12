<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Notifications\Notifiable;
use App\Models\JobVacancy;
use App\Models\Resume;
use App\Models\User;



  class JobApplication extends Model
{
     use HasFactory, Notifiable, HasUuids, softDeletes;

     protected $table = 'job_applications';

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
        return $this-> belongsTo(JobVacancy::class, 'jobVacancyId', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class,'userId', 'id');
    }
    public function resume(){
        return $this->belongsTo(Resume::class,'resumeId', 'id');
    }


}

