<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotersTable extends Migration
{
    public function up()
    {
        Schema::create('voters', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('mother_name');
            $table->string('cnic')->unique();
            $table->string('phone_no');
            $table->date('dob');
            $table->string('constituency');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('voters');
    }
}
