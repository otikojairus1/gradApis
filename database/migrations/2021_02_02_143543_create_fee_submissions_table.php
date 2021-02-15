<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('batch');
            $table->string('feeCollection');
            $table->string('studentName');
            $table->string('admNo');
            $table->string('paymentMode');
            $table->string('referenceNo');
            $table->string('paymentDate');
            $table->string('paymentNotes');
            $table->string('amount');
            

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
        Schema::dropIfExists('fee_submissions');
    }
}
