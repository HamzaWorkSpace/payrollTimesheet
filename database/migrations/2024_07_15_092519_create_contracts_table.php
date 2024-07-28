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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->nullable()->constrained('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('manager_id')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('contract_title')->nullable();
            $table->boolean('invoicing_required')->default(false)->nullable();
            $table->string('invoicing_scheduler')->nullable();
            $table->string('purchase_order')->nullable();
            $table->date('contract_start_date')->nullable();
            $table->date('contract_end_date')->nullable();
            $table->string('timesheet_frequency')->nullable();
            $table->string('timesheet_approved_by')->nullable();
            $table->string('place_of_employment')->nullable();
            $table->string('jurisdiction')->nullable();
            $table->text('position_description')->nullable();
            $table->string('award')->nullable();
            $table->string('insurance_details')->nullable();
            $table->text('contract_conditions')->nullable();
            $table->integer('total_contract_units')->nullable();
            $table->string('rate_name')->nullable();
            $table->string('unit_of_pay')->nullable();
            $table->string('pay_schedule')->nullable();
            $table->boolean('generate_sales_invoice')->nullable();
            $table->string('contract_template')->nullable();
            $table->integer('standard_hours_of_pay')->nullable();
            $table->integer('standard_hours_in_a_day')->nullable();
            $table->decimal('pay_amount', 10, 2)->nullable();
            $table->decimal('charge_amount', 10, 2)->nullable();
            $table->boolean('contract_status')->default(false)->nullable();
            $table->text('additional_clause')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
