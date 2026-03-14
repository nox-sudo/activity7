<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_key', 20)->unique();
            $table->string('title', 200);
            $table->string('cover', 255)->nullable();
            $table->text('content')->nullable();
            $table->text('didactic_material')->nullable();
            $table->foreignId('kit_id')
                  ->constrained('robotics_kits')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
