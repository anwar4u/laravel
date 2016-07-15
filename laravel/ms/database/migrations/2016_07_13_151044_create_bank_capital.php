<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankCapital extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ab_bank_capital', function (Blueprint $table){
           $table->increments('id'); 
           $table->date('date');
           $table->string('category', 40);
           $table->decimal('amount', 10, 2);
           $table->decimal('total_amount', 10, 2);
           $table->Integer('created_by');
           $table->Integer('updated_by');
           $table->enum('deleted', ['0', '1']);
           $table->timestamps('deleted_at');
           $table->string('remarks', 80);
           $table->engine = 'InnoDB';
            
        });
    }

    /**
     * $table->timestamps();
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ab_bank_capital');
    }
}
