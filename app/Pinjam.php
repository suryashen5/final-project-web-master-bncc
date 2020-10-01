<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Pinjam extends Model
{
    public $fillable = ['id_user','buku_pinjam','id_buku','status'];
}