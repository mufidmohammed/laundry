<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransactionExport implements FromCollection, WithHeadings
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $query = Transaction::query()
            ->when($this->startDate && $this->endDate, function ($query) {
                return $query->whereBetween('created_at', [$this->startDate, $this->endDate]);
            })
            ->with('laundry', 'customer', 'employee')
            ->latest();

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'Customer Name',
            'Employee Name',
            'Laundry Type',
            'Weight',
            'Total',
            'Order Date',
            'Finish Date',
            'Created_at',
            'Updated_at'
        ];
    }

    public function map($transaction): array
    {
        return [
            $transaction->customer->name,
            $transaction->employee->name,
            $transaction->laundry->type,
            $transaction->weight,
            $transaction->laundry->price * $transaction->weight,
            $transaction->order_date,
            $transaction->finish_date,
            Carbon::parse($transaction->created_at)->format('Y-m-d'),
            Carbon::parse($transaction->updated_at)->format('Y-m-d'),
        ];
    }
}
