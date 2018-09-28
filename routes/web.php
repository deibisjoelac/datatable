<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Yajra\DataTables\Facades\DataTables;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/users', function () {
    return Datatables::of(App\User::query())
            ->addColumn('actions', function () {
                return '<button class="btn btn-sm btn-primary btneditar" >
                            <i class="material-icons fs-16">edit</i>
                        </button>
                        <button class="btn btn-sm btn-danger btneliminar" >
                            <i class="material-icons fs-16">delete</i>
                        </button>';
            })
            ->rawColumns(['actions'])
            ->make(true);
});
