<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Annonce extends Model
{
    use HasFactory;



    protected $fillable = [
        'user_id', 'titre', 'description', 'prix', 'categorie', 'statu'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function favoris(): HasMany
    {
        return $this->hasMany(Favoris::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }
    public function isFavoritedByUser($userId): bool
    {
        return $this->favoris()->where('user_id', $userId)->exists();
    }


}



