<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('providers_id')->constrained();
            $table->foreignId('provider_products_id')->constrained();
            $table->foreignId('shopping_requests_id')->constrained();
            $table->foreignId('users_id')->constrained();
            $table->date('supplier_term');
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
        Schema::dropIfExists('cotation');
    }
}
