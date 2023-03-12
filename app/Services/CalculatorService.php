<?php

namespace App\Services;

use App\Enums\Units;
use Exception;

class CalculatorService
{
    const METER_CONVERSION_RATE = [
        Units::METER => 1,
        Units::YARD => 1.094,
    ];

    const SUM = 'sum';

    /**
     * @param int|float $first_distance
     * @param int|float $second_distance
     * @param string $first_unit
     * @param string $second_unit
     * @param string $result_unit
     * @param string $operator
     * @return float|int
     * @throws Exception
     */
    public function calculate(
        int|float $first_distance,
        int|float $second_distance,
        string    $first_unit,
        string    $second_unit,
        string    $result_unit,
        string    $operator = self::SUM
    ): float|int
    {
        $first_distance = $this->toMeter($first_distance, $first_unit);
        $second_distance = $this->toMeter($second_distance, $second_unit);

        switch ($operator) {
            default:
                $calculated_value = $first_distance + $second_distance;
        }

        return $this->convertMeterToRequestedUnit($calculated_value, $result_unit);
    }

    /**
     * @param float|int $distance
     * @param string $unit
     * @return float|int
     * @throws Exception
     */
    private function toMeter(float|int $distance, string $unit): float|int
    {
        if (!in_array($unit, array_keys(self::METER_CONVERSION_RATE))) {
            throw new Exception('Invalid unit');
        }

        return $distance / self::METER_CONVERSION_RATE[$unit];
    }

    /**
     * @param float|int $distance
     * @param string $unit
     * @return float|int
     * @throws Exception
     */
    private function convertMeterToRequestedUnit(float|int $distance, string $unit): float|int
    {
        if (!in_array($unit, array_keys(self::METER_CONVERSION_RATE))) {
            throw new Exception('Invalid unit');
        }

        return $distance * self::METER_CONVERSION_RATE[$unit];
    }
}
