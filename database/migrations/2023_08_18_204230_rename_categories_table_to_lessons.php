<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameCategoriesTableToLessons extends Migration
{
    public function up()
    {
        Schema::rename('categories', 'lessons');
     }

    public function down()
    {
        Schema::rename('lessons', 'categories');
    }
}
