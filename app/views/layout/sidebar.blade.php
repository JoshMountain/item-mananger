                <!-- Main Sidebar -->
                <div id="sidebar">
                    <!-- Sidebar Brand -->
                    <div id="sidebar-brand" class="themed-background">
                        <a href="{{ URL::route('home') }}" class="sidebar-title">
                            <i class="fa fa-cube"></i> <span class="sidebar-nav-mini-hide">Manage<strong>Items</strong></span>
                        </a>
                    </div>
                    <!-- END Sidebar Brand -->

                    <!-- Wrapper for scrolling functionality -->
                    <div id="sidebar-scroll">
                        <!-- Sidebar Content -->
                        <div class="sidebar-content">
                            <!-- Sidebar Navigation -->
                            <ul class="sidebar-nav">
                                <li>
                                    <a href="{{ URL::route('home') }}" class=" active"><i class="gi gi-compass sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                                </li>
                                <li class="sidebar-separator">
                                    <i class="fa fa-ellipsis-h"></i>
                                </li>

                                @if( Auth::check() )

                                <li>
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-cube sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Items</span></a>
                                    <ul>
                                        <li>
                                            <a href="#">Add New Item</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-tags sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">States</span></a>
                                    <ul>
                                        <li>
                                            <a href="#">Add New State</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-more_items sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Types</span></a>
                                    <ul>
                                        <li>
                                            <a href="{{ URL::route('type-create') }}">Add New Type</a>
                                        </li>
                                    </ul>
                                </li>

                                @else

                                <li>
                                    <a href="{{ URL::route('account-sign-in') }}"><i class="gi gi-keys sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Sign In</span></a>
                                </li>

                                <li>
                                    <a href="{{ URL::route('account-create') }}"><i class="gi gi-plus sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Register</span></a>
                                </li>

                                @endif

                                <li class="sidebar-separator">
                                    <i class="fa fa-ellipsis-h"></i>
                                </li>

                                <li>
                                    <a href="#"><i class="fa fa-support sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Support Center</span></a>
                                </li>
                            </ul>
                            <!-- END Sidebar Navigation -->
                        </div>
                        <!-- END Sidebar Content -->
                    </div>
                    <!-- END Wrapper for scrolling functionality -->

                    <!-- Sidebar Extra Info -->
                    <div id="sidebar-extra-info" class="sidebar-content sidebar-nav-mini-hide">
                        <div class="push-bit">
                            <span class="pull-right">
                                <a href="javascript:void(0)" class="text-light"><i class="fa fa-plus"></i></a>
                            </span>
                            <small><strong class="text-light">780 Items</strong> / 1000 Items</small>
                        </div>
                        <div class="progress progress-mini push-bit">
                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%"></div>
                        </div>
                        <div class="text-center">
                            <small>Crafted with <i class="fa fa-heart text-danger"></i> by <a href="http://joshmountain.com" target="_blank">Josh Mountain</a></small><br>
                            <small><span id="year-copy"></span> &copy; Item Manager 1.0.0</small>
                        </div>
                    </div>
                    <!-- END Sidebar Extra Info -->
                </div>
                <!-- END Main Sidebar -->