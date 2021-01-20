<?php

Route::get('/',['uses' => 'Client\RecruiterController@dashboard','as' =>'app.recruiter.dashboard']);

Route::get('/profile',['uses' => 'Client\RecruiterController@profile','as' =>'app.recruiter.profile']);

Route::get('/managejobs',['uses' => 'Client\RecruiterController@manage_jobs','as' =>'app.recruiter.manage.jobs']);

Route::get('/transactions',['uses' => 'Client\RecruiterController@transactions','as' =>'app.recruiter.transactions']);

Route::get('/resumes',['uses' => 'Client\RecruiterController@resumes','as' =>'app.recruiter.resumes']);

Route::get('/pakages',['uses' => 'Client\RecruiterController@pakages','as' =>'app.recruiter.pakages']);

Route::get('/postjobs',['uses' => 'Client\RecruiterController@post_jobs','as' =>'app.recruiter.post.jobs']);

Route::get('/jobalerts',['uses' => 'Client\RecruiterController@job_alerts','as' =>'app.recruiter.job.alerts']);

Route::get('/changepassword',['uses' => 'Client\RecruiterController@change_password','as' =>'app.recruiter.change.password']);
