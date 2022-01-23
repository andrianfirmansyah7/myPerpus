<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', [MemberController::class, 'indax'])->name('homes');

Auth::routes();
Route::get('home', [MemberController::class, 'index'])->name('home');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('admin', [AdminController::class, 'index'])->name('admin.home')->middleware('CheckRole');
Route::get('admin/employee', [AdminController::class, 'employee'])->name('admin.employee')->middleware('CheckRole');
Route::get('admin/target', [AdminController::class, 'target'])->name('admin.target')->middleware('CheckRole');
Route::get('admin/historyTarget', [AdminController::class, 'historyTarget'])->name('admin.historyTarget')->middleware('CheckRole');
Route::get('admin/profil/{id}', [AdminController::class, 'profile'])->name('admin.profile')->middleware('CheckRole');
Route::get('admin/presence', [AdminController::class, 'presence'])->name('admin.presence')->middleware('CheckRole');
Route::get('admin/addPresence', [AdminController::class, 'employee'])->name('admin.addPresence')->middleware('CheckRole');
Route::post('admin/addEmployee', [AdminController::class, 'addEmployee'])->name('admin.addEmployee')->middleware('CheckRole');
Route::post('admin/editEmployee/{id}', [AdminController::class, 'editEmployee'])->name('admin.editEmployee')->middleware('CheckRole');
Route::get('admin/deleteEmployee/{id}', [AdminController::class, 'deleteEmployee'])->name('admin.deleteEmployee')->middleware('CheckRole');
Route::get('admin/book', [AdminController::class, 'book'])->name('admin.book')->middleware('CheckRole');
Route::get('admin/addBook', [AdminController::class, 'addBook'])->name('admin.addBook')->middleware('CheckRole');
Route::post('admin/editBook/{id}', [AdminController::class, 'editBook'])->name('admin.editBook')->middleware('CheckRole');
Route::get('admin/deleteBook/{id}', [AdminController::class, 'deleteBook'])->name('admin.deleteBook')->middleware('CheckRole');

Route::get('librarian', [AdminController::class, 'index'])->name('librarian.home')->middleware('CheckRole');
Route::get('librarian/book', [LibrarianController::class, 'book'])->name('librarian.book')->middleware('CheckRole');
Route::post('librarian/addBook', [LibrarianController::class, 'addBook'])->name('librarian.addBook')->middleware('CheckRole');
Route::post('librarian/editBook/{id}', [LibrarianController::class, 'editBook'])->name('librarian.editBook')->middleware('CheckRole');
Route::get('librarian/deleteBook/{id}', [LibrarianController::class, 'deleteBook'])->name('librarian.deleteBook')->middleware('CheckRole');
Route::get('librarian/member', [LibrarianController::class, 'member'])->name('librarian.member')->middleware('CheckRole');
Route::post('librarian/addMember', [LibrarianController::class, 'addMember'])->name('librarian.addMember')->middleware('CheckRole');
Route::get('librarian/addNewMember', [LibrarianController::class, 'addNewMember'])->name('librarian.addNewMember')->middleware('CheckRole');
Route::post('librarian/editMember/{id}', [LibrarianController::class, 'editMember'])->name('librarian.editMember')->middleware('CheckRole');
Route::get('librarian/deleteMember/{id}', [LibrarianController::class, 'deleteMember'])->name('librarian.deleteMember')->middleware('CheckRole');
Route::get('librarian/profil/{id}', [AdminController::class, 'profile'])->name('librarian.profile')->middleware('CheckRole');
Route::get('librarian/membership', [LibrarianController::class, 'membership'])->name('librarian.membership')->middleware('CheckRole');
Route::get('librarian/borrow', [LibrarianController::class, 'borrow'])->name('librarian.borrow')->middleware('CheckRole');
Route::get('librarian/back', [LibrarianController::class, 'back'])->name('librarian.back')->middleware('CheckRole');

Route::get('home/detailBook/{id}', [MemberController::class, 'getBook'])->name('detailBuku');
Route::post('member/pinjamBuku', [MemberController::class, 'pinjamBuku'])->name('pinjam');
Route::get('member/borrowBook', [MemberController::class, 'borrowBook'])->name('member.borrowBook');
