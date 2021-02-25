<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\User;

class LogController extends Controller
{
    public static function store($request)
    {   
        date_default_timezone_set("Asia/Jakarta");
        $attr = $request;
        $attr['user_id'] = auth()->user()->id;
        $attr['timestamp'] = date_create();
        Log::create($attr);
    }
    public function index(){
        $logs = request('username') ? User::where("name", request('username'))->firstOrFail()->logs : Log::get();
        
        return view('logs.index', [
            'logs' => $logs,
            'users' => User::get(),
        ]);
    }
    public function exportCsv(Request $request)
    {
        $fileName = request('username') ? "log-".request('username').".csv" : 'log.csv';
        $logs = request('username') ?  User::where("name", request('username'))->firstOrFail()->logs : Log::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('ID', 'Name', 'User', 'Timestamp', 'Quantity', 'Current Quantity', 'Unit');

        $callback = function() use($logs, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($logs as $log) {
                $row['ID']  = $log->id;
                $row['Name']    = $log->name;
                $row['User']    = $log->user->name;
                $row['Timestamp']  = $log->timestamp;
                $row['Quantity']  = $log->quantity;
                $row['Current Quantity']  = $log->current_quantity;
                $row['Unit']  = $log->unit;

                fputcsv($file, array($row['ID'], $row['Name'], $row['User'], $row['Timestamp'], $row['Quantity'], $row['Current Quantity'], $row['Unit']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
