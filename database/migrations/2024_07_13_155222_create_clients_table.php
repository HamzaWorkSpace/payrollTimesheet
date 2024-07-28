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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->bigInteger('ABN')->nullable();
            $table->string('contract_name')->nullable();
            $table->string('email')->nullable();
            $table->string('Xero_contact_id')->nullable();
            $table->string('invoice_date_type')->nullable();
            $table->integer('payment_terms')->nullable();
            $table->boolean('invoicing')->nullable();
            $table->boolean('merge_attachments_as_zip')->nullable();
            $table->boolean('auto_upload_attachments_to_xero')->nullable();
            $table->boolean('active')->default(true);
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
