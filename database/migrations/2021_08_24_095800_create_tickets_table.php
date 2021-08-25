<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_id');
            $table->string('ticket_status');
            // ticket status 
            // 1. CREATED
            // 2. ACKNOWLEDGE_BY_ADMIN
            // 3. ITEM_APPROVED_BY_CLIENT
            // 4. ITEM_RECEIVED_BY_CLIENT
            // 5. CLOSED
            // 6. CANCELLED
            $table->string('job_name');
            $table->string('job_status');
            $table->string('job_type');
            $table->string('references');
            $table->string('description');
            $table->string('delivery_type');
            $table->string('dateline');
            $table->string('pic_name');
            $table->string('pic_email');
            $table->string('pic_contact_no');
            $table->string('pic_office_no');
            $table->string('pic_address');
            $table->string('pic_postcode');
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
