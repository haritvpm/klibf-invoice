<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public $table = 'members';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'constituency',
        'bookfest_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function memberInvoiceLists()
    {
        return $this->hasMany(InvoiceList::class, 'member_id', 'id');
    }

    public function memberSanctionedAmounts()
    {
        return $this->hasMany(SanctionedAmount::class, 'member_id', 'id');
    }

    public function bookfest()
    {
        return $this->belongsTo(BookFest::class, 'bookfest_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
