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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('bran_name')->nullable();
            $table->string('full_business_name')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('last_ip')->nullable();
            $table->string('logo')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_person_phone')->nullable();
            $table->decimal('loan_amount_paid', 10, 2)->default(0);
            $table->enum('status', ['Pending', 'Approved'])->default('Pending');
            $table->enum('payment_status', ['Pending', 'Approved', 'Paid'])->default('Pending');
            $table->timestamp('payment_date')->nullable();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
};
