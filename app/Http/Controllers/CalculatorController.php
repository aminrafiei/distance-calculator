<?php

namespace App\Http\Controllers;

use App\Enums\Units;
use App\Services\CalculatorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Laravel\Lumen\Application;

class CalculatorController extends Controller
{
    private CalculatorService $service;

    public function __construct(CalculatorService $service)
    {
        $this->service = $service;
    }

    /**
     * @return View|Application
     */
    public function index()
    {
        return view('index');
    }

    /**
     * @param Request $request
     * @return View|Application
     * @throws ValidationException
     */
    public function calculate(Request $request)
    {
        // validate the request
        $this->validate($request, [
            'distance1' => 'required|numeric',
            'distance2' => 'required|numeric',
            'unit1' => 'required|string|in:' . implode(',', Units::AVAILABLE_UNITS),
            'unit2' => 'required|in:' . implode(',', Units::AVAILABLE_UNITS),
            'result_unit' => 'required|string|in:' . implode(',', Units::AVAILABLE_UNITS),
        ]);

        try {
            $result = $this->service->calculate(
                $request->distance1,
                $request->distance2,
                $request->unit1,
                $request->unit2,
                $request->result_unit,
            );
        } catch (Exception $exception) {
            $result = "Error";
            Log::error('Error in calculator', ['exception' => $exception]);
        }

        return view('index', compact('result'));
    }
}
