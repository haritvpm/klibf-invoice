<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mla extends Model
{
    use HasFactory;

    public $table = 'mlas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'name_mal',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function mlaMemberFunds()
    {
        return $this->hasMany(MemberFund::class, 'mla_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
