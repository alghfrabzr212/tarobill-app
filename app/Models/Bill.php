<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_tagihan',
        'harga',
        'tanggal_jatuh_tempo',
        'status',
        'email_reminder_sent_at', // <<< PASTIKAN INI ADA
    ];

    protected $casts = [
        'tanggal_jatuh_tempo' => 'date',
        'email_reminder_sent_at' => 'datetime', // <<< PASTIKAN INI ADA
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}