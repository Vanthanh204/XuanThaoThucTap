<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id('adminID');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('fullname')->nullable();
            $table->timestamps();
        });

        Schema::create('tours', function (Blueprint $table) {
            $table->id('tourID');
            $table->string('title');
            $table->string('diemden')->nullable();
            $table->string('mien')->nullable(); // Bac, Trung, Nam
            $table->string('hinh')->nullable();
            $table->string('thoigian')->nullable();
            $table->decimal('gia_nguoiLon', 15, 2)->default(0);
            $table->decimal('gia_emBe', 15, 2)->default(0);
            $table->integer('socho')->default(0);
            $table->integer('tinhkhadung')->default(1);
            $table->timestamps();
        });

        Schema::create('image', function (Blueprint $table) {
            $table->id('imageID');
            $table->foreignId('tourID');
            $table->string('imgurl');
            $table->timestamps();
        });

        Schema::create('timeline', function (Blueprint $table) {
            $table->id('timelineID');
            $table->foreignId('tourID');
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });

        Schema::create('booking', function (Blueprint $table) {
            $table->id('bookingID');
            $table->foreignId('tourID');
            $table->foreignId('userID')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->integer('adult_count')->default(1);
            $table->integer('child_count')->default(0);
            $table->decimal('total_price', 15, 2)->default(0);
            $table->string('status')->default('pending'); // pending, confirmed, cancelled
            $table->timestamp('booking_date')->useCurrent();
            $table->timestamps();
        });

        Schema::create('hoadon', function (Blueprint $table) {
            $table->id('hoadonID');
            $table->string('mahoadon')->unique()->nullable();
            $table->foreignId('bookingID');
            $table->decimal('tongtien', 15, 2)->default(0);
            $table->timestamp('ngayTT')->nullable();
            $table->string('trangthai')->default('unpaid'); // unpaid, paid
            $table->timestamps();
        });

        Schema::create('thanhtoan', function (Blueprint $table) {
            $table->id('thanhtoanID');
            $table->foreignId('bookingID');
            $table->decimal('giatien', 15, 2);
            $table->string('trangthai')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thanhtoan');
        Schema::dropIfExists('hoadon');
        Schema::dropIfExists('booking');
        Schema::dropIfExists('timeline');
        Schema::dropIfExists('image');
        Schema::dropIfExists('tours');
        Schema::dropIfExists('admin');
    }
};
