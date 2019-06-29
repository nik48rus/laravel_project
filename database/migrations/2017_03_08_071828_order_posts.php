<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {

            /*Адрес где взять товар -> addr_from_country, addr_from_area, addr_from_city, addr_from_street, addr_from_house, addr_from_flat   
            Адрес куда переместить товар -> addr_to_country, addr_to_area, addr_to_city, addr_to_street, addr_to_house, addr_to_flat 
            До какого времени доставить -> to_date to_time
            Тип товара -> type_goods
            Тип транспортировки -> type_transp
            Вес товара -> weight
            Сколько заплатят -> paid*/

          $table->increments('id');

          $table->string('addr_from_country');
          $table->string('addr_from_area');
          $table->string('addr_from_city');
          $table->string('addr_from_street');
          $table->string('addr_from_house');
          $table->string('addr_from_flat');

          $table->string('addr_to_country');
          $table->string('addr_to_area');
          $table->string('addr_to_city');
          $table->string('addr_to_street');
          $table->string('addr_to_house');
          $table->string('addr_to_flat');

          $table->nullableTimestamps('to_date_time');
          $table->string('type_goods');
          $table->string('type_transp');
          $table->decimal('weight', 9, 2);
          $table->decimal('paid', 19, 2);

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
}
