<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $response = array();
        $data = $request->data; // String
        if ($data) {
            $count = strlen($data); // panjang string;
            if ($count > 255) {
                $data = null;
                return redirect()->back()->withErrors(['message', 'Plis input data less than 255 character!']);
            }
            $huruf = str_split($data); // return arr
            $fetch = array_count_values($huruf); // return arr
            foreach ($fetch as $key => $value) {
                // Mencari index yang sama dengan $key
                $found = array_search($key, $huruf); // return index $huruf
                if ($value > 1) {
                    if ($value > 10) {
                        $before = 'Max Distance';
                        $after = 'Max Distance';
                    } else {
                        $before = $key;
                        $after = $key;
                    }
                } else {
                    // Mencari data sebelumnya
                    if ($found - 1 < 0) {
                        $before = 'none';
                    } else {
                        $before = $huruf[$found - 1];
                    }
                    // Mencari data sesudahnya
                    if ($found + 1 > $count - 1) {
                        $after = 'none';
                    } else {
                        $after = $huruf[$found + 1];
                    }
                }
                $obj = (object) [
                    'symbol' => $key,
                    'countered' => $value,
                    'before' => $before,
                    'after' => $after
                ];
                array_push($response, $obj);
            };
        };
        return view('welcome', compact('data', 'response'));
    }
}
