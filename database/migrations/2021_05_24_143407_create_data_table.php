<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id', 50);
            $table->integer('tool_number');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->date('date');
            $table->decimal('bat_percentage', 5, 2);
            $table->date('import_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data');
    }
}
