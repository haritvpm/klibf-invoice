<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceList extends Model
{
    use HasFactory;

    public const INSTITUTION_TYPE_RADIO = [
        'library' => 'Library',
        'school'  => 'School',
        'college' => 'College',
    ];

    public $table = 'invoice_lists';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'number',
        'institution_type',
        'institution_name',
        'amount_allotted',
        'remarks',
        'member_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function invoiceListInvoiceItems()
    {
        return $this->hasMany(InvoiceItem::class, 'invoice_list_id', 'id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
