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

    /*
     * The method checks if there is such an animal assigned to
     * a human with a given id.
     */
    public static function animalExist($owner_id, $name): int
    {
        if (Animal::where('owner_id', $owner_id)->where('name', $name)->count() == 1) {
            return 1;
        } else {
            return 0;
        }
    }
}
