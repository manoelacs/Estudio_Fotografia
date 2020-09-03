<?php


namespace App\Models;


use phpDocumentor\Reflection\Types\False_;
use \Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['name', 'status'];
    public $timestamps = false;

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }

}
