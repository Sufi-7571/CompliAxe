<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = [
        'scan_id',
        'type',
        'severity',
        'description',
        'selector',
        'fix_suggestion',
    ];

    // Relationships
    public function scan()
    {
        return $this->belongsTo(Scan::class);
    }
}
