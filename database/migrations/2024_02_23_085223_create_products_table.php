<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   // migration create_products_table.php

public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('product_category_id');
        $table->text('description');
        $table->decimal('price', 10, 2);
        $table->integer('stock');
        $table->string('status');
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
