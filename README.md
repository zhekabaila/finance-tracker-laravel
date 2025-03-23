# URUTAN INSTALASI, SETUP, DAN RUNNING LARAVEL 10

## Daftar Isi

-   [Software yang dibutuhkan](#software-yang-dibutuhkan)
-   [Instalasi](#instalasi)
    1. [Install Laravel 10](#instalasi)
    2. [Install Carbon](#instalasi)
    3. [Install Laravel Notify](#instalasi)
-   [Setup](#setup)
    1. [Setup Environment](#setup)
    2. [Generate Key](#setup)
    3. [Konfigurasi Database](#setup)
    4. [Buat Database](#setup)
    5. [Setup Timezone](#setup)
    6. [Setup Tailwind CSS](#setup)
-   [Running](#running)
    1. [Laravel Server](#running)
    2. [Vite Server](#running)
-   [Panduan Artisan Command](#panduan-artisan-command)
    1. [Migration](#migration)
    2. [Model](#model)
    3. [Controller](#controller)
    4. [Request](#request)
    5. [Seeder](#seeder)
    6. [Middleware](#middleware)
-   [Panduan Setup Route](#panduan-setup-route)
    1. [Basic Route](#basic-route)
    2. [Route dengan Controller](#route-dengan-controller)
    3. [Route Resource Manual](#route-resource-manual)

## Software yang dibutuhkan

    - PHP
    - MySql
    - [Composer](https://www.github.com/octokatherine)
    - [Node Js](https://www.github.com/octokatherine)

## Instalasi

1. Install Laravel versi 10

```bash
composer create-project laravel/laravel="10.*" project-name
cd project-name
composer install
npm install
```

2. Install library Carbon untuk format waktu dan tanggal

```bash
composer require nesbot/carbon
```

3. Install library laravel-notify untuk notifikasi (opsional)

```bash
composer require mckenziearts/laravel-notify
```

## Setup

1. Siapkan file environment

```bash
# Copy file .env.example menjadi .env
cp .env.example .env
```

2. Generate application key

```bash
php artisan key:generate
```

3. Konfigurasi database di file .env

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=root
DB_PASSWORD=
```

4. Buat database baru di MySQL sesuai dengan nama yang telah dikonfigurasi di file .env

5. Setup Timezone, ubah timezone dan locale

```php
<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [
    'name' => env('APP_NAME', 'Laravel'),

    'env' => env('APP_ENV', 'production'),

    'debug' => (bool) env('APP_DEBUG', false),

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL'),

    'timezone' => 'Asia/Jakarta',

    'locale' => 'id',

    'fallback_locale' => 'id',

    'faker_locale' => 'id_ID',

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    'maintenance' => [
        'driver' => 'file',
        // 'store' => 'redis',
    ],


    'providers' => ServiceProvider::defaultProviders()->merge([
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
    ])->toArray(),

    'aliases' => Facade::defaultAliases()->merge([
        // 'Example' => App\Facades\Example::class,
    ])->toArray(),
];
```

6. Instal dan Setup Tailwindcss v3

    a. Install Tailwind CSS dan dependensinya menggunakan npm

    ```bash
    npm install -D tailwindcss@3 postcss autoprefixer
    npx tailwindcss init -p
    ```

    b. Konfigurasi template path di file tailwind.config.js

    ```javascript
    /** @type {import('tailwindcss').Config} */
    export default {
        content: [
            "./resources/**/*.blade.php",
            "./resources/**/*.js",
            "./resources/**/*.vue",
        ],
        theme: {
            extend: {},
        },
        plugins: [],
    };
    ```

    c. Tambahkan Tailwind directives ke file CSS (./resources/css/app.css)

    ```css
    @tailwind base;
    @tailwind components;
    @tailwind utilities;
    ```

    d. Jalankan build process

    ```bash
    npm run dev
    ```

    e. Tambahkan CSS yang telah dikompilasi ke dalam template blade (resources/views/welcome.blade.php)

    ```html
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
            <meta
                name="viewport"
                content="width=device-width, initial-scale=1.0"
            />
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        </head>
        <body>
            <h1 class="text-3xl font-bold underline">Hello world!</h1>
        </body>
    </html>
    ```

## Running

1. Jalankan server Laravel menggunakan Artisan

```bash
php artisan serve
```

Server Laravel akan berjalan di http://127.0.0.1:8000

2. Jalankan Vite (Tailwind CSS) development server

```bash
# Dalam terminal terpisah
npm run dev
```

Catatan:

-   Pastikan menjalankan kedua server (Laravel dan Vite) secara bersamaan menggunakan terminal yang berbeda
-   Server Laravel digunakan untuk menjalankan aplikasi backend
-   Server Vite digunakan untuk kompilasi asset frontend (Tailwind CSS, JavaScript)

## Panduan Artisan Command

1. Migration

```bash
# Membuat file migration
php artisan make:migration create_nama_tabel_table

# Membuat migration dengan foreign key
php artisan make:migration add_foreign_keys_to_nama_tabel_table

# Menjalankan migration dengan seeder
php artisan migrate --seed

# Reset dan jalankan ulang semua migration dan buat seeder
php artisan migrate:fresh --seed
```

2. Model

```bash
# Membuat model
php artisan make:model NamaModel
```

3. Controller

```bash
# Membuat controller basic
php artisan make:controller NamaController

# Membuat controller dengan resource methods (index, create, store, show, edit, update, destroy)
php artisan make:controller NamaController --resource

# Membuat controller dengan model
php artisan make:controller NamaController --model=NamaModel
```

4. Request

```bash
# Membuat form request untuk validasi
php artisan make:request NamaRequest

# Contoh lokasi: app/Http/Requests/NamaRequest.php
```

5. Seeder

```bash
# Membuat seeder
php artisan make:seeder NamaSeeder

# Menjalankan semua seeder
php artisan db:seed

# Menjalankan specific seeder
php artisan db:seed --class=NamaSeeder
```

6. Middleware

```bash
# Membuat middleware
php artisan make:middleware NamaMiddleware
```

## Panduan Setup Route

```php
// routes/web.php

use App\Http\Controllers\ProductController;

// Menampilkan semua data (GET)
Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

// Menampilkan form create (GET)
Route::get('/products/create', [ProductController::class, 'create'])
    ->name('products.create');

// Menyimpan data baru (POST)
Route::post('/products', [ProductController::class, 'store'])
    ->name('products.store');

// Menampilkan detail data (GET)
Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('products.show');

// Menampilkan form edit (GET)
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])
    ->name('products.edit');

// Mengupdate data (PUT/PATCH)
Route::put('/products/{product}', [ProductController::class, 'update'])
    ->name('products.update');

// Menghapus data (DELETE)
Route::delete('/products/{product}', [ProductController::class, 'destroy'])
    ->name('products.destroy');
```

Contoh implementasi ProductController:

```php
// app/Http/Controllers/ProductController.php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        Product::create($validated);
        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        // Validasi
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $product->update($validated);
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
```

Catatan:

-   Route name digunakan untuk memudahkan generating URL/redirect
-   Gunakan route parameter binding untuk mendapatkan model secara otomatis
-   Pastikan model yang digunakan sudah dibuat dan dikonfigurasi dengan benar
-   Validasi request sebaiknya dipindahkan ke Form Request terpisah untuk kode yang lebih bersih
-   Gunakan middleware jika diperlukan untuk autentikasi/autorisasi
