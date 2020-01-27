<?php

use Illuminate\Http\Request;
use App\User;
//use Exception;
use App\Exceptions\CustomException;
use Illuminate\Database\QueryException;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/info',function(){
	echo phpinfo();
});

Route::get('/ip',function(Request $request){
	dd($request);
});

Route::post('/login',function(Request $request){

	try {
		//$new_user = new User;
		//$new_user->name = 'machuca augusto';
		//$new_user->email = $request->email;
		//$new_user->password = Hash::make($request->password);
		//$new_user->save();
		$date = date('d-m-Y H:i:s' , strtotime(now()));
		User::create([  'name'		 =>'augusto', 
						'email' 	 => $request->email , 
						'password' 	 => Hash::make($request->password), 
						'created_at' => $date , 
						'updated_at' => $date
					]);
		return back()->withSuccess('El usuario se registro correctamente');

	}catch (QueryException $e) {
		
		report($e);
		return back()->withError($e->getMessage());
		
	}
	
})->name('login');
