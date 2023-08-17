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
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('service_attribute_id')->default(0);
            $table->integer('quantity')->default(1);
            $table->timestamp('order_date')->useCurrent();
            $table->timestamp('delivery_date')->nullable();
            $table->decimal('total_amount', 10, 2)->default(0);
            $table->decimal('paid_amount', 10, 2)->default(0);
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('sub_total_amount', 10, 2)->default(0);
            $table->decimal('due_amount', 10, 2)->default(0);
            $table->text('comments')->nullable();
            $table->enum('status', ['Cancelled', 'Delivered', 'Pending', 'Postponed', 'Completed'])->default('Pending');
            $table->enum('record_status', ['New', 'Completed'])->default('New');
            $table->enum('delivery_status', ['Normal', 'Urgent'])->default('Normal');
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('service_attribute_id')->references('id')->on('service_attributes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_orders');
    }
};
