<?php

use App\Http\Enums\RoleEnum;
use App\Http\Enums\StatusUserEnum;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('social_id')->nullable();
            $table->string('email')->unique();
            $table->boolean('is_active')->default(StatusUserEnum::nonActive);
            $table->dateTime('duration')->default(now()->addDays(2));
            $table->foreignId('role_id')->default(3)->constrained('roles');
            $table->string('password')->default(bcrypt('12345678'));
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
