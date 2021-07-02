# KCC-API

## Karen Community Church Project

## [App Prototype]

   |(https://www.figma.com/file/wlOeJHnAcQh4JirRWdbFbo/Kcc-App-Prototype?node-id=0%3A1)|

## Authentication

Register a Client, send a 'GET' 'POST' 'PUT' 'DELETE' request to '{API_URL}/api/registers

'''example php

{

	// Creating new user on the database
	
	Route::get('/registers', [RegisterApiController::class, 'index']);
	
	Route::post('/registers', [RegisterApiController::class, 'store']);
	
	Route::put('/registers/{post}', [RegisterApiController::class, 'update']);
	
	Route::delete('/registers/{post}', [RegisterApiController::class, 'destroy']);
	
}
'''

Login a Client send a request '{API_URL}/api/logins

'''example php

{
	
	Route::get('/logins', [LoginApiController::class, 'index']);
	
	Route::post('/logins', [LoginApiController::class, 'store']);
	
	Route::put('/logins/{post}', [LoginApiController::class, 'update']);
	
	Route::delete('/logins/{post}', [LoginApiController::class, 'destroy']);
	
}
'''

## Migrations

'''Creating Clients

{

class CreateRegistersTable extends Migration

{

	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('registers', function (Blueprint $table)
		
		$table->id();
		
		$table->string('First_name');
		
		$table->string('Second_name');
		
		$table->string('email');
		
		$table->string('password');
		
		$table->string('confirm_password');
		
		$table->timestamps();
		
		});
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	
	{
	
		Schema::dropIfExists('registers');
		
	}
	
}

}
'''

'''Login Clients

{

	class CreateLoginsTable extends Migration
	
{

    /**
     * Run the migrations.
     *
     * @return void
     */
     
    public function up()
    
    {
        Schema::create('logins', function (Blueprint $table) {
	
            $table->id();
	    
            $table->string('email');
	    
            $table->string('password');
	    
            $table->timestamps();
	    
        });
	
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     
    public function down()
    
    {
    
        Schema::dropIfExists('logins');
	
    }
    
}

}
'''

## Controllers

'''Creating Clients

{
	class RegisterApiController extends Controller
	
{

    public function index()

    {
    
        return Register::all();
	
    }

    public function store()
    
    {
    
        request()->validate([
	
            'First_name' => 'required',
	    
            'Second_name' => 'required',
	    
            'email' => 'required',
	    
            'password' => 'required',
	    
            'confirm_password' => 'required',
	    
        ]);
	
        return Register::create([
	
            'First_name' => request('First_name'),
	    
            'Second_name' => request('Second_name')
	    ,
            'email' => request('email'),
	    
            'password' => request('password'),
	    
            'confirm_password' => request('confirm_password'),
	    
        ]);
	
    }

    public function update(Register $post)
    
    {
        request()->validate([
	
            'First_name' => 'required',
	    
            'Second_name' => 'required',
	    
            'email' => 'required',
	    
            'password' => 'required',
	    
            'confirm_password' => 'required',
	    
        ]);

        $success = $post->update([
	
            'First_name' => request('First_name'),
	    
            'Second_name' => request('Second_name'),
	    
            'email' => request('email'),
	    
            'password' => request('password'),
	    
            'confirm_password' => request('confirm_password'),
	    
        ]);

        return [
	
            'success' => $success
	    
        ];
	
    }

    public function destroy(Register $post)

    {
    
        $success = $post->delete();
	

        return [
	
            'success' => $success
	    
        ];
	
    }
    
}'''

'''Login Clients

{

	class LoginApiController extends Controller
	
{

    public function index()
    

    {
    
        return Login::all();
	
    }

    public function store()
    

    {
    
        request()->validate([
	
            'email' => 'required',
	    
            'password' => 'required',
	    
        ]);

        return Login::create([
	
            'email' => request('email'),
	    
            'password' => request('password'),
	    
        ]);
	
    }

    public function update(Login $post)
    
    {
        request()->validate([
	
            'email' => 'required',
	    
            'password' => 'required',
	    
        ]);

        $updated = $post->update([
	
            'email' => request('email'),
	    
            'password' => request('password'),
	    
        ]);

        return [
	
            'updated' => $updated
	    
        ];
	
    }

    public function destroy(Login $post)
    
    {
        $deleted = $post->delete();
	

        return [
	
            'deleted' => $deleted
	    
        ];
	
    }
    
}'''