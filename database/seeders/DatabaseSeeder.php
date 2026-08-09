<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobCategory;
use App\Models\Company;
use App\Models\JobVecancy;
use App\Models\JobApplication;
use App\Models\Resume;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // seed the root admin;

       User::firstOrCreate(
          ['email' => 'admin@admin.com'], // للبحث عن المستخدم بهذا البريد
          [
        'name' => 'Admin',
        'password' => Hash::make('12345678'),
        'email_verified_at' => now(),
    ]
);
        //seed Data to test with 
        $jobData = json_decode(file_get_contents(database_path('data/job_data.json')), true);
        $jobApplications = json_decode(file_get_contents(database_path('data/job_applications.json')), true);
        
        //Creste job categories
        foreach ($jobData['jobCategories'] as $category) {
            JobCategory::firstOrCreate([
                'name' => $category,
            ]);
        }
        //Create companies
        foreach ($jobData['companies'] as $company) {
            //Create company owner
            $owner = User::firstOrCreate([
                'email' => fake()->unique()->safeEmail(),
            ], [
                'name' => fake()->name(),
                'password' => Hash::make(12345678),
                'role' => 'company_owner',
                'email_verified_at' => now(),
            ]);
            Company::firstOrCreate([
                'name' => $company['name'],
            ], [
                'address' => $company['address'],
                'industry' => $company['industry'],
                'website' => $company['website'] ,
                'ownerId' => $owner->id,
            ]);
        }
        //create job vacancies
        foreach ($jobData['jobVacancies'] as $job) {
           //Find the company by name
            $company = Company::where('name', $job['company'])->firstOrFail();
           //Find the category by name
             $category = JobCategory::where('name', $job['category'])->firstOrFail();

             //*********** */
            JobVecancy::firstOrCreate([
                'title' => $job['title'],
                'companyId' => $company->id,
            ], [
                'description' => $job['description'],
                'location' => $job['location'],
                'type' => $job['type'],
                'salary' => $job['salary'],
                'jobCategoryId' => $category->id,
                
            ]);
        }
        //Create job Applications
        foreach ($jobApplications['jobApplications'] as $application) {
          //Get random job vacancy
          $jobVacancy = JobVecancy::inRandomOrder()->first();

          //Create job seeker
          $jobSeeker = User::firstOrCreate([
            'email' => fake()->unique()->safeEmail(),
          ], [
            'name' => fake()->name(),
            'password' => Hash::make(12345678),
            'role' => 'job-seeker',
            'email_verified_at' => now(),
          ]);
          //Create job application
         /* $jobSeeker->jobApplications()->firstOrCreate([
            'jobVecancyId' => $jobVacancy->id,
          ], [
            'status' => $application['status'],

          ]);*/
          //create resume 
          $resume = Resume::Create([
            'userId' => $jobSeeker->id,
            'filename' => $application['resume']['filename'],
           'fileUri' => $application['resume']['fileUri'],
           'contactDetails' => $application['resume']['contactDetails'],
           'summary' => $application['resume']['summary'],
           'skills' => $application['resume']['skills'],
           'experience' => $application['resume']['experience'],
           'education' => $application['resume']['education'],
    
          ]);
          //Create job applacation
            JobApplication::Create([
                'jobVecancyId' => $jobVacancy->id,
                'userId' => $jobSeeker->id,
                'resumeId' => $resume->id,
                'status' => $application['status'],
                'aiGeneratedScore' => $application['aiGeneratedScore'],
                'aiGeneratedFeedback' => $application['aiGeneratedFeedback'],
            ]);
    

    }
}
} 