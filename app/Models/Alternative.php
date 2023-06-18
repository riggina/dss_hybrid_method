<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Alternative extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = "alternatives";

    protected $fillable = [
        'alternative_name',
        'slug',
        'alamat',
        'img_url',
        'available_status',
        'latitude',
        'longitude',
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
        'luas_tanah',
        'tipe_rumah',
        'kamar_tidur',
        'kamar_mandi',
        'lebar_jalan'
    ];
    
    protected $guarded = ['id', 'timestamps'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query -> where('alternative_name', 'like', '%' . $search . '%')
            ->orWhere('alamat', 'like', '%' . $search . '%');
        }); 
    }

    public function setTitleAttribute($alternative_name){
        $this->alternative_name = $alternative_name;
        $this->attributes['slug'] = str_slug($this->alternative_name , "-");
    }

    public static function getAlternative($id)
    {
        return Alternative::find($id);
    }

    public function getRouteKeyName() 
    {
        return 'slug';        
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'alternative_name'
            ]
        ];
    }
    
}
 