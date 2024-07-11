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
        Schema::table('images', function (Blueprint $table) {
            $table->foreignID('book_id')->constrained();
        });
        Schema::table('books', function (Blueprint $table) {
            $table->foreignID('author_id')->constrained();
            $table->foreignID('category_id')->constrained();
        });
        Schema::table('favoritebooks', function (Blueprint $table) {
            $table->foreignID('book_id')->constrained();
            $table->foreignID('user_id')->constrained();
        });
        Schema::table('reviews', function (Blueprint $table) {
            $table->foreignID('book_id')->constrained();
            $table->foreignID('user_id')->constrained();
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->foreignID('book_id')->constrained();
            $table->foreignID('user_id')->constrained();
        });
        Schema::table('invoice_details', function (Blueprint $table) {
            $table->foreignID('invoice_id')->constrained();
            $table->foreignID('book_id')->constrained();
        });
        Schema::table('invoices', function (Blueprint $table) {
            $table->foreignID('user_id')->constrained();
        });
        Schema::table('carts', function (Blueprint $table) {
            $table->foreignID('book_id')->constrained();
            $table->foreignID('user_id')->constrained();
        });
        Schema::table('payments', function (Blueprint $table) {
            $table->foreignID('invoices_id')->constrained();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
