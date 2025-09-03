<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_name',
        'website',
        'email',
        'phone_number',
        'address',
        'invoice_number',
        'reference',
        'amount',
        'subject',
        'invoice_date',
        'due_date',
        'invoice_template_id',
        'user_id',
        'status',
    ];

    /**
     * Get the user that owns the invoice.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the invoice template associated with the invoice.
     */
    public function invoiceTemplate(): BelongsTo
    {
        // Assuming you will create a model for invoice templates later
        return $this->belongsTo(InvoiceTemplate::class);
    }

    /**
     * Get the client that the invoice belongs to.
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
