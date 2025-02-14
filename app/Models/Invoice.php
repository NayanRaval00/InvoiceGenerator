<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['customer_name', 'customer_address', 'date'];
    
    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
