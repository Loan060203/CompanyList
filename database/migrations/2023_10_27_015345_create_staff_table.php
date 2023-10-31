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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('classification')->unsigned()->default(0);
            $table->string('code', 50);
            $table->string('name', 100);
            $table->string('yomigana', 100)->nullable();
            $table->string('post', 8)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('email')->unique();
            $table->string('tel1', 13)->nullable();
            $table->string('tel2', 13)->nullable();
            $table->string('fax', 13)->nullable();
            $table->string('contact_name', 50)->nullable();
            $table->string('url', 100)->nullable();
            $table->integer('dsp_ord_num')->default(99999);
            $table->text('remark')->nullable();
            $table->boolean('idv_mgmt')->default(1);
            $table->boolean('use_flg')->default(1);
            $table->bigInteger('created_by')->unsigned()->index();
            $table->bigInteger('updated_by')->unsigned()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
