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
            $table->char('iso3')->nullable();
            $table->char('iso2')->nullable();
            $table->char('numeric_code')->nullable();
            $table->string('phonecode')->nullable();
            $table->string('currency')->nullable();
            $table->string('currency_name')->nullable();
            $table->string('currency_symbol')->nullable();
            $table->string('tld')->nullable();
            $table->string('native_name')->nullable();
            $table->decimal('latitude');
            $table->decimal('longitude');
            $table->string('emoji')->nullable();
            $table->string('emojiU')->nullable();
            $table->boolean('is_activated')->default(1)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
