<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'month',
        'year',
        'total_sales',
        'total_expenses',
        'profit_before_tax',
        'tax_amount',
        'profit_after_tax'
    ];
    protected $casts = [
        'total_sales' => 'decimal:2',
        'total_expenses' => 'decimal:2',
        'profit_before_tax' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'profit_after_tax' => 'decimal:2'
    ];
}
