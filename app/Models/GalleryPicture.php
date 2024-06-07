<?php

namespace App\Models;

use App\Models\Info\Gallery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryPicture extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function gallery(){
        return $this->belongsTo(Gallery::class);
    }
}
