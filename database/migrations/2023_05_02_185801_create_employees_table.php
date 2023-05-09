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
            $table->foreignId("section_id")->constrained("sections")->restrictOnDelete();
            $table->foreignId("nationality")->constrained("countries")->restrictOnDelete();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("father_name");
            $table->string("mother_name");
            $table->string("NP_registration");
            $table->string("birth_place");
            $table->string("current_job");
            $table->string("job_site");
            $table->bigInteger("number_national")->unique()->unsigned();
            $table->bigInteger("number_file")->unsigned();
            $table->bigInteger("number_insurance")->unsigned();
            $table->bigInteger("number_self")->unsigned();
            $table->enum("gender",["male","female"]);
            $table->enum("military_service",["exempt","performer","in_service"]); //ومؤدي//معفى
            $table->string("reason_exemption")->nullable();
            $table->enum("family_status",["married","divorced","single"]);
            $table->integer("number_wives")->default(0);
            $table->integer("number_child")->default(0);
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
