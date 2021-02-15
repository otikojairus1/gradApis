<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('admNo');
            $table->string('admDate');
            $table->string('firstName');
            $table->string('middleName');
            $table->string('lastName');
            $table->date('DOB');
            $table->string('bloodGroup');
            $table->string('birthPlace');
            $table->string('nationality');
            $table->string('motherTongue');
            $table->string('category');
            $table->string('addressLine');
            $table->string('homeTown');
            $table->string('county');
            $table->string('box');
            $table->string('citizenship');
            $table->string('phone');
            $table->string('email');
            $table->string('class');
            $table->string('batch');
            $table->string('rollNo')->nullable();
            $table->string('biometricID')->nullable();
            $table->string('enableSMS')->nullable();
            $table->string('enableEmail')->nullable();
            $table->string('photo');
            $table->string('sibling')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
