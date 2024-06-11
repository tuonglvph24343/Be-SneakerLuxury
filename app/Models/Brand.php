<?php

namespace App\Models;

<<<<<<< feature/layout_client
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
>>>>>>> master

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
<<<<<<< feature/layout_client

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
=======
>>>>>>> master
}
