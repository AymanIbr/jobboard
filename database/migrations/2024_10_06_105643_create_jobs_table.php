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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title',45);
            $table->string('job_region',45);
            $table->enum('job_type',['Part Time','Full Time']);
            $table->string('vacancy');
            $table->enum('experience',['1-3 years','3-6 years','6-9 years']);
            // $table->enum('salary',['$50k - $70k','$70k - $100k','$100k - $150k']);
            $table->string('salary');
            $table->enum('gender',['M','F']);
            $table->date('application_deadline');
            $table->text('jobdescription');
            $table->text('responsibilities');
            $table->text('education_experience');
            $table->text('other_benifits');
            $table->string('image');
            $table->string('logo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
