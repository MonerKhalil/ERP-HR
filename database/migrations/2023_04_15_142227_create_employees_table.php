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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->unique()->constrained("users")->restrictOnDelete();
            $table->foreignId("address_id")->constrained("addresses")->restrictOnDelete();
            $table->string("address_details")->nullable();
            $table->integer("national_number")->unique();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("father_name");
            $table->string("mother_name");
            $table->string("nationality");
            $table->string("NP_registration");
            $table->string("id_barcode");
            $table->enum("gender",["male","female"]);
            $table->string("birth_place");
            $table->date("birth_date");
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
        Schema::dropIfExists('employees');
    }
};
