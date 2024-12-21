<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShelfController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\TaxTypeController;
use App\Http\Controllers\TypeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::prefix('shelves')->group(function () {
    Route::get('/', [ShelfController::class, 'index']);
    Route::post('/', [ShelfController::class, 'store']);
});


Route::prefix('products')->controller(ProductController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{id}', 'show');
    Route::post('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
    Route::post('/import', 'import');
    Route::get('/export/excel', 'exportToExcel');
    Route::get('/export/pdf', 'exportToPDF');
});

Route::get('/inventory', [InventoryController::class, 'index']);


Route::prefix('categories')->controller(CategoryController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('{id}', 'show');
    Route::put('{id}', 'update');
    Route::delete('{id}', 'destroy');
    Route::get('trashed', 'trashed');
});

Route::prefix('brands')->group(function () {
    Route::get('/', [BrandController::class, 'index']);
    Route::post('/', [BrandController::class, 'store']);
    Route::get('{id}', [BrandController::class, 'show']);
    Route::put('{id}', [BrandController::class, 'update']);
    Route::delete('{id}', [BrandController::class, 'destroy']);
    Route::post('{id}/restore', [BrandController::class, 'restore']);

});

Route::prefix('tax-types')->group(function () {
    Route::get('/', [TaxTypeController::class, 'index']);
    Route::post('/', [TaxTypeController::class, 'store']);
    Route::get('{id}', [TaxTypeController::class, 'show']);
    Route::put('{id}', [TaxTypeController::class, 'update']);
    Route::delete('{id}', [TaxTypeController::class, 'destroy']);

});


Route::prefix('types')->group(function () {
    Route::get('/', [TypeController::class, 'index']);
    Route::post('/', [TypeController::class, 'store']);
    Route::get('{id}', [TypeController::class, 'show']);
    Route::put('{id}', [TypeController::class, 'update']);
    Route::delete('{id}', [TypeController::class, 'destroy']);

});


// routes/api.php

use App\Http\Controllers\UnitController;

Route::prefix('units')->group(function () {
    Route::get('/', [UnitController::class, 'index']);
    Route::post('/', [UnitController::class, 'store']);
    Route::get('/{id}', [UnitController::class, 'show']);
    Route::put('/{id}', [UnitController::class, 'update']);
    Route::delete('/{id}', [UnitController::class, 'destroy']);
});

Route::prefix('print-labels')->controller(PrintLabelController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/search', 'search'); 
    Route::post('/update', 'update');
    Route::post('/print', 'print');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
