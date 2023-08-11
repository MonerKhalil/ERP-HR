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
            $table->foreignId("correspondences_id")->constrained("correspondences")->restrictOnDelete();
            $table->foreignId("current_employee_id")->constrained("employees")->restrictOnDelete();
            //if external required
            $table->foreignId("out_current_section_id")->nullable()->constrained("section_externals")->restrictOnDelete();
            $table->foreignId("in_employee_id_dest")->nullable()->constrained("employees")->restrictOnDelete();
            $table->foreignId("out_section_id_dest")->nullable()->constrained("section_externals")->restrictOnDelete();
            $table->enum('source_dest_type',['outgoing','incoming','outgoing_to_incoming','incoming_to_outgoing']);
            $table->enum('type',['internal','external']);
            /////////////////////////////////////legal section
            $table->text("legal_opinion")->nullable();
            $table->string("path_file_legal_opinion")->nullable();
            $table->enum("is_legal",["legal","illegal"]);
            ////////////////////////////////////
            $table->text("path_file")->nullable();
            $table->string("notice")->nullable();
            $table->boolean("is_done")->default(false);
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
