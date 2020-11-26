<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscLoaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('cusc_loai', function(Blueprint $table){
            $table->engine ='InnoDB';
            $table->unsignedTinyInteger('l_ma')->autoIncrement()->comment('Mã loại sản phẩm');
            $table->string('l_ten',50)->comment('Tên loại # tên loại sản phẩm');
            $table->timestamp('l_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm tạo sản phẩm');
            $table->timestamp('l_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật sản phẩm gần nhất');
            $table->tinyInteger('l_trangThai')->default('2')->comment('Trạng thái # Trạng thái loại sản phẩm: 1-Khóa , 2-Khả dụng');
            $table->unique(['l_ten']); // ràng buộc l_ten là duy nhất



        });
        DB::statement("ALTER TABLE `cusc_loai` comment 'Loại sản phẩm # Loại sản phẩm'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    //  hàm down cho phép người dùng undo lại 
    public function down()
    {
        //
        Schema::drop('cusc_loai');
    }
}
