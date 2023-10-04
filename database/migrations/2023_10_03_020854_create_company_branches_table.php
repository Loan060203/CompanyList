<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyBranchesTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('company_branches', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('classification')->unsigned()->default(1);
            $table->bigInteger('company_id')->unsigned()->index();
            $table->bigInteger('district_id')->unsigned()->index();
            $table->string('code', 50);
            $table->string('name', 100);
            $table->string('yomigana', 100)->nullable();
            $table->text('std_payment')->nullable();
            $table->string('tax_classify', 100)->nullable();
            $table->integer('dsp_ord_num')->default(99999);
            $table->text('remark')->nullable();
            $table->boolean('idv_mgmt')->default(1);
            $table->boolean('use_flg')->default(1);
            $table->bigInteger('created_by')->unsigned()->index();
            $table->bigInteger('updated_by')->unsigned()->index();

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
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
        Schema::dropIfExists('company_branches');
    }
};
