<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'id', 'title', 'author'
    ];

    /**
     * Get the searchable array for the model.
     *
     * @return array
     */
    public function toSearchableArray(): array
    {
        $array = $this->toArray();

        return [
            'id' => $array['id'],
            'title' => $array['title'],
            'author' => $array['author']
        ];
    }
}
