<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Alternative extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = "alternatives";

    protected $fillable = [
        'alternative_name',
        'user_id',
        'slug',
        'alamat',
        'contact',
        'img_url',
        'available_status',
        'latitude',
        'longitude',
        'tenor_tahun_cicilan',
        'C1',
        'C2',
        'C3',
        'C4',
        'C5',
        'C6',
        'C7',
        'C8',
        'C9',
        'C10',
        'C11',
        'C12',
        'C13',
        'C14',
        'C15',
        'C16',
        'C17',
        'C18',
        'C19',
        'C20',
    ];
    
    protected $guarded = ['id', 'timestamps'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query -> where('alternative_name', 'like', '%' . $search . '%')
            ->orWhere('alamat', 'like', '%' . $search . '%');
        }); 
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
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
 