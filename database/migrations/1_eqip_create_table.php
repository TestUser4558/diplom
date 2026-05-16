<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('eqips', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('token')->unique();
            $table->date('last_chek_date');
            $table->string('certificate');
        });

        Schema::create('using_eqip', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('eqip_id')->unsigned();
            $table->foreign('eqip_id')->references('id')->on('eqips');
            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->boolean('active')->default(1);
        });

        Schema::create('eqip_coords', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('eqip_id')->unsigned();
            $table->foreign('eqip_id')->references('id')->on('using_eqip');
            $table->float('x');
            $table->float('y');
            $table->dateTime('datetime');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eqips');
        Schema::dropIfExists('using_eqip');
        Schema::dropIfExists('failed_jobs');
    }
};
