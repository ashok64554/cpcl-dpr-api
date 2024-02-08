<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('workPackId');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('unit_of_measure')->nullable();
            $table->string('man_power_type')->nullable();
            $table->timestamp('award_date ')->nullable();
            $table->timestamp('contractual_completion_date')->nullable();
            $table->boolean('status')->default('1')->comment('1:InProgress,2:Closed');
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
        Schema::dropIfExists('work_packages');
    }
};
