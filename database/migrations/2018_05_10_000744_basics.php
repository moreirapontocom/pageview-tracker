<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Basics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url')->unique();
            $table->char('tracking_code', 5);
            $table->timestamps();
        });

        Schema::create('pageviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('site_id');
            $table->string('viewer_ip')->default('0.0.0.0');
            $table->string('viewer_session')->nullable();
            $table->string('page');
            $table->string('referal')->nullable();
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
        Schema::dropIfExists('sites');
        Schema::dropIfExists('pageviews');
    }
}
