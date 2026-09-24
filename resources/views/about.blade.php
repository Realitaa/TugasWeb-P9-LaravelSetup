<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page</title>
</head>

<body>
    <h1>About Page</h1>
    {{-- Nilai i di dapat dari route --}}
    @for ($i = 1; $i <= $x; $i++)
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, autem.</p>
    @endfor
    <br>
    <p>Paragraf lorem telah di tampilkan sebanyak {{ $x }} kali.</p>
</body>

</html>