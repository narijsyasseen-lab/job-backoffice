<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Notifications\Notifiable;

class JobVecancy extends Model
{
     use HasFactory, Notifiable, HasUuids, softDeletes;

     protected $table = 'job_vecancies';

    protected $keyType = "string";

    public $incrementing = false;


    protected $fillable = [

    'title',
    'description',
    'salary',
    'location',
    'type',
    'jobCategoryId',
    'companyId',
    
    ];
     protected $dates =[
        'deleted_at',
    ];
    public function jobCategory(){
        return $this-> belongsTo(JobCategory::class, 'jobCategoryId', 'id');
    }
    public function company(){
        return $this-> belongsTo(Company::class, 'companyId', 'id');
    }
    public function jobVecancy(){
        return $this-> hasMany(JobApplcation::class, 'jobVecancyId', 'id');
    }


}