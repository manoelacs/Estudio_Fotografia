<?php


namespace App\Models;



use \App\Models\User;
use \Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['name', 'description', 'max_select_photos', ];
    #public $timestamps = false;
    protected $table = 'albuns';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);

    }
    public function status(){
        return $this->belongsTo(Status::class, 'status_id');
    }
    public function statusName(){
        $status = $this->belongsTo(Status::class, 'status_id');
        return  $status->name;

    }

}
