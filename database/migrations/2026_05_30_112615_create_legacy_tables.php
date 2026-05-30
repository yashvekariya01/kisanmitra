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
        Schema::create('apmc_members', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 100);
            $table->enum('role', ['Farmer', 'Company', 'Chairman', 'Member']);
            $table->string('contact', 100)->nullable();
            $table->dateTime('joined')->useCurrent();
        });

        Schema::create('apmc_products', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 100);
            $table->decimal('old_price', 10, 2);
            $table->decimal('new_price', 10, 2);
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('crops', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('farmer_username', 50);
            $table->string('crop_name', 100);
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->enum('status', ['available', 'sold'])->default('available');
            $table->timestamp('created_at')->useCurrent();
        });

        Schema::create('login_users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('fullname', 100)->default('');
            $table->string('username', 50);
            $table->string('email', 100)->unique();
            $table->string('password', 255);
            $table->enum('role', ['farmer', 'buyer']);
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('buyer_username', 50);
            $table->integer('crop_id');
            $table->string('crop_name', 100);
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->decimal('total', 10, 2);
            $table->timestamp('order_date')->useCurrent();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('username', 50)->unique();
            $table->string('password', 255);
            $table->enum('role', ['farmer', 'buyer', 'admin']);
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apmc_members');
        Schema::dropIfExists('apmc_products');
        Schema::dropIfExists('crops');
        Schema::dropIfExists('login_users');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('users');
    }
};
