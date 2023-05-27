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
            $table->integer('origin_number');
            $table->date('origin_date');
            $table->date('date');
            $table->enum('type',['internal','external']);
            $table->enum('source_dest_type',['outgoing','incoming']);
            $table->string('subject');
            $table->string('summary');
            $table->boolean('is_reply')->default(false);
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
