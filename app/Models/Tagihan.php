<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Laporan;

/**
 * Class Tagihan
 *
 * Model untuk tagihan pembayaran
 */
class Tagihan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'pembayaran_id',
        'status',
    ];

    /**
     * The attributes that are guarded.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The events to listen for.
     *
     * @var array
     */

    protected static function boot()
    {
        parent::boot();

        static::created(function ($tagihan) {
            $laporan = Laporan::create([
                'tagihan_id' => $tagihan->id,
                'bulan' => $tagihan->bulan,
            ]);
        });
    }

    /**
     * Get the user that owns the Tagihan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the laporan that owns the Tagihan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function laporan()
    {
        return $this->hasOne(Laporan::class);
    }
}

