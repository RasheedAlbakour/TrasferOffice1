<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exchange Rates</title>
</head>
<body>
    <h2>أسعار الصرف</h2>

    <ul>
        @foreach ($exchangeRates as $currency => $rate)
            <li>{{ $currency }}: {{ $rate }}</li>
        @endforeach
    </ul>
</body>
</html>
