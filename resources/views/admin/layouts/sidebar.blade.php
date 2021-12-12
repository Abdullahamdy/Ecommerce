
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">

                    {{--// profile image and display name of user--}}

                    <span>
                            <img alt="image"  style="max-width: 183px;"
                                 src="{{asset('photos/cartoon.png')}}"/>
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="block m-t-xs">
                                    <strong class="font-bold"></strong>
                                    {{-- <strong class="font-bold">{{Auth::user()->name}}</strong> --}}

                                </span>
                            </span>
                    </a>



                </div>

                <div class="logo-element">

                    <img src="{{asset('photos/logo_title.png')}}" style="margin-top: 20px; margin-bottom:auto;" height="20"
                         alt="logo">
                </div>
            </li>
            {{--Home--}}

            <li>
                <a href="{{url('admin/product')}}">
                    <i class="fa fa-home"></i>
                    <span class="nav-label">المنتجات </span>
                </a>
            </li>
            <li>
                <a href="{{url('admin/inbox')}}">
                    <i class="fa fa-home"></i>
                    <span class="nav-label">الرسائل </span>
                </a>
            </li>
            <li>
                <a href="{{url('admin/category')}}">
                    <i class="fa fa-home"></i>
                    <span class="nav-label">التصنيفات </span>
                </a>
            </li>

            <li>
                <a href="{{url('admin/social-media')}}">
                    <i class="fa fa-home"></i>
                    <span class="nav-label">الحسابات الشخصية</span>
                </a>
            </li>

          

            <li>
                <a href="{{url('admin/client')}}">
                    <i class="fa fa-building" aria-hidden="true"></i>
                    <span class="nav-label">  المستخدمين</span>
                </a>
            </li>
            <li>


           


          



    




        </ul>
    </div>
</nav>
