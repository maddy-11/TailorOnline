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
        Schema::create('service_attributes', function (Blueprint $table) { 
            $table->engine    = 'InnoDB';
            $table->charset   = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('service_id');   
            $table->float('shirt_length', 8, 2)->nullable()->comment('لمبآیی');
            $table->float('tera', 8, 2)->nullable()->comment('تیرا');
            $table->float('chati', 8, 2)->nullable()->comment('چھاتی');
            $table->float('daman', 8, 2)->nullable()->comment('دامن');
            $table->float('bazo', 8, 2)->nullable()->comment('بازو');
            $table->float('gala', 8, 2)->nullable()->comment('گلہ');
            $table->float('shalwar', 8, 2)->nullable()->comment('شلوار');
            $table->float('pancha', 8, 2)->nullable()->comment('پانچہ');
            $table->float('half_loozing', 8, 2)->nullable()->comment('ہالف لوزنگ');
            $table->float('gol_bazo', 8, 2)->nullable()->comment('گول بازو');
            $table->float('patti', 8, 2)->nullable()->comment('پٹی لمبایی');
            $table->json('options');

            /* $table->string('silayi',200)->default('سنگل')->charset('utf8');
            $table->string('calor_bane',200)->default('کالر')->charset('utf8');            
            $table->string('kuf',200)->default('کف')->charset('utf8');
            $table->string('shalwar_pocket',200)->default('شلوارجیب')->charset('utf8');
            $table->string('pocket',200)->default('جیب')->charset('utf8');
            $table->string('gera',200)->default('گیرا')->charset('utf8');
            $table->string('pati',200)->default('پٹی')->charset('utf8');
            $table->string('buton', 200)->nullable()->comment('پٹی')->charset('utf8');
            $table->string('damn', 200)->nullable()->comment('دامن')->charset('utf8'); */

            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('service_id')->references('id')->on('services');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_attributes');
    }
};
