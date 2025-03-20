<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name")->require();
            $table->string("color",20)->require();
            $table->string("size",20)->require();
            $table->integer("baseprice")->require();
            $table->integer("discount")->require();
            $table->integer("finalprice")->require();
            $table->boolean("stock")->nullable(true)->default(true);
            $table->integer("stockquantity")->require();
            $table->text("description")->require();
            $table->boolean("active")->nullable(true)->default(true);

            $table->bigInteger("maincategory_id")->unsigned()->index();
            $table->foreign("maincategory_id")->references("id")->on("maincategories")->onDelete('cascade');

            $table->bigInteger("subcategory_id")->unsigned()->index();
            $table->foreign("subcategory_id")->references("id")->on("subcategories")->onDelete('cascade');

            $table->bigInteger("brand_id")->unsigned()->index();
            $table->foreign("brand_id")->references("id")->on("brands")->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
