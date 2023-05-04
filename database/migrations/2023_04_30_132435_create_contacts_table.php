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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            #Add Columns
            $table->string("work_number")->unique();
            $table->string("address_details")->nullable();
            $table->string("private_number",)->unique();
            $table->enum("address_type",["house","clinic","office"]);
            $table->string("email")->unique();
            $table->foreignId("address_id")->constrained("addresses")->restrictOnDelete();
            $table->foreignId("employee_id")->constrained("employees")->cascadeOnDelete();
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
        Schema::dropIfExists('contacts');
    }
};
