<div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body">
        <ul class="site-nav-wrap">
            <li><a href="categories.html">For Candidates</a></li>
            <li class="has-children"><span class="arrow-collapse collapsed" data-toggle="collapse"
                                           data-target="#collapseItem0"></span>
                <a href="category.html">For Employees</a>
                <ul class="collapse" id="collapseItem0">
                    <li><a href="category.html">Category</a></li>
                    <li><a href="#">Browse Candidates</a></li>
                    <li><a href="new-post.html">Post a Job</a></li>
                    <li><a href="#">Employeer Profile</a></li>
                    <li class="has-children"><span class="arrow-collapse collapsed" data-toggle="collapse"
                                                   data-target="#collapseItem1"></span>
                        <a href="#">More Links</a>
                        <ul class="collapse" id="collapseItem1">
                            <li><a href="#">Browse Candidates</a></li>
                            <li><a href="#">Post a Job</a></li>
                            <li><a href="#">Employeer Profile</a></li>
                        </ul>
                    </li>

                </ul>
            </li>
            <li><a href="contact.html">Contact</a></li>
            <li>
                {{--                <a href="new-post.html"><span class="bg-primary text-white py-3 px-4 rounded"><span class="icon-plus mr-3"></span>Post New Job</span></a>--}}
                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                    <span class="bg-primary text-white py-3 px-4 rounded">Login</span>
                </button>
            </li>
        </ul>
    </div>
</div>
<div class="site-navbar-wrap js-site-navbar bg-white">

    <div class="container">
        <div class="site-navbar bg-light">
            <div class="py-1">
                <div class="row align-items-center">
                    <div class="col-2">
                        <h2 class="mb-0 site-logo"><a href="{{route('home')}}">Job<strong class="font-weight-bold">Finder</strong>
                            </a></h2>
                    </div>
                    <div class="col-10">
                        <nav class="site-navigation text-right" role="navigation">
                            <div class="container">
                                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#"
                                                                                              class="site-menu-toggle js-menu-toggle text-black active"><span
                                            class="icon-menu h3"></span></a></div>

                                <ul class="site-menu js-clone-nav d-none d-lg-block">
                                    @guest
                                        <li><a href="{{route('register')}}">For Candidates</a></li>
                                        <li>
                                            <a href="{{route('employer.show-register')}}">For Employees</a>
                                        </li>
                                    @endguest
                                    <li><a href="contact.html">Contact</a></li>
                                        <li><a href="{{route('companies.index')}}">Companies</a></li>
                                    <li>
                                        @auth
                                            @php
                                                $user = auth()->user()
                                            @endphp
                                            @if($user->isAdmin())
                                            <li>
                                                <a href="{{route('dashboard')}}">Dashboard</a>
                                            </li>
                                            @endif
                                        <li>
                                            <a  href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>

                                            <li>
                                            <i class="fas fa-user"></i>
                                            <span>{{auth()->user()->name}}</span>
                                        </li>
                                        @else
                                            <button type="button" class="btn bg-primary text-white py-3 px-4 rounded"
                                                    data-toggle="modal" data-target="#login">
                                                <span>Login</span>
                                            </button>
                                        @endauth
                                    </li>

                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="height: 113px;"></div>
