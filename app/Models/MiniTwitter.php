<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MiniTwitter extends Model
{
    use HasFactory;

    protected $table = "minitwitter";

    protected $fillable = ['nachname', 'vorname', 'email', 'tweet_title', 'tweet_text'];
}
