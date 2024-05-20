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
        Schema::create('dondadat', function (Blueprint $table) {
            $table->id();
            $table->string('dondadat_name');
            $table->string('dondadat_soluong');
            $table->string('dondadat_gia');
            $table->string('dondadat_tongtien');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dondadat');
    }
};
