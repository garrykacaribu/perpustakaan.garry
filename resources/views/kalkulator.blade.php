<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
</head>
<body>
    <h1>Kalkulator Sederhana</h1>

    <form action="{{ url('/hitung') }}" method="post">
        @csrf
        <input type="number" name="bil1" placeholder="Bilangan Pertama" required>
        <select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="number" name="bil2" placeholder="Bilangan Kedua" required>
        <button type="submit" name="submit">Hitung</button>
    </form>

    @isset($hasil)
        <p>Hasil: {{ $hasil }}</p>
    @endisset
</body>
</html>
