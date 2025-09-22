<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'uploaded_by', 'title', 'file_path', 'description', 'version'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}
