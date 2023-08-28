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
        // Remove the foreign key constraint
        try {
            Schema::table('contents', function (Blueprint $table) {
                $table->dropForeign(['lesson_id']);
            });
        } catch (\Throwable $e) {
            // This block will execute if dropping the foreign key fails
            print("skipped");
        }

        try {

            // Perform your column renaming and other changes
            Schema::table('contents', function (Blueprint $table) {
                $table->renameColumn('lesson_id', 'course_id');
            });
        } catch (\Throwable $e) {
            // This block will execute if dropping the foreign key fails
            print("skipped");
        }
        try {
                // Add the foreign key constraint back
                Schema::table('contents', function (Blueprint $table) {
                    $table->foreign('course_id')->references('id')->on('courses');
                });
            } catch (\Throwable $e) {
                // This block will execute if dropping the foreign key fails
                print("skipped");
            }

        Schema::dropIfExists('lessons');
        Schema::dropIfExists('trix_attachments');
        Schema::dropIfExists('trix_rich_texts');
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
