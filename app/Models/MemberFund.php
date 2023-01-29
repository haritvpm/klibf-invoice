<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberFund extends Model
{
    use HasFactory;

    public $table = 'member_funds';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'bookfest_id',
        'constituency_id',
        'mla_id',
        'as_amount',
        'as_amount_next',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function memberFundInvoiceLists()
    {
        return $this->hasMany(InvoiceList::class, 'member_fund_id', 'id');
    }

    public function bookfest()
    {
        return $this->belongsTo(BookFest::class, 'bookfest_id');
    }

    public function constituency()
    {
        return $this->belongsTo(Constituency::class, 'constituency_id');
    }

    public function mla()
    {
        return $this->belongsTo(Mla::class, 'mla_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
