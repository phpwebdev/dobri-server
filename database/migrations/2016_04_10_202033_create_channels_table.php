<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('server_id')->unsigned();
            $table->string('channel_name');
            $table->string('source');
            $table->integer('audio_output');
            $table->boolean('nvenc_h264');
            $table->boolean('x264');
            $table->boolean('hd');
            $table->string('rtmp_name');
            $table->boolean('enabled');
            $table->boolean('running');

            $table->foreign('server_id')
                ->references('id')->on('servers')
                ->onDelete('cascade');

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
        Schema::drop('channels');
    }
}
