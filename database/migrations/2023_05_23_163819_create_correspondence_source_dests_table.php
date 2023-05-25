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
        Schema::create('correspondence_source_dests', function (Blueprint $table) {
            $table->id();
            #Add Columns
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('fax_number');
            $table->enum('type',[]);
            $table->foreignId("employee_id")->constrained("employees")->restrictOnDelete();
            $table->foreignId("section_id")->constrained("sections")->restrictOnDelete();
            $table->boolean("is_active")->default(true);
            $table->foreignId("created_by")->nullable()->constrained("users")->restrictOnDelete();
            $table->foreignId("updated_by")->nullable()->constrained("users")->restrictOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('correspondence_source_dests');
    }
};
