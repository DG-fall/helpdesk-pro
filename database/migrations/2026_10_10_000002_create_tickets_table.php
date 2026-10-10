<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up(): void { Schema::create('tickets', function (Blueprint $table) { $table->id(); $table->foreignId('user_id')->constrained()->cascadeOnDelete(); $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete(); $table->string('title'); $table->text('description'); $table->string('status')->default('open')->index(); $table->string('priority')->default('normal')->index(); $table->string('category')->default('other'); $table->timestamp('resolved_at')->nullable(); $table->timestamps(); }); } public function down(): void { Schema::dropIfExists('tickets'); } };
