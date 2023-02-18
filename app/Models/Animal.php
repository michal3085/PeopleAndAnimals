<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'genre', 'owner_id'];

    public function peoples()
    {
        return $this->belongsTo('App\Models\People');
    }

    /*
     * Collecting animals data for people animal list modal
     * on home page.
     */
    public static function myAnimalsData($id)
    {
        return Animal::where('owner_id', $id)->get();
    }
}
