<?php

namespace Modules\Car\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\SlugOptions;
use Spatie\Sluggable\HasSlug;

class Car extends BaseModel
{
    use HasFactory;
    use SoftDeletes;
    use HasSlug;

    protected $table = 'cars';

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Car\database\factories\CarFactory::new();
    }
}
