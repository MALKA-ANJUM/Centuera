<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\Course;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadings; 
use Maatwebsite\Excel\Concerns\FromCollection;

class OrderExport implements FromCollection, WithHeadings
{
   protected $search;

    public function __construct($search = null)
    {
        $this->search = $search;
    }
     public function collection()
    {
        $query = Order::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('fullname', 'LIKE', "%{$this->search}%")
                  ->orWhere('email', 'LIKE', "%{$this->search}%");
            });
        }

        $orders = $query->orderBy('id', 'DESC')->get();

        // Preload course titles for mapping
        $courses = Course::pluck('title', 'id')->toArray();

        return $orders->map(function ($order) use ($courses) {
            // Convert course IDs into titles
            $courseTitles = [];
            if ($order->courses && is_array($order->courses)) {
                foreach ($order->courses as $id) {
                    $courseTitles[] = $courses[$id] ?? 'Unknown';
                }
            }

            return [
                'ID'         => $order->id,
                'Name'       => $order->fullname,
                'Email'      => $order->email,
                'Courses'    => implode(', ', $courseTitles),
                'Amount'     => $order->total_amount,
                'Start Date' => $order->workshop_start_date ? Carbon::parse($order->workshop_start_date)->format('d-M-Y') : '-',
                'End Date'   => $order->workshop_end_date ? Carbon::parse($order->workshop_end_date)->format('d-M-Y') : '-',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Courses',
            'Amount',
            'Start date',
            'End date',
        ];
    }
}
