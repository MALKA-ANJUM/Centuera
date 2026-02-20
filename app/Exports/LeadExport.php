<?php

namespace App\Exports;

use App\Models\Lead;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings; 


class LeadExport implements  FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Lead::all()
        ->map(function ($lead) {
                return [
                    'name' => $lead->name,
                    'email' => $lead->email,
                    'country' => $lead->getCountry->name,
                    'phone' => '+'.$lead->country_code.'-'.$lead->phone,
                ];
            });
    }
    public function headings(): array
    {
        return ['Name', 'Email', 'Country', 'Phone'];
    }
}
