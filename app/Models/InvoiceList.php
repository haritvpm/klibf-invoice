<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceList extends Model
{
    use MultiTenantModelTrait;
    use HasFactory;

    public const INSTITUTION_TYPE_RADIO = [
        'library'     => 'Library',
        'gov_school'  => 'Govt School',
        'gov_college' => 'Govt College',
        'aid_school'  => 'Aided School',
        'aid_college' => 'Aided College',
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
        'bookfest_id',
        'created_by_id',
    ];

    public function invoiceListInvoiceItems()
    {
        return $this->hasMany(InvoiceItem::class, 'invoice_list_id', 'id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function bookfest()
    {
        return $this->belongsTo(BookFest::class, 'bookfest_id');
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
