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
            $table->string('request_method')->nullable();
            $table->string('name')->nullable();
            $table->string('controller')->nullable();
            $table->string('controller_method')->nullable();
            $table->string('prefix')->nullable();
            $table->string('namespace')->nullable();
            $table->string('middleware')->nullable();
            $table->string('throttle')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_group')->default(false)->comment('determine record is group or not');
            $table->integer('group_parent')->default(0)->comment('save group id record');
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
