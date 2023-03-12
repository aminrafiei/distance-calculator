<?php

namespace App\Http\Controllers;

use App\Enums\Units;
use App\Services\CalculatorService;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    private CalculatorService $service;

    public function __construct(CalculatorService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('index');
    }

    public function calculate(Request $request)
    {
        $this->validate($request, [
            'distance1' => 'required|integer',
            'distance2' => 'required|integer',
            'unit1' => 'required|string|in:' . implode(',', Units::AVAILABLE_UNITS),
            'unit2' => 'required|in:' . implode(',', Units::AVAILABLE_UNITS),
            'result_unit' => 'required|string|in:' . implode(',', Units::AVAILABLE_UNITS),
        ]);

        $this->service->calculate();
    }
}
