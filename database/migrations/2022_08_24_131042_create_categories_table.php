<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); //主鍵
            $table->bigInteger('parent_id')->nullable()->unsigned()->index(); //父分類
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('title',100); //分類名稱
            $table->string('pic',255)->nullable(); //分類圖片
            $table->string('desc',500)->nullable(); //分類描述
            $table->boolean('enabled')->default(true);//是否啟動
            $table->integer('sort')->default(0); //排序
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
        Schema::table('categories', function(Blueprint $table)
        {
            $table->dropForeign(['parent_id']);
        });
        Schema::dropIfExists('categories');
    }
};
