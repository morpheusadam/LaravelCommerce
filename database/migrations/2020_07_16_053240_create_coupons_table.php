<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->enum('type',['fixed','percent'])->default('fixed');
            $table->decimal('value',20,2);
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->timestamps();
        });

        $data = [
            [
                'code' => 'abc123',
                'type' => 'fixed',
                'value' => '300',
                'status' => 'active'
            ],
            [
                'code' => '111111',
                'type' => 'percent',
                'value' => '10',
                'status' => 'active'
            ],
        ];

        DB::table('coupons')->insert($data);
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
