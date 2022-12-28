<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
     * Prepare user input for validation
     * @return array
     */
    protected function prepareForValidation()
    {
        $end_date = $this->end_date ? \Carbon\Carbon::create($this->end_date) : null;

        $this->merge([
            'start_date' => \Carbon\Carbon::create($this->start_date),
            'end_date' => $end_date
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'gender' => ['required'],
            'address' => ['required', 'string'],
            'contact' => ['required', 'string'],
            'salary' => ['required', 'numeric'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date']
        ];
    }
}
