<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("description");
            $table->decimal("price",7,2);
            $table->decimal("rent",7,2);
            $table->string("image-1");
            $table->string("image-2");
            $table->string("image-3");
            $table->string("image-4");
            $table->string("image-plan");
            $table->string("bloc");
            $table->string("certificate");
            $table->foreignId('specification_id');
            $table->foreignId('property_id');
            $table->softDeletes();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
