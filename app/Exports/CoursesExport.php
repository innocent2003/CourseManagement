<?php

namespace App\Exports;

use App\Models\Course;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CoursesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Course::all();
    }
    public function headings(): array
    {
        return [
            'Tên',
            'Mô tả',
            'Thời gian bắt đầu',
            'Thời gian kết thúc',
        ];
    }

    public function map($course): array
    {
        return [
            $course->name,
            $course->description,
            $course->start_time,
            $course->end_time,
        ];
    }
}
