<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         Schema::create('job_applications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->float('aiGeneratedScore',2)->default(0);
            $table->longText('aiGeneratedFeedback')->nullable();
            $table->timestamps();
            $table->softDeletes();


            //Relationship with job_vecancies table
            $table->uuid('jobVecancyId');
            $table->foreign('jobVecancyId')->references('id')->on('job_vecancies')->onDelete('restrict');

           
            //Relationship with resumes table
            $table->uuid('resumeId');
            $table->foreign('resumeId')->references('id')->on('resumes')->onDelete('restrict');

           
            //Relationship with users table
            $table->uuid('userId');
            $table->foreign('userId')->references('id')->on('users')->onDelete('restrict');

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applcations');
    }
       
};