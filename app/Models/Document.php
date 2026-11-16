<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public const ICONS = [
        'fa-file-alt'       => 'सामान्य दस्तऐवज',
        'fa-handshake'      => 'MoU / करार',
        'fa-book-open'      => 'घटना / नियमावली',
        'fa-building'       => 'संघटना / स्थापना',
        'fa-file-signature' => 'अर्ज / फॉर्म',
        'fa-gavel'          => 'कायदेशीर / शासन निर्णय',
    ];

    protected $fillable = ['title', 'description', 'icon', 'file', 'pending_label', 'sort_order', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('sort_order')->orderBy('id');
    }

    public function getFileUrlAttribute(): ?string
    {
        return $this->file ? asset('storage/' . $this->file) : null;
    }
}
