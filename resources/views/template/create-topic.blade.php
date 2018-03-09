@extends('layouts.apps')

@section('content')
<section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 breadcrumbf">
                            <a href="#">Borderlands 2</a> <span class="diviver">&gt;</span> <a href="#">General Discussion</a> <span class="diviver">&gt;</span> <a href="#">New Topic</a>
                        </div>
                    </div>
                </div>


                <div class="container">
                    @include('includes.errors')
                    <div class="row">
                        <div class="col-lg-8 col-md-8">



                            <!-- Topic Form -->
                            <div class="post">
                                <form action="" class="form newtopic" method="post">
                                  {{csrf_field()}}
                                    <div class="topwrap">
                                        <div class="userinfo pull-left">
                                            <div class="avatar">
                                                <img src="{{ asset(Auth::user()->avatar)}}" alt="Auth::user()->avatar" width="35px" height="35px" />
                                                <div class="status green">&nbsp;</div>
                                            </div>

                                            <div class="icons">
                                                <img src="images/icon3.jpg" alt="" /><img src="images/icon4.jpg" alt="" /><img src="images/icon5.jpg" alt="" /><img src="images/icon6.jpg" alt="" />
                                            </div>
                                        </div>
                                        <div class="posttext pull-left">

                                            <div>
                                                <input type="text" name="title" placeholder="Enter Topic Title" class="form-control" />
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-10 col-md-10">
                                                    <select name="category_id" id="category"  class="form-control" >
                                                        <option value="" disabled selected>Select Category</option>
                                                        @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                
                                            </div>

                                            <div>
                                                <textarea name="description" id="desc" placeholder="Description"  class="form-control" ></textarea>
                                            </div>
                                            <div class="row newtopcheckbox">
                                                <div class="col-lg-6 col-md-6">
                                                    <div><p>Who can see this?</p></div>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" id="everyone" /> Everyone
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" id="friends"  /> Only Friends
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div>
                                                        <p>Share on Social Networks</p>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" id="fb"/> <i class="fa fa-facebook-square"></i>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-4">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" id="tw" /> <i class="fa fa-twitter"></i>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-4">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" id="gp"  /> <i class="fa fa-google-plus-square"></i>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="clearfix"></div>
                                    </div>                              
                                    <div class="postinfobot">

                                        <div class="notechbox pull-left">
                                            <input type="checkbox" name="note" id="note" class="form-control" />
                                        </div>

                                        <div class="pull-left">
                                            <label for="note"> Email me when some one post a reply</label>
                                        </div>

                                        <div class="pull-right postreply">
                                            <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>
                                            <div class="pull-left"><button type="submit" class="btn btn-primary">Post</button></div>
                                            <div class="clearfix"></div>
                                        </div>


                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                            <!-- Topic Form -->

                           

                        </div>
                         <!-- SIDEBAR -->
                        <div class="col-lg-4 col-md-4">
                            @include('includes.t-sidebar')  
                        </div>
                    </div>
                </div>



                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-xs-12">
                            <div class="pull-left"><a href="#" class="prevnext"><i class="fa fa-angle-left"></i></a></div>
                            <div class="pull-left">
                                <ul class="paginationforum">
                                    <li class="hidden-xs"><a href="#">1</a></li>
                                    <li class="hidden-xs"><a href="#">2</a></li>
                                    <li class="hidden-xs"><a href="#">3</a></li>
                                    <li class="hidden-xs"><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">6</a></li>
                                    <li><a href="#" class="active">7</a></li>
                                    <li><a href="#">8</a></li>
                                    <li class="hidden-xs"><a href="#">9</a></li>
                                    <li class="hidden-xs"><a href="#">10</a></li>
                                    <li class="hidden-xs hidden-md"><a href="#">11</a></li>
                                    <li class="hidden-xs hidden-md"><a href="#">12</a></li>
                                    <li class="hidden-xs hidden-sm hidden-md"><a href="#">13</a></li>
                                    <li><a href="#">1586</a></li>
                                </ul>
                            </div>
                            <div class="pull-left"><a href="#" class="prevnext last"><i class="fa fa-angle-right"></i></a></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>


</section>
@endsection