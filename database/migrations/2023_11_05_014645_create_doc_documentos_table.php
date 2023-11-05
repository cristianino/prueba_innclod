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
        Schema::create('DOC_DOCUMENTO', function (Blueprint $table) {
            $table->increments('DOC_ID');
            $table->string('DOC_NOMBRE', 50);
            $table->unsignedInteger('DOC_ID_TIPO');
            $table->unsignedInteger('DOC_ID_PROCESO');
            $table->timestamps();

            $table->foreign('DOC_ID_TIPO')->references('TIP_ID')->on('TIP_TIPO_DOC');
            $table->foreign('DOC_ID_PROCESO')->references('PRO_ID')->on('PRO_PROCESO');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('DOC_DOCUMENTO', function (Blueprint $table) {
            $table->dropForeign(['DOC_ID_TIPO', 'DOC_ID_PROCESO']);
        });
        Schema::dropIfExists('DOC_DOCUMENTO');
    }
};
