<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeModal;

class LiveSearchController extends Controller
{
    public function index(Request $request) {
        return view('live_search');
    }

    public function liveSearchTable(Request $request) {
        if ($request->ajax()) {
            $data = EmployeeModal::where('id', 'like', '%' . $request->search . '%')
                ->orWhere('name', 'like', '%' . $request->search . '%')
                ->orWhere('city', 'like', '%' . $request->search . '%')
                ->get();
            
            $output = '';
    
            if (count($data) > 0) {
                $output = '<table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">City</th>
                                    </tr>
                                </thead>                           
                                <tbody>';
    
                foreach ($data as $row) {
                    $output .= '<tr>
                                    <th scope="row">'.$row->id.'</th>
                                    <td>'.$row->name.'</td>
                                    <td>'.$row->city.'</td>
                                </tr>';
                }
    
                $output .= '</tbody>
                            </table>';
            }
            else {
                $output .= 'No Record Found!!';
            }
    
            return $output;
        }
    }  
    
    public function loadInitialData(Request $request) {
        $data = EmployeeModal::all();
    
        $output = '<table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">City</th>
                            </tr>
                        </thead>                           
                        <tbody>';
    
        foreach ($data as $row) {
            $output .= '<tr>
                            <th scope="row">'.$row->id.'</th>
                            <td>'.$row->name.'</td>
                            <td>'.$row->city.'</td>
                        </tr>';
        }
    
        $output .= '</tbody>
                    </table>';
    
        return $output;
    }    
}

?>