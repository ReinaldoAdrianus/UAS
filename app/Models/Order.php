<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ebook;

class Order extends Model
{
    use HasFactory;

    public function book() {
        return $this->hasOne(Ebook::class, 'id', 'ebook_id');
    }
}
