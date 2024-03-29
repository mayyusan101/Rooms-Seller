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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('beds');
            $table->unsignedTinyInteger('baths');
            $table->unsignedSmallInteger('area');

            $table->tinyText('city');
            $table->tinyText('code');
            $table->tinyText('street');
            $table->tinyText('street_no');
            $table->unsignedInteger('price');
            $table->timestamps();

            // $table->foreign('user_id',)->reference('id')->on('users')
            $table->foreignIdFor(\App\Models\User::class, 'user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete(); // self referencing foreignId
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('listings');
        Schema::dropColumns('listings', [
            'beds', 'baths', 'area', 'city', 'code', 'street', 'street_no', 'price', 'user_id'
        ]);
    }
};
