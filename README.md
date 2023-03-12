How the code works:
1. First, we validate the user's request to make sure all the user inputs are okay.
2. Then, we convert all the distances to "meter" as our base unit.
3. After that, we perform the calculation operation (sum).
4. Finally, we convert the result (which is based on meters) to the requested unit.

------------------------------------
- All validations are in the `CalculatorController` controller (we can separate this part into other classes).
- We do the calculation in `CalculatorService.php`.
- We defined the unit constants in `Units.php.`
