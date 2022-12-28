<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

     protected function prepareForValidation()
     {
         $finish_date = $this->finish_date ? \Carbon\Carbon::create($this->finish_date) : null;

         $this->merge([
            'order_date' => \Carbon\Carbon::create($this->order_date),
            'finish_date' => $finish_date
         ]);
     }

    public function rules()
    {
        return [
            'customer_id' => ['required', 'exists:customers,id'],
            'employee_id' => ['required', 'exists:employees,id'],
            'laundry_id' => ['required', 'exists:laundries,id'],
            'weight' => ['required', 'numeric'],
            'order_date' => ['required', 'date'],
            'finish_date' => ['nullable', 'date']
        ];
    }
}
