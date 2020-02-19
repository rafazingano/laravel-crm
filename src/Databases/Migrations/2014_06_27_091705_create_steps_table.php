<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_steps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('order')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('crm_step_user', function (Blueprint $table) {
            $table->unsignedBigInteger('step_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('step_id')
                ->references('id')
                ->on('crm_steps')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->primary(['step_id', 'user_id']);
        });

        Schema::create('crm_step_role', function (Blueprint $table) {
            $table->unsignedBigInteger('step_id');
            $table->unsignedBigInteger('role_id');

            $table->foreign('step_id')
                ->references('id')
                ->on('crm_steps')
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on('entrust_roles')
                ->onDelete('cascade');

            $table->primary(['step_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crm_step_role');
        Schema::dropIfExists('crm_step_user');
        Schema::dropIfExists('crm_steps');
    }
}
