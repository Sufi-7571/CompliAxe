<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'website_id',
        'issues',
        'wsag_level',
        'score',
    ];

    protected $casts = [
        'issues' => 'array',
    ];

    // Relationships
    public function website(){
        return $this->belongsTo(Website::class);
    }

    public function logs(){
        return $this->hasMany(ReportLog::class);
    }
}
