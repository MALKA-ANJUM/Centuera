<?php

namespace App\Exports;

use App\Models\RequestCallback;
use Maatwebsite\Excel\Concerns\WithHeadings; 
use Maatwebsite\Excel\Concerns\FromCollection;

class RequestCallbackExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RequestCallback::all()
        ->map(function ($callbacks) {
                return [
                    'id' => $callbacks->id,
                    'created_at' => $callbacks->created_at->format('d-m-Y'),
                    'name' => $callbacks->name,
                    'phone' => $callbacks->phone,
                    'email' => $callbacks->email,
                    'course_id' => $callbacks->course_id,
                    
                ];
            });
    }
    public function headings(): array
    {
        return ['ID', 'Date', 'Name', 'Phone', 'Email', 'Program'];
    }
}
