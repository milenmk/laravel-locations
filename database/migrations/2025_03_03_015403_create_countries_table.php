<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->index();
            $table->string('code')->unique();
            $table->string('phone');
            $table->json('translations')->nullable();
            $table->json('timezones')->nullable();
            $table->char('numeric_code')->nullable();
            $table->char('iso3')->nullable();
            $table->string('nationality')->nullable();
            $table->string('capital')->nullable();
            $table->string('tld')->nullable();
            $table->string('native')->nullable();
            $table->string('region')->nullable();
            $table->string('currency')->nullable();
            $table->string('currency_name')->nullable();
            $table->string('currency_symbol')->nullable();
            $table->string('wikiDataId')->nullable();
            $table->decimal('lat');
            $table->decimal('lng');
            $table->string('emoji')->nullable();
            $table->string('emojiU')->nullable();
            $table->boolean('flag')->default(0)->nullable();
            $table->boolean('is_activated')->default(1)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
