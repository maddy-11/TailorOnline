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
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('supplier_id');
            $table->decimal('loan_amount', 10, 2)->default(0);
            $table->decimal('interest_rate', 5, 2)->default(0);
            $table->integer('term_length')->default(0);
            $table->enum('status',['Pending','Approved','Cancelled','Paid'])->default('Pending');
            $table->text('remarks')->nullable();
            $table->string('invoice')->nullable();
            $table->integer('invoice_number')->nullable();
            $table->timestamp('invoice_date')->nullable();
            $table->string('delivery_order_invoice')->nullable();
            $table->timestamp('delivery_order_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_applications');
    }
};
