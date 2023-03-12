<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Distance Calculator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container my-5">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Calculator</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('calculate') }}" method="POST">
                <div class="form-group">
                    <label for="distance1">Distance 1:</label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="distance1" required>
                        <select class="form-control" name="unit1" id="unit1">
                            <option value="meters">Meters</option>
                            <option value="yards">Yards</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="distance2">Distance 2:</label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="distance2" required>
                        <select class="form-control" name="unit1" id="unit1">
                            <option value="meters">Meters</option>
                            <option value="yards">Yards</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="requestedUnit">Result Unit:</label>
                    <select class="form-control" name="result_unit" required>
                        <option value="meters">Meters</option>
                        <option value="yards">Yards</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Calculate</button>
            </form>
            @if(isset($result))
                <div class="my-4">
                    <h4>Result:</h4>
                    <p>{{ $result }}</p>
                </div>
            @endif
        </div>
    </div>
</div>
</body>
</html>