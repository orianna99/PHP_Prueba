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
        Schema::create('doc_documento', function (Blueprint $table) {
            $table->id('DOC_ID');
            $table->string('DOC_NOMBRE');
            $table->string('DOC_CODIGO');
            $table->text('DOC_CONTENIDO');
            $table->unsignedBigInteger('DOC_ID_TIPO');
            $table->unsignedBigInteger('DOC_ID_PROCESO');
            $table->timestamps();

            $table->foreign('DOC_ID_TIPO')->references('TIP_ID')->on('tip_tipo_doc');
            $table->foreign('DOC_ID_PROCESO')->references('PRO_ID')->on('pro_proceso');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doc_documento');
    }
};
