<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    protected $records;

    public function __construct($records)
    {
        $this->records = $records;
    }

    public function collection()
    {
        return $this->records->map(function ($record) {
            return [
                'ID' => $record->id,
                'Nombre' => $record->name,
                'Email' => $record->email,
            ];
        });
    }

    public function headings(): array
    {
        return ['ID', 'Nombre', 'Email'];
    }
}
