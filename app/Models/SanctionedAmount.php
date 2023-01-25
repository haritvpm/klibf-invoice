<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanctionedAmount extends Model
{
    use MultiTenantModelTrait;
    use HasFactory;

    public $table = 'sanctioned_amounts';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'as_amount',
        'created_at',
        'fin_year_id',
        'member_id',
        'book_fest_id',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    public function fin_year()
    {
        return $this->belongsTo(FinancialYear::class, 'fin_year_id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function book_fest()
    {
        return $this->belongsTo(BookFest::class, 'book_fest_id');
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
