<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->increments('id');
  $table->text("payment_method")->nullable(); 
  $table->text("rider_id")->nullable(); 
  $table->text("customer_id")->nullable(); 
  $table->text("amount")->nullable(); 
  $table->text("trip_id")->nullable(); 



            $table->text("by_user_id")->nullable();

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
        Schema::dropIfExists('wallets');
    }
}




            