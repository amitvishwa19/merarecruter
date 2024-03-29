@extends('client.layout.layout')

@section('title','Manage Jobs')


@section('style')
@endsection


@section('content')

<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Welcome {{Auth::user()->firstname}},{{Auth::user()->lastname}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="block no-padding">
        <div class="container">
             <div class="row no-gape">


                {{-- Recruiter dashboard sidebar --}}
                @include('client.pages.recruiter.sidebar')


                 <div class="col-lg-9 column">
                     <div class="padding-left">

                        <div class="manage-jobs-sec">
                            <h3>Manage Jobs</h3>
                            <div class="extra-job-info">
                                <span><i class="la la-clock-o"></i><strong>9</strong> Job Posted</span>
                                <span><i class="la la-file-text"></i><strong>20</strong> Application</span>
                                <span><i class="la la-users"></i><strong>18</strong> Active Jobs</span>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <td>Title</td>
                                        <td>Applications</td>
                                        <td>Created & Expired</td>
                                        <td>Status</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="table-list-title">
                                                <h3><a href="#" title="">Web Designer / Developer</a></h3>
                                                <span><i class="la la-map-marker"></i>Sacramento, California</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="applied-field">3+ Applied</span>
                                        </td>
                                        <td>
                                            <span>October 27, 2017</span><br />
                                            <span>April 25, 2011</span>
                                        </td>
                                        <td>
                                            <span class="status active">Active</span>
                                        </td>
                                        <td>
                                            <ul class="action_job">
                                                <li><span>View Job</span><a href="#" title=""><i class="la la-eye"></i></a></li>
                                                <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                                <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="table-list-title">
                                                <h3><a href="#" title="">Web Designer / Developer</a></h3>
                                                <span><i class="la la-map-marker"></i>Sacramento, California</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="applied-field">3+ Applied</span>
                                        </td>
                                        <td>
                                            <span>October 27, 2017</span><br />
                                            <span>April 25, 2011</span>
                                        </td>
                                        <td>
                                            <span class="status active">Active</span>
                                        </td>
                                        <td>
                                            <ul class="action_job">
                                                <li><span>View Job</span><a href="#" title=""><i class="la la-eye"></i></a></li>
                                                <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                                <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="table-list-title">
                                                <h3><a href="#" title="">Web Designer / Developer</a></h3>
                                                <span><i class="la la-map-marker"></i>Sacramento, California</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="applied-field">3+ Applied</span>
                                        </td>
                                        <td>
                                            <span>October 27, 2017</span><br />
                                            <span>April 25, 2011</span>
                                        </td>
                                        <td>
                                            <span class="status">Inactive</span>
                                        </td>
                                        <td>
                                            <ul class="action_job">
                                                <li><span>View Job</span><a href="#" title=""><i class="la la-eye"></i></a></li>
                                                <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                                <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="table-list-title">
                                                <h3><a href="#" title="">Web Designer / Developer</a></h3>
                                                <span><i class="la la-map-marker"></i>Sacramento, California</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="applied-field">3+ Applied</span>
                                        </td>
                                        <td>
                                            <span>October 27, 2017</span><br />
                                            <span>April 25, 2011</span>
                                        </td>
                                        <td>
                                            <span class="status active">Active</span>
                                        </td>
                                        <td>
                                            <ul class="action_job">
                                                <li><span>View Job</span><a href="#" title=""><i class="la la-eye"></i></a></li>
                                                <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                                <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                     </div>
                </div>
             </div>
        </div>
    </div>
</section>

@endsection



@section('modal')
@endsection


@section('javascript')


  	<script>
  		$(function(){
         'use strict'





      });
  	</script>

@endsection
