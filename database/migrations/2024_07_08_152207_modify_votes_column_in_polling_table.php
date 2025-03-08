<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyVotesColumnInPollingTable extends Migration
{
    public function up()
    {
        Schema::table('polling', function (Blueprint $table) {
            $table->string('votes')->change(); // Change column type to string
        });
    }

    public function down()
    {
        Schema::table('polling', function (Blueprint $table) {
            $table->integer('votes')->change(); // Revert column type to integer
        });
    }
}

