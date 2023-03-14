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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->string('main_img');
            $table->json('images')->nullable();
            $table->time('open_time');
            $table->time('close_time');
            $table->string('slug')->unique();
            $table->enum('price', ['Cheap', 'Regular', 'Expensive']);
            $table->foreignIdFor(\App\Models\Location::class)->constrained();
            $table->foreignIdFor(\App\Models\Cuisine::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
