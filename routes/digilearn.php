<?php





//FrontEnd
Route::get('/','digilearn\client\AppController@home')->name('digilearn.home');
Route::get('/support','digilearn\client\AppController@support')->name('digilearn.support');
Route::get('/terms','digilearn\client\AppController@terms')->name('digilearn.terms');
Route::get('/privacypolicy','digilearn\client\AppController@privacypolicy')->name('digilearn.privacypolicy');


//Backend
Route::group(['prefix' => 'appadmin','middleware'=>['auth']],function(){

    //Imporsonate
    if ('production' != config('app.env')) {
        Route::get('/impersonate', 'digilearn\admin\ImpersonateController@index')->name('impersonate.index');
        Route::get('/impersonate/enter/{user_id}', 'digilearn\admin\ImpersonateController@impersonate')->name('impersonate.enter');
        Route::get('/impersonate/leave', 'digilearn\admin\ImpersonateController@impersonate_leave')->name('impersonate.leave');
    }


    Route::get('/','digilearn\admin\AppController@index')->name('digilearn.dashboard');
    Route::resource('/classroom','digilearn\admin\ClassroomController');
    Route::resource('/section','digilearn\admin\SectionController');
    Route::resource('/course','digilearn\admin\CourseController');
    Route::resource('/lesson','digilearn\admin\LessonController');

    Route::resource('/student','digilearn\admin\StudentController@index');

    Route::resource('/student','digilearn\admin\StudentController');
    Route::resource('/teacher','digilearn\admin\TeacherController');
    //Route::get('/book/issued','Admin\BookController@issued_book')->name('book.issued');
    //Route::get('/book/issue','Admin\BookController@issue_book')->name('book.issue');
    //Route::post('/book/issue','Admin\BookController@issue_book_save')->name('book.issue.save');
    Route::resource('/book','digilearn\admin\BookController');
    Route::resource('/issuedbook','digilearn\admin\IssuedBookController');
    Route::resource('/exam','digilearn\admin\ExamController');
    Route::resource('/question','digilearn\admin\QuestionController');

});
