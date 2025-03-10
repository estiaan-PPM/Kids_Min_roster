<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kid extends Model {
    use HasFactory;
    protected $table = 'children';

    protected $guarded = [];

    public function guardian(){
        return $this->belongsTo(Guardians::class, "guardians_id");
    }


}