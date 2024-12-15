<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'facebook_link',
        'twitter_link',
        'telegram_link',
        'whatsapp_link',
        'youtube_link',
        'phone_number',
        'call_number',
        'email',
        'address',
        'yeras_of_experience',
        'total_clients',
        'rmg_sector',
    ];
}
