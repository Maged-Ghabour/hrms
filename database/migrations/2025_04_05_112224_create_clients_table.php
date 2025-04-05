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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_name')->nullable()->comment('اسم العميل');
            $table->string('client_phone')->nullable()->comment('رقم الهاتف للعميل');
            $table->string('storeName_ar')->nullable();
            $table->string('storeName_en')->nullable();
            $table->string('store_category')->nullable();
            $table->string('store_rate')->nullable();
            $table->string('store_image')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('clients');
    }
};
