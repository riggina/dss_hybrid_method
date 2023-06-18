<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AlternativeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'alternative_name' => fake()->word(),
            'slug' => fake()->word(),
            'alamat' => fake() -> sentence(),
            'img_url' => fake() -> imageUrl(640, 480, 'animals', true),
            'available_status' => fake() -> boolean(),
            'latitude' => fake() -> randomFloat(1, 20, 30),
            'longitude' => fake() -> randomFloat(1, 20, 30),
            'harga_rumah' => fake() -> randomFloat(1, 20, 30),
            'dp_rumah' => fake() -> randomFloat(1, 20, 30),
            'cicilan_rumah' => fake() -> randomDigitNotNull(),
            'jarak_pinggir_kota' => fake() -> randomFloat(1, 20, 30),
            'jarak_pusat_kota' => fake() -> randomFloat(1, 20, 30),
            'jarak_jalan_raya' => fake() -> randomFloat(1, 20, 30),
            'jarak_pusat_perbelanjaan' => fake() -> randomFloat(1, 20, 30),
            'jarak_tempat_hiburan' => fake() -> randomFloat(1, 20, 30),
            'jarak_sekolah' => fake() -> randomFloat(1, 20, 30),
            'sertifikat_rumah' => fake() -> randomDigitNotNull(),
            'daya_listrik' => fake() -> randomFloat(1, 20, 30),
            'luas_bangunan' => fake() -> randomFloat(1, 20, 30),
            'luas_tanah' => fake() -> randomFloat(1, 20, 30),
            'tipe_rumah' => fake() -> randomDigitNotNull(),
            'kamar_tidur' => fake() -> randomDigitNotNull(),
            'kamar_mandi' => fake() -> randomDigitNotNull(),
            'lebar_jalan' => fake() -> randomFloat(1, 20, 30),
        ];
    }
}
