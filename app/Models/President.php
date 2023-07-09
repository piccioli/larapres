<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class President extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['abstract','wikipedia_url'];

}
