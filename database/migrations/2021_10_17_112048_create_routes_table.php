<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->string('request_method');
            $table->string('name');
            $table->string('prefix')->nullable();
            $table->string('namespace')->nullable();
            $table->string('controller')->nullable();
            $table->string('controller_method')->nullable();
            $table->string('middleware')->nullable();
            $table->string('throttle')->nullable();
            $table->string('order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
}
