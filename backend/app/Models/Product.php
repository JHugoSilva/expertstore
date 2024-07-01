<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ramsey\Uuid\Type\Integer;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price'
    ];

    protected $appends = ['price_float'];

    protected $casts = [
        'created_at' => 'date:d/m'
    ];

    public function photos(): HasMany {
        return $this->hasMany(ProductPhoto::class);
    }

    protected function priceFloat():Attribute {
        return new Attribute(
            get: fn($price)=> $this->attributes['price'] / 100
        );
    }

    public function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Undocumented function
     * USO GLOBAL
     * @param DateTimeInterface $date
     * @return void
     */
    // protected function serializeDate(DateTimeInterface $date) {
    //     return $date->format('d/m/Y');
    // }

    // public function getPriceAttribute() {
    //     return $this->attributes['price'] / 100;
    // }
}
