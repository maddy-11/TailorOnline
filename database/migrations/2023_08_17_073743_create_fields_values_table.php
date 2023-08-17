<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_field_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('field_id');
            $table->string('option_value')->nullable();
            $table->string('image')->nullable();
            $table->integer('sort_order')->default(0);
            $table->enum('status', ['Active', 'Inactive']);
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_field_values');
    }
};
