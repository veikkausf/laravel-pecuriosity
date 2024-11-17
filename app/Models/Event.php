<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // taulu tietokannasta
    protected $table = 'events';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title', 'description', 'image', // Käyttäjän täyttämät tiedot
        'latitude', 'longitude', // Saadaan ip:stä
    ];

    // Täyttää automaattisesti created_at ja updated_at kentät
    public $timestamps = true;
    
}

