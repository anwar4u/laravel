<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAbBankCapital extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function __construct() {
        DB::getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
    }

    public function up() {

        Schema::table('ab_bank_capital', function ($table) {
            $table->string('category', 50)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

        Schema::table('ab_bank_capital', function ($table) {
            $table->string('category', 40)->change();
        });
        /*
          if (Schema::hasTable('ab_bank_capital')) {
          Schema::dropIfExists('ab_bank_capital');

          Schema::create('ab_bank_capital', function (Blueprint $table) {
          $table->increments('id');
          $table->date('date');
          $table->string('category', 20);
          $table->decimal('amount', 10, 2);
          $table->decimal('total_amount', 10, 2);
          $table->timestamps('created_at');
          $table->timestamps('updated_at');
          $table->tinyinteger('created_by');
          $table->tinyinteger('updated_by');
          $table->enum('deleted', ['0', '1']);
          $table->softDeletes('deleted_at');
          $table->string('remarks', 80);
          $table->engine = 'InnoDB';
          });
          } */
    }

}
