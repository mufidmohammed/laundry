<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Transaction;
use App\Exports\TransactionExport;
use Maatwebsite\Excel\Facades\Excel;

class Report extends Component
{
    public $startDate;
    public $endDate;

    public $start;
    public $end;

    public function export()
    {
        $fileName = 'transactions.xlsx';
        $export = new TransactionExport($this->start, $this->end);

        return Excel::download($export, $fileName);
    }

    public function render()
    {
        $this->parseDates();

        $transactions = Transaction::query()
            ->when($this->start, function ($query) {
                return $query->whereDate('order_date', '>=', $this->start);
            })
            ->when($this->end, function($query) {
                return $query->whereDate('finish_date', '<=', $this->end);
            })
            ->latest()
            ->get();

        return view('livewire.report', compact('transactions'));
    }

    private function parseDates()
    {
        if ($this->startDate && $this->endDate) {
            $this->start = Carbon::createFromFormat('Y-m-d', $this->startDate)->startOfDay();
            $this->end = Carbon::createFromFormat('Y-m-d', $this->endDate)->endOfDay();
        }
    }
}
