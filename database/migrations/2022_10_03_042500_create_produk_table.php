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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kategori')->unsigned()->nullable()->default(null);
            $table->string('nama', 100)->nullable()->default('text');
            $table->decimal('harga', 15, 2)->nullable()->default(0.00);
            $table->text('deskripsi')->nullable()->default(null);
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
        Schema::dropIfExists('produk');
    }
};
