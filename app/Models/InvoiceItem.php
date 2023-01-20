<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use MultiTenantModelTrait;
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
        'gross',
        'discount',
        'invoice_list_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    public function invoice_list()
    {
        return $this->belongsTo(InvoiceList::class, 'invoice_list_id');
    }

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

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
