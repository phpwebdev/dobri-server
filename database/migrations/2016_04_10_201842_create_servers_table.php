<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServersTable extends Migration
{




    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('server_name');
            $table->string('server_ip');
            $table->integer('server_port');
            $table->boolean('nvenc_h264');
            $table->boolean('nvenc_hevc');
            $table->boolean('x264');
            $table->boolean('x265');
            $table->boolean('enabled');
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
        Schema::drop('servers');
    }
}
