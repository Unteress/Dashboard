<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('indicators', function (Blueprint $table) {
            $table->id();
            $table->string('dimension');
            $table->decimal('average', 8, 2);
            $table->text('diagnosis');
            $table->string('simulated_indicator');
            $table->string('author');
            $table->enum('priority', ['Alta', 'Media', 'Baja']);
            $table->text('recommendation');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('indicators');
    }
};
