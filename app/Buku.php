<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Buku extends Model
{
    public $fillable = ['nama','tahun_terbit','kategori','pinjam'];
}