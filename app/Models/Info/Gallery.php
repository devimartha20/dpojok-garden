<?php

namespace App\Models\Info;

use App\Models\GalleryPicture;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'img',
        'desc',
        'shown',
        'seq',
    ];

    public function galleryPictures(){
        return $this->hasMany(GalleryPicture::class);
    }
}
