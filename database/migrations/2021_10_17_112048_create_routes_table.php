<?php

use D3cr33\Routes\Contracts\Route;
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
        Schema::create(Route::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(Route::REQUEST_METHOD)->nullable();
            $table->string(Route::NAME)->nullable();
            $table->string(Route::CONTROLLER)->nullable();
            $table->string(Route::CONTROLLER_METHOD)->nullable();
            $table->string(Route::PREFIX)->nullable();
            $table->string(Route::NAMESPACE)->nullable();
            $table->string(Route::MIDDLEWARE)->nullable();
            $table->string(Route::THROTTLE)->nullable();
            $table->integer(Route::ORDER)->default(0);
            $table->boolean(Route::IS_GROUP)->default(false)->comment('determine record is group or not');
            $table->integer(Route::GROUP_PARENT)->default(0)->comment('save group id record');
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
        Schema::dropIfExists(Route::TABLE);
    }
}
