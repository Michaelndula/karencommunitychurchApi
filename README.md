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
