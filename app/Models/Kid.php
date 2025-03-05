<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kid extends Model {
    use HasFactory;
    protected $table = 'children';

    protected $fillable = ['name','age','allergies'];

    public function guardian(){
        return $this->belongsTo(Guardians::class);
    }
}