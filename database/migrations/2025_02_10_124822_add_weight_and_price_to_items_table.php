<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            if (!Schema::hasColumn('items', 'weight')) {
                $table->bigInteger('weight')->unsigned()->notNull();
            }

            if (!Schema::hasColumn('items', 'price')) {
                $table->bigInteger('price')->unsigned()->notNull();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            if (Schema::hasColumn('items', 'weight')) {
                $table->dropColumn('weight');
            }

            if (Schema::hasColumn('items', 'price')) {
                $table->dropColumn('price');
            }
        });
    }
}


