<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToItemsTable extends Migration
{
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            // Добавляем столбцы только если они не существуют
            if (!Schema::hasColumn('items', 'weight')) {
                $table->bigInteger('weight')->unsigned()->notNull();
            }

            if (!Schema::hasColumn('items', 'price')) {
                $table->bigInteger('price')->unsigned()->notNull();
            }
        });
    }

    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            // Убираем столбцы, если они существуют
            if (Schema::hasColumn('items', 'weight')) {
                $table->dropColumn('weight');
            }

            if (Schema::hasColumn('items', 'price')) {
                $table->dropColumn('price');
            }
        });
    }
}

