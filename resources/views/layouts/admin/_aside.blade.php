<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('uploads/users_images/default.png')}}"
                     style="width: 90px;height: 50px" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth()->guard('admin')->user()->name}}</p>
                <p>{{auth()->guard('admin')->user()->email}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">



                <li class="side_links"><a href=""><i
                            class=" icon fa fa-th fa-group"></i><span>@lang('site.clients')</span></a></li>

                <li class="side_links"><a href=""><i
                            class=" icon fa fa-th fa-gift"></i><span>@lang('site.orders')</span></a></li>


                <li class="side_links"><a href=""><i
                            class=" icon fa fa-th fa fa-edit"></i><span>@lang('site.reports')</span></a></li>


                <li class="  side_links"><a href=""><i class="icon fa fa-th fa fa-users"></i><span>@lang('site.users')</span></a></li>


        </ul>

    </section>

</aside>

