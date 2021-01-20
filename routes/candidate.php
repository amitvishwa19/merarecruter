<?php

//Candidate
Route::get('/',['uses' => 'Client\CandidateController@dashboard','as' =>'app.candidate.dashboard']);

Route::get('/profile',['uses' => 'Client\CandidateController@profile','as' =>'app.candidate.profile']);

Route::get('/resume',['uses' => 'Client\CandidateController@resume','as' =>'app.candidate.resume']);

Route::get('/resume/add',['uses' => 'Client\CandidateController@resume_add','as' =>'app.candidate.resume.add']);

Route::get('/shortlistedjobs',['uses' => 'Client\CandidateController@shortlisted_jobs','as' =>'app.candidate.shortlisted.jobs']);

Route::get('/appliedjobs',['uses' => 'Client\CandidateController@applied_jobs','as' =>'app.candidate.applied.jobs']);

Route::get('/jobalerts',['uses' => 'Client\CandidateController@job_alerts','as' =>'app.candidate.job.alerts']);

Route::get('/coverletters',['uses' => 'Client\CandidateController@cv_cover_letter','as' =>'app.candidate.cv.cover.letter']);

Route::get('/changepassword',['uses' => 'Client\CandidateController@change_password','as' =>'app.candidate.change.password']);
