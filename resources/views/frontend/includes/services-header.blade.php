<div id="loader" class="load-full-screen">
    <div class="loading-animation">
        <span><i class="fa fa-plane"></i></span>
        <span><i class="fa fa-bed"></i></span>
        <span><i class="fa fa-ship"></i></span>
        <span><i class="fa fa-suitcase"></i></span>
    </div>
</div>

<div class="cswitcher">
    <div id="color-switcher">
        <h6>CHOOSE COLOR</h6>
        <ul>
            <li class="green" data-path="assets/css/color/green.css"></li>
            <li class="light-green" data-path="assets/css/color/light-green.css"></li>
            <li class="red" data-path="assets/css/dummy.css"></li>
            <li class="blue" data-path="assets/css/color/blue.css"></li>
            <li class="brown" data-path="assets/css/color/brown.css"></li>
            <li class="purple" data-path="assets/css/color/purple.css"></li>
            <li class="orange" data-path="assets/css/color/orange.css"></li>
            <li class="yellow" data-path="assets/css/color/yellow.css"></li>
        </ul>
    </div>
</div>
<span id="stoggle"><i class="fa fa-cog"></i></span>
<div class="site-wrapper">
    <div class="row header-top">
        <div class="container clear-padding">
            <div class="navbar-contact">
                <div class="col-md-7 col-sm-6 clear-padding">
                    <a href="#" class="transition-effect"><i class="fa fa-phone"></i> (+91) 1234567890</a>
                    <a href="#" class="transition-effect"><i class="fa fa-envelope-o"></i> support@email.com</a>
                </div>
                <div class="col-md-5 col-sm-6 clear-padding search-box">
                    <div class="col-md-6 col-xs-5 clear-padding">
                        <form>
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" required placeholder="Search">
                                <span class="input-group-addon"><i class="fa fa-search fa-fw"></i></span>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 col-xs-7 clear-padding user-logged">
                        @if (Auth::user())
                            <a href="#" class="transition-effect">
                                <img src="assets/images/user.jpg" alt="cruise">
                                Hello {{ Auth::user()->name }}
                            </a>
                        @endif
                        <a href="signout" class="transition-effect">
                            <i class="fa fa-sign-out"></i>Sign Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row light-menu">
        <div class="container clear-padding">
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                    <li><a href="home"> HOME</a></li>
                    <li><a href="transfer"> TRANSFERS</a></li>
                    <li><a href="hotel"> HOTELS</a></li>
                    <li><a href="villa"> VILLAS</a></li>
                    <li><a href="tour"> TOURS</a></li>
                    <li><a href="air"> AIR FARE</a></li>
                    <li><a href="cruise"> CRUISE</a></li>
                    <li><a href="contact"> CONTACT</a></li>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
