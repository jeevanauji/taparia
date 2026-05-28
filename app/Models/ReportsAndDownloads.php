<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportsAndDownloads extends Model
{
    use HasFactory;
    
    protected $table = 'reports_and_downloads'; 
    protected $fillable = ['contentType', 'contentName', 'pdfFile', 'isDeleted'];
}
