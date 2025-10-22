<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Filament\Support\Tiptap;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'body',
        'location',
        'target_trees',
        'cost_per_tree',
        'partner_name',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'body' => 'array',
        ];
    }

    // protected function bodyHtml(): Attribute
    // {
    //     return Attribute::get(
    //         fn() => TiptapConverter::from($this->body)->toHtml(),
    //     );
    // }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function projectUpdates()
    {
        return $this->hasMany(ProjectUpdate::class)->latest();
    }
}
