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
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id();
            #Add Columns
            $table->foreignId("leave_type_id")->constrained("leave_types")->restrictOnDelete();
            $table->foreignId("employee_id")->constrained("employees")->restrictOnDelete();
            $table->string("name");
            $table->date("from_date");
            $table->date("to_date");
            $table->integer("count_days");
            $table->text("description")->nullable();
            $table->enum("status",["pending","approve","reject"])->default("pending");
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
        Schema::dropIfExists('leave_requests');
    }
};
