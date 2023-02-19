<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $with = ['reason'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }

    public function reason()
    {
        return $this->belongsTo(ReportReason::class,'report_reason_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
