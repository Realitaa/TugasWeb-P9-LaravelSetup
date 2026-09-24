<?php

// ==============================================================================
// Kriteria 4: Mengakses 3 Route Custom (/, /about, /contact) & Respon 200 OK
// ==============================================================================

test('kriteria 4: rute utama / mengembalikan respon 200 OK dan merender view welcome', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertViewIs('welcome');
});

test('kriteria 4: rute /about mengembalikan respon 200 OK dan merender view about', function () {
    $response = $this->get('/about');

    $response->assertStatus(200);
    $response->assertViewIs('about');
});

test('kriteria 4: rute /contact mengembalikan respon 200 OK dan merender view contact', function () {
    $response = $this->get('/contact');

    $response->assertStatus(200);
    $response->assertViewIs('contact');
});

// ==============================================================================
// Kriteria 5: Menguji Rute /about dan /contact Menampilkan Data Dinamis
// ==============================================================================

test('kriteria 5: rute /about mengirimkan data dinamis integer x dan menampilkan perulangan teks lorem', function () {
    $response = $this->get('/about');

    $response->assertStatus(200);
    $response->assertViewHas('x');

    $x = $response->viewData('x');
    expect($x)->toBeInt()->toBeGreaterThanOrEqual(1)->toBeLessThanOrEqual(10);

    $response->assertSee("Paragraf lorem telah di tampilkan sebanyak {$x} kali.");
    $response->assertSee('About Page');
});

test('kriteria 5: rute /contact mengirimkan data dinamis array dan merender seluruh nilainya', function () {
    $response = $this->get('/contact');

    $response->assertStatus(200);
    $response->assertViewHas('data');

    $data = $response->viewData('data');
    expect($data)->toBeArray()
        ->toHaveKey('name')
        ->toHaveKey('class')
        ->toHaveKey('nim')
        ->toHaveKey('discord');

    $response->assertSee('Contact Page');
    $response->assertSee('name: ' . $data['name']);
    $response->assertSee('class: ' . $data['class']);
    $response->assertSee('nim: ' . $data['nim']);
    $response->assertSee('discord: ' . $data['discord']);
});

// ==============================================================================
// Bonus 2: Menguji Route Parameter /hello/{nama}
// ==============================================================================

test('bonus 2: rute parameter /hello/{nama} berhasil diakses dan menampilkan nama dinamis di halaman', function (string $nama) {
    $response = $this->get("/hello/{$nama}");

    $response->assertStatus(200);
    $response->assertViewIs('hello');
    $response->assertViewHas('nama', $nama);
    $response->assertSee("Hello {$nama}");
})->with(['Reza', 'Realitaa', 'LaravelSetup']);
