<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    public $table = 'publishers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'name',
        'address',
        'account_no',
        'ifsc',
        'bank_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function publisherInvoiceItems()
    {
        return $this->hasMany(InvoiceItem::class, 'publisher_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
