<?php

use App\Model\v1\mpesa\Mpesa;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMpesasTable extends Migration
{

    public function up()
    {
        Schema::create('mpesas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('payment_id')->unsigned()->index()->nullable();
            $table->tinyInteger('status')->default(Mpesa::STATUS_PENDING);
            $table->string('transaction_number');
            $table->string('transaction_time');
            $table->float('amount');
            $table->integer('OrgAccountBalance');
            $table->string('short_code');
            $table->string('bill_reference');
            $table->string('mobile_number');
            $table->string('payer_first_name')->nullable();
            $table->string('payer_middle_name')->nullable();
            $table->string('payer_last_name')->nullable();
            $table->timestamps();

            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mpesas');
    }
}
