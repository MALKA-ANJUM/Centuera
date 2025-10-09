<?php

namespace App\Exports;

use App\Models\Subscription;
use Maatwebsite\Excel\Concerns\WithHeadings; 
use Maatwebsite\Excel\Concerns\FromCollection;

class SubscriptionExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Subscription::select('id', 'email', 'created_at')
            ->get()
            ->map(function ($subscription) {
                return [
                    'id' => $subscription->id,
                    'email' => $subscription->email,
                    'created_at' => $subscription->created_at->format('d-m-Y'),
                ];
            });
    }

    public function headings(): array
    {
        return ['ID', 'Email', 'Subscribed At'];
    }
}
