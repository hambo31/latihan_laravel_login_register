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
        Schema::create('garansi', function (Blueprint $table) {
            $table->id();
            $table->integer('id_produk')->unsigned()->nullable()->default(null);
            $table->string('garansi', 100)->nullable()->default('text');
            $table->string('created_by', 100)->nullable()->default('text');
            $table->softDeletes();
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
        Schema::dropIfExists('garansi');
    }
};
