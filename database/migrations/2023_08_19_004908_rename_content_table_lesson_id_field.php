<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contents', function (Blueprint $table) {
            #$table->renameColumn('content_id', 'lesson_id');
            $table->dropForeign('contents_content_id_foreign'); // Drop the old foreign key
            $table->foreign('lesson_id')->references('id')->on('lessons'); // Create a new foreign key
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
