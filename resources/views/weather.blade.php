<!DOCTYPE html>
<html>
<head>
    <title>Weather Forecast</title>
</head>
<body>
    @if(isset($error))
        <p>{{ $error }}</p>
    @else
        <h1>Weather in {{ $weather->location->name }}</h1>
        <p>Temperature: {{ $weather->current->temp_c }}°C</p>
        <p>Condition: {{ $weather->current->condition->text }}</p>
        <img src="{{ $weather->current->condition->icon }}" alt="Weather Icon">

        <form method="GET" action="/">
            <label for="city">Enter City:</label>
            <input type="text" name="city" id="city">
            <button type="submit">Get Weather</button>
        </form>
    @endif
</body>
</html>
