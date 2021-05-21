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
            $table->string('slug');
            $table->enum('vehicle', ['car', 'motorcycle']);
            $table->enum('size', ['small', 'medium', 'large']);
            $table->enum('service', ['regular', 'waterless']);
            $table->enum('type', ['exterior', 'interior-and-exterior'])->nullable();
            $table->integer('cost');
            $table->string('image');
            $table->text('description');
            $table->timestamps();
        });

        DB::transaction(
            function() {
                $now = now();
                DB::table('services')->insert([
                    [
                        'id' => 1,
                        'name' => 'Cuci Mobil Large Reguler Interior dan Eksterior',
                        'slug' => 'cuci-mobil-large-reguler-interior-dan-eksterior',
                        'vehicle' => 'car',
                        'size' => 'large',
                        'service' => 'regular',
                        'type' => 'interior-and-exterior',
                        'cost' => 65000,
                        'image' => 'landing/images/fix/layanan/h.png',
                        'description' => 'Layanan Cuci Wash & Wax Eksterior dan Interior Mobil dengan metode pencucian menggunakan air (reguler) untuk mobil yang besar.',
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'id' => 2,
                        'name' => 'Cuci Mobil Large Reguler Eksterior',
                        'slug' => 'cuci-mobil-large-reguler-eksterior',
                        'vehicle' => 'car',
                        'size' => 'large',
                        'service' => 'regular',
                        'type' => 'exterior',
                        'cost' => 50000,
                        'image' => 'landing/images/fix/layanan/g.png',
                        'description' => 'Layanan Cuci Wash & Wax Eksterior Mobil dengan metode pencucian menggunakan air (reguler) untuk mobil yang besar.',
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'id' => 3,
                        'name' => 'Cuci Mobil Small Reguler Interior dan Eksterior',
                        'slug' => 'cuci-mobil-small-reguler-interior-dan-eksterior',
                        'vehicle' => 'car',
                        'size' => 'small',
                        'service' => 'regular',
                        'type' => 'interior-and-exterior',
                        'cost' => 55000,
                        'image' => 'landing/images/fix/layanan/b.png',
                        'description' => 'Layanan Cuci Wash & Wax Eksterior dan Interior Mobil dengan metode pencucian tanpa menggunakan air (waterless) untuk mobil yang kecil.',
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'id' => 4,
                        'name' => 'Cuci Mobil Small Reguler Eksterior',
                        'slug' => 'cuci-mobil-small-reguler-eksterior',
                        'vehicle' => 'car',
                        'size' => 'small',
                        'service' => 'regular',
                        'type' => 'exterior',
                        'cost' => 40000,
                        'image' => 'landing/images/fix/layanan/a.png',
                        'description' => 'Layanan Cuci Wash & Wax Eksterior Mobil dengan metode pencucian menggunakan air (reguler) untuk mobil yang kecil.',
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'id' => 5,
                        'name' => 'Cuci Mobil Large Waterless Interior dan Eksterior',
                        'slug' => 'cuci-mobil-large-waterless-interior-dan-eksterior',
                        'vehicle' => 'car',
                        'size' => 'large',
                        'service' => 'regular',
                        'type' => 'interior-and-exterior',
                        'cost' => 70000,
                        'image' => 'landing/images/fix/layanan/k.png',
                        'description' => 'Layanan Cuci Wash & Wax Eksterior dan Interior Mobil dengan metode pencucian tanpa menggunakan air (waterless) untuk mobil yang besar.',
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'id' => 6,
                        'name' => 'Cuci Mobil Large Waterless Eksterior',
                        'slug' => 'cuci-mobil-large-waterless-eksterior',
                        'vehicle' => 'car',
                        'size' => 'large',
                        'service' => 'regular',
                        'type' => 'exterior',
                        'cost' => 55000,
                        'image' => 'landing/images/fix/layanan/j.png',
                        'description' => 'Layanan Cuci Wash & Wax Eksterior Mobil dengan metode pencucian tanpa menggunakan air (waterless) untuk mobil yang besar.',
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'id' => 7,
                        'name' => 'Cuci Mobil Small Waterless Interior dan Eksterior',
                        'slug' => 'cuci-mobil-small-waterless-interior-dan-eksterior',
                        'vehicle' => 'car',
                        'size' => 'small',
                        'service' => 'regular',
                        'type' => 'interior-and-exterior',
                        'cost' => 60000,
                        'image' => 'landing/images/fix/layanan/c.png',
                        'description' => 'Layanan Cuci Wash & Wax Eksterior dan Interior Mobil dengan metode pencucian tanpa menggunakan air (waterless) untuk mobil yang kecil.',
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'id' => 8,
                        'name' => 'Cuci Mobil Small Waterless Eksterior',
                        'slug' => 'cuci-mobil-small-waterless-eksterior',
                        'vehicle' => 'car',
                        'size' => 'small',
                        'service' => 'regular',
                        'type' => 'exterior',
                        'cost' => 45000,
                        'image' => 'landing/images/fix/layanan/d.png',
                        'description' => 'Layanan Cuci Wash & Wax Eksterior Mobil dengan metode pencucian tanpa menggunakan air (waterless) untuk mobil yang kecil.',
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'id' => 9,
                        'name' => 'Cuci Motor Small Regular',
                        'slug' => 'cuci-motor-small-regular',
                        'vehicle' => 'motorcycle',
                        'size' => 'small',
                        'service' => 'regular',
                        'type' => null,
                        'cost' => 15000,
                        'image' => 'landing/images/fix/layanan/e.png',
                        'description' => 'Layanan Cuci Wash & Wax  Motor dengan metode pencucian menggunakan air (reguler) untuk motor yang kecil dengan maks 125 cc.',
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'id' => 10,
                        'name' => 'Cuci Motor Medium Regular',
                        'slug' => 'cuci-motor-medium-regular',
                        'vehicle' => 'motorcycle',
                        'size' => 'medium',
                        'service' => 'regular',
                        'type' => null,
                        'cost' => 20000,
                        'image' => 'landing/images/fix/layanan/l.png',
                        'description' => 'Layanan Cuci Wash & Wax Motor dengan metode pencucian tanpa menggunakan air (reguler) untuk motor yang sedang dengan maks 150 cc.',
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'id' => 11,
                        'name' => 'Cuci Motor Large Regular',
                        'slug' => 'cuci-motor-large-regular',
                        'vehicle' => 'motorcycle',
                        'size' => 'large',
                        'service' => 'regular',
                        'type' => null,
                        'cost' => 25000,
                        'image' => 'landing/images/fix/layanan/n.png',
                        'description' => 'Layanan Cuci Wash & Wax Motor dengan metode pencucian menggunakan air (reguler) untuk motor yang besar dengan maks 250 cc.',
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'id' => 12,
                        'name' => 'Cuci Motor Small Waterless',
                        'slug' => 'cuci-motor-small-waterless',
                        'vehicle' => 'motorcycle',
                        'size' => 'small',
                        'service' => 'waterless',
                        'type' => null,
                        'cost' => 25000,
                        'image' => 'landing/images/fix/layanan/f.png',
                        'description' => 'Layanan Cuci Wash & Wax Motor dengan metode pencucian tanpa menggunakan air (waterless) untuk motor yang kecil dengan maks 125 cc.',
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'id' => 13,
                        'name' => 'Cuci Motor Medium Waterless',
                        'slug' => 'cuci-motor-medium-waterless',
                        'vehicle' => 'motorcycle',
                        'size' => 'medium',
                        'service' => 'waterless',
                        'type' => null,
                        'cost' => 30000,
                        'image' => 'landing/images/fix/layanan/m.png',
                        'description' => 'Layanan Cuci Wash & Wax Motor dengan metode pencucian tanpa menggunakan air (waterless) untuk motor yang sedang dengan maks 150 cc.',
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'id' => 14,
                        'name' => 'Cuci Motor Large Waterless',
                        'slug' => 'cuci-motor-large-waterless',
                        'vehicle' => 'motorcycle',
                        'size' => 'large',
                        'service' => 'waterless',
                        'type' => null,
                        'cost' => 35000,
                        'image' => 'landing/images/fix/layanan/o.png',
                        'description' => 'Layanan Cuci Wash & Wax Motor dengan metode pencucian menggunakan tanpa menggunakan air (waterless) untuk motor yang besar dengan maks 250 cc.',
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
