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

            $table->string("first_name");
            $table->string("last_name");
            $table->string("father_name");
            $table->string("mother_name");
            $table->string("nationality");
            $table->string("NP_registration");
            $table->enum("gender",["male","female"]);
            $table->string("birth_place");
            $table->date("birth_date");
            $table->integer("number_wives");
            $table->bigInteger("number_file")->unsigned();
            $table->integer("number_child");
            $table->string("current_job");
            $table->bigInteger("number_self")->unsigned();
            $table->enum("military_service",["exempt","performer","in_service"]); //ومؤدي//معفى
            $table->enum("family_status",["married","divorced","single"]);
            $table->bigInteger("Number_insurance")->unsigned();
            $table->string("job_site");
            $table->bigInteger("number_national")->unique()->unsigned();

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
