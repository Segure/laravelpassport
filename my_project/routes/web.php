<?php
use Illuminate\Http\Request;

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



// esta rota é do lado cliente
Route::get('/', function () {
    //return view('welcome');
    $query = http_build_query([
    	'client_id' => '3',//*
    	'redirect_uri' => 'http://localhost:9999/callback', //* // essa url, seria uma rota local do meu spa?
    	'response_type' => 'code', // nome do parâmetro (pd c qqer 1) que vai conter o código, este que eu vou usar para 
    	'scope' => '',
    ]);

    // apontando pro servidor back
    // esta rota, oauth/authorize foi criada junto com a instalação do laravel passport
    return redirect("http://localhost:8000/oauth/authorize?$query");
    // entendi que 
    	
});


// esta rota é do lado cliente
Route::get('callback', function(Request $request){
    // dd($request->get('code')); // não é o access token, é o codigo de autorização.
    $code = $request->get('code');
    $http = new \GuzzleHttp\Client();
    $response = $http->post('http://localhost:8000/oauth/token', [
        'form_params' => [
            'client_id' => '3',
            'client_secret' => '4CqGbDp2nH0Sofk4urmBtpp6SoMGh46mpUNsbAGe',
            'redirect_uri' => 'http://localhost:9999/callback',
            'code' => $code,
            'grant_type' => 'authorization_code'
        ]
    ]);

  //  dd(json_decode($response->getBody(), true));
    /* retornou:
     token_type => "Bearer"
     expires_in => 
     access_token =>
     refresh_token =>
    */
});






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
