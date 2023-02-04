<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    public const PAYMENT_SELECT = [
        'received' => 'Received',
        'pending'  => 'Pending',
        'exempted' => 'Exempted',
        'proposal' => 'Proposal',
    ];

    public $table = 'sales';

    protected $dates = [
        'invoice_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'bookfest_id',
        'publisher_id',
        'invoice_number',
        'invoice_date',
        'payment',
        'remarks',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function invoiceNumberSaleItems()
    {
        return $this->hasMany(SaleItem::class, 'invoice_number_id', 'id')->orderby('id');
    }
    public function invoiceNumberSaleItemsNonZero()
    {
        return $this->hasMany(SaleItem::class, 'invoice_number_id', 'id')->where('quantity','>',0)->orderby('id');
    }

    public function bookfest()
    {
        return $this->belongsTo(BookFest::class, 'bookfest_id');
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }

    public function getInvoiceDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setInvoiceDateAttribute($value)
    {
        $this->attributes['invoice_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
