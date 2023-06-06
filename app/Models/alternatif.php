<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $fillable = [
        'alternatif_name',
        'slug',
        'alamat',
        'harga_rumah',
        'dp_rumah',
        'cicilan_rumah',
        'jarak_pinggir_kota',
        'jarak_pusat_kota',
        'jarak_jalan_raya',
        'jarak_pusat_perbelanjaan',
        'jarak_tempat_hiburan',
        'jarak_sekolah',
        'sertifikat_rumah',
        'daya_listrik',
        'luas_bangunan',
        'luas_~tanah',
        'tipe_rumah',
        'kamar_tidur',
        'kamar_mandi',
        'lebar_jalan',
        'img_url',
        'available_status',
        'published_at',
        'latitude',
        'longitude'
    ];

    protected $guarded = ['id', 'timestamps'];

    public function users() 
    {
        return $this->hasMany(User::class);
    }

}
 