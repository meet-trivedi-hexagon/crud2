<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class product extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file_path');
            $table->integer('qty');
            $table->float('price');
            $table->float('total');
            
            
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
