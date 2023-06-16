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
        Schema::create('correspondences', function (Blueprint $table) {
            $table->id();
            #Add Columns
            $table->integer('number')->unique();
            $table->integer('origin_number')->unique();
            $table->date('origin_date');
            $table->enum('type',['internal','external']);
            $table->enum('type_connection',["email","fax","hand"])->nullable();//if internal
            $table->enum('type_connection',["email","fax","hand"])->nullable();//if internal
            $table->foreignId("employee_id")->nullable()->constrained("employees")->restrictOnDelete();///createrr if internal
            $table->foreignId("section_id")->nullable()->constrained("sections")->restrictOnDelete();// origin section if internal
            $table->string('subject');
            $table->string('summary');
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
        Schema::dropIfExists('correspondences');
    }
};
