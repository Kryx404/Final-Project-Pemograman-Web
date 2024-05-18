<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pembayaran;


class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nominal',
        'status',
    ];


    protected $guarded = ['id'];


    public function User()
    {
        return $this->belongsTo(User::class);
    }
}

// Kemudian untuk mengambil nama pengguna dari pembayaran
// $pembayaran = Pembayaran::find($id);
// $namaPengguna = $pembayaran->user->nama;
