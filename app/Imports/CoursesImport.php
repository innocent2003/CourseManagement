<?php

namespace App\Imports;

use App\Models\Course;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CoursesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Course([
            //
            'name' => $row['Tên'],
            'description' => $row['Mô tả'],
            'start_time' => $row['Thời gian bắt đầu'],
            'end_time' => $row['Thời gian kết thúc'],
        ]);
    }
}
