<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('vehicle', ['car', 'motorcycle']);
            $table->enum('size', ['small', 'medium', 'large']);
            $table->enum('service', ['regular', 'waterless']);
            $table->enum('type', ['exterior', 'interior-and-exterior'])->nullable();
            $table->integer('cost');
            $table->timestamps();
        });

        DB::transaction(
            function() {
                $now = now();
                DB::table('services')->insert([
                    [
                        'id' => 1,
                        'name' => 'Cuci Mobil Large Reguler Interior dan Eksterior',
                        'vehicle' => 'car',
                        'size' => 'large',
                        'service' => 'regular',
                        'type' => 'interior-and-exterior',
                        'cost' => 65000,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'id' => 2,
                        'name' => 'Cuci Mobil Large Reguler Eksterior',
                        'vehicle' => 'car',
                        'size' => 'large',
                        'service' => 'regular',
                        'type' => 'exterior',
                        'cost' => 50000,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'id' => 3,
                        'name' => 'Cuci Mobil Small Reguler Interior dan Eksterior',
                        'vehicle' => 'car',
                        'size' => 'small',
                        'service' => 'regular',
                        'type' => 'interior-and-exterior',
                        'cost' => 55000,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'id' => 4,
                        'name' => 'Cuci Mobil Small Reguler Eksterior',
                        'vehicle' => 'car',
                        'size' => 'small',
                        'service' => 'regular',
                        'type' => 'exterior',
                        'cost' => 40000,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'id' => 5,
                        'name' => 'Cuci Mobil Large Waterless Interior dan Eksterior',
                        'vehicle' => 'car',
                        'size' => 'large',
                        'service' => 'regular',
                        'type' => 'interior-and-exterior',
                        'cost' => 70000,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'id' => 6,
                        'name' => 'Cuci Mobil Large Waterless Eksterior',
                        'vehicle' => 'car',
                        'size' => 'large',
                        'service' => 'regular',
                        'type' => 'exterior',
                        'cost' => 55000,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'id' => 7,
                        'name' => 'Cuci Mobil Small Waterless Interior dan Eksterior',
                        'vehicle' => 'car',
                        'size' => 'small',
                        'service' => 'regular',
                        'type' => 'interior-and-exterior',
                        'cost' => 60000,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'id' => 8,
                        'name' => 'Cuci Mobil Small Waterless Eksterior',
                        'vehicle' => 'car',
                        'size' => 'small',
                        'service' => 'regular',
                        'type' => 'exterior',
                        'cost' => 45000,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'id' => 9,
                        'name' => 'Cuci Motor Small Regular',
                        'vehicle' => 'motorcycle',
                        'size' => 'small',
                        'service' => 'regular',
                        'type' => null,
                        'cost' => 15000,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'id' => 10,
                        'name' => 'Cuci Motor Medium Regular',
                        'vehicle' => 'motorcycle',
                        'size' => 'medium',
                        'service' => 'regular',
                        'type' => null,
                        'cost' => 20000,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'id' => 11,
                        'name' => 'Cuci Motor Large Regular',
                        'vehicle' => 'motorcycle',
                        'size' => 'large',
                        'service' => 'regular',
                        'type' => null,
                        'cost' => 25000,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'id' => 12,
                        'name' => 'Cuci Motor Small Waterless',
                        'vehicle' => 'motorcycle',
                        'size' => 'small',
                        'service' => 'waterless',
                        'type' => null,
                        'cost' => 25000,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'id' => 13,
                        'name' => 'Cuci Motor Medium Waterless',
                        'vehicle' => 'motorcycle',
                        'size' => 'medium',
                        'service' => 'waterless',
                        'type' => null,
                        'cost' => 30000,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'id' => 14,
                        'name' => 'Cuci Motor Large Waterless',
                        'vehicle' => 'motorcycle',
                        'size' => 'large',
                        'service' => 'waterless',
                        'type' => null,
                        'cost' => 35000,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                ]);
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::transaction(
            function() {
                $ids = [];
                for ($i=1; $i <= 14; $i++) {
                    $ids[] = $i;
                }

                DB::table('services')->whereIn('id', $ids)->delete();
            }
        );

        Schema::dropIfExists('services');
    }
}
