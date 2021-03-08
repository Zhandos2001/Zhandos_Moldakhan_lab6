<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;
/*
|--------------------------------------------------------------------------
| //Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/insert', function () {
    DB::insert("insert into Students(name,date_of_birth,GPA,Adviser)values('Akosh','2006-06-11',2.0,'Kairat')");
});

Route::get('/select', function () {
    $answer=DB::select("select*from Students where id=?",[4]);
    foreach ($answer as $Students) {
        echo "Name is: ".$Students->name;
        echo "date_of_birth is: ".$Students->date_of_birth;
        echo "GPA is: ".$Students->GPA;
        echo "NName is: ".$Students->adviser;

    }
});


Route::get('/update', function () {
    DB::update("update Students set name='Aidos' where id=?",[2]);
});

Route::get('/delete', function () {
    DB::delete("delete from Students where id=?",[2]);
});




Route::get('/insert2', function () {
    $student1=new Student;
    $student1->name='Dina';
    $student1->date_of_birth='2001-04-20';
    $student1->GPA=3.0;
    $student1->Adviser='Rima';
    $student1->save();
});


Route::get('/select2', function () {
    $student1=Student ::find(4);
    return $student1->name;
});

Route::get('/update2', function () {
    $student1=Student::find(3);
    $student1->name='Almaz';
    $student1->date_of_birth='1999-04-28';
    $student1->GPA=1.5;
    $student1->Adviser='Ualikhan';
    $student1->save();
});


Route::get('/delete2', function () {
    $student1=Student::find(5);
    $student1->delete();
});