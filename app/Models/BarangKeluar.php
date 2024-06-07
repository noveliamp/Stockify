<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'obat_id',
        'kategori_id',
        'jumlah',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}
