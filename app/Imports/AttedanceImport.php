<?php

namespace App\Imports;

use App\Models\excel_import_attedance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AttedanceImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new excel_import_attedance([

            "attedance_date" => $row["attedance_date"],

            // "attedance_date" => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row["attedance_date"])->format('Y-m-d'),
            "empid" => $row["empid"],
            "morning_in" => $row["morning_in"],
            "lunch_out" => $row["lunch_out"],
            "lunch_in" => $row["lunch_in"],
            "eveningout" => $row["eveningout"]
        ]);
    }
}
