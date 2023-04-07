<?php

namespace App\Imports;

use App\Models\Lead;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;

class LeadImports implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $invID =0;
        $maxValue = DB::table('leads')->max('id');
        $invID=$maxValue+1;
        $invID = str_pad($invID, 4, '0', STR_PAD_LEFT);

        $leadid="LEAD".$invID;

        return new Lead([

            "leadid" => $leadid,
            // "attedance_date" => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row["attedance_date"])->format('Y-m-d'),
            "leadentrydate" => date("d-m-Y"),
            "customername" => $row["customername"],
            "mobilenumber" => $row["mobilenumber"],
            "email" => $row["email"],
            "address" => $row["address"],
            "dealname" => $row["dealname"],
            "dealvalue" => $row["dealvalue"],
            "type" => $row["type"],
            "callstage" => "Untouched",
            "leadsource" => "Direct",
            "leadstatus" => "Pending",

        ]);
    }
}
