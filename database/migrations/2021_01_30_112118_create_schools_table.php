<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('website')->nullable();
            $table->string('type');
            $table->string('attendanceType');
            $table->string('startingWeekday');
            $table->string('dateFormat')->nullable();
            $table->string('dateSeparator')->nullable();
            $table->string('financialyearStartdate');
            $table->string('financialyearEnddate');
            $table->string('startingReceiptno')->nullable();
            $table->string('language');
            $table->string('timezone')->nullable();
            $table->string('county');
            $table->string('logo');
            $table->string('gradingSystem');
            $table->string('enableAutoIncrementOfStudentId')->nullable();
            $table->string('enableNewsCommentModeration')->nullable();
            $table->string('enableSibling')->nullable();
            $table->string('enablePasswordChangeAtFirstLogin')->nullable();
            $table->string('enableRollnumber')->nullable();
            $table->string('enableAutoLogout')->nullable();
            


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
        Schema::dropIfExists('schools');
    }
}
