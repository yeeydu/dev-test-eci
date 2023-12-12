<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prices;

class ImportCsvController extends Controller
{

    /**
     * Import cvs function
     */

    public function import()
    {
        return view('import');
    }


    public function importCsv(Request $request)
    {

        $file = $request->file('file');
        $fileContents = file($file->getPathname());

        // Skip the first line (header) of the CSV file
        $skipFirstLine = true;

        foreach ($fileContents as $line) {

            if ($skipFirstLine) {
                $skipFirstLine = false;
                continue;
            }
            
            $data = str_getcsv($line);

            Prices::create([
                'product_id' => $data[0] ?? null,
                'account_id' => $data[1] ?? null,
                'user_id' => $data[2] ?? null,
                'quantity' => $data[3],
                'value' => $data[4],
            ]);
        }

        return redirect("/")->with('success', 'CSV file imported successfully.');
    }
}
