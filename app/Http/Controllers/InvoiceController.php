<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;


class InvoiceController extends Controller
{
    public function invoice(Transaction $transaction)
    {
        $customer = new Buyer([
            'name'          => $transaction->customer->name,
            'custom_fields' => [
                'address' => $transaction->customer->address,
                'contact' => $transaction->customer->contact,
                'total' => $transaction->weight * $transaction->laundry->price,
            ],
        ]);

        $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);

        $invoice = Invoice::make()
            ->buyer($customer)
            ->discountByPercent(10)
            ->taxRate(15)
            ->shipping(1.99)
            ->addItem($item);

        return $invoice->stream();
    }

}
