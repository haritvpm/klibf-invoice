<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    public $table = 'invoice_items';

    protected $dates = [
        'bill_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'publisher_id',
        'amount',
        'bill_number',
        'bill_date',
        'invoice_list_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }

    public function getBillDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBillDateAttribute($value)
    {
        $this->attributes['bill_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function invoice_list()
    {
        return $this->belongsTo(InvoiceList::class, 'invoice_list_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
