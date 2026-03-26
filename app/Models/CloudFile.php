<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CloudFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'custom_file_name',
        'uploader_name',
        'description',
        'upload_date',
        'file_path',
        'file_type',
        'file_size',
    ];
}
