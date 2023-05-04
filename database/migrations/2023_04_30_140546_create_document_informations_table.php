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
        Schema::create('document_informations', function (Blueprint $table) {
            $table->id();
            #Add Columns
            $table->foreignId("contacts_id")->constrained("contacts")->cascadeOnDelete();
            $table->enum("document_type",["family_card","identification","passport"]);
            $table->bigInteger("document_number");
            $table->string("document_path");
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
        Schema::dropIfExists('document_informations');
    }
};
