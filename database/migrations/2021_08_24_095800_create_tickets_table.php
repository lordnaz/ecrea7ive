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
            $table->id()->index();
            $table->string('ticket_id')->index();
            $table->string('ticket_status')->index()->default('CREATED');
            $table->string('job_name');
            $table->string('job_status');
            $table->string('job_type');
            $table->string('references')->nullable();
            $table->string('description');
            $table->string('delivery_type');
            $table->string('dateline');
            $table->string('pic_name');
            $table->string('pic_email');
            $table->string('pic_contact_no');
            $table->string('pic_office_no')->nullable();
            $table->string('pic_address');
            $table->string('pic_postcode');
            $table->foreignId('printer')->nullable()->index();
            $table->boolean('active')->default(true);
            $table->foreignId('created_by')->index();
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
