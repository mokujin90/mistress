<?php
/**
 * Created by PhpStorm.
 * User: Сырно
 * Date: 04.07.2015
 * Time: 1:56
 */
?>
<?php $this->beginContent('//layouts/main'); ?>
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 page-sidebar">
                    <aside>
                        <div class="inner-box">
                            <div class="user-panel-sidebar">
                                <div class="collapse-box">
                                    <h5 class="collapse-title no-border"> My Classified <a href="#MyClassified" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down"></i></a></h5>
                                    <div class="panel-collapse collapse in" id="MyClassified">
                                        <ul class="acc-list">
                                            <li><a class="active" href="account-home.html"><i class="icon-home"></i> Personal Home </a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="collapse-box">
                                    <h5 class="collapse-title"> My Ads <a href="#MyAds" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down"></i></a></h5>
                                    <div class="panel-collapse collapse in" id="MyAds">
                                        <ul class="acc-list">
                                            <li><a href="account-myads.html"><i class="icon-docs"></i> My ads <span class="badge">42</span> </a></li>
                                            <li><a href="account-favourite-ads.html"><i class="icon-heart"></i> Favourite ads <span class="badge">42</span> </a></li>
                                            <li><a href="account-saved-search.html"><i class="icon-star-circled"></i> Saved search <span class="badge">42</span> </a></li>
                                            <li><a href="account-archived-ads.html"><i class="icon-folder-close"></i> Archived ads <span class="badge">42</span></a></li>
                                            <li><a href="account-pending-approval-ads.html"><i class="icon-hourglass"></i> Pending approval <span class="badge">42</span></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="collapse-box">
                                    <h5 class="collapse-title"> Terminate Account <a href="#TerminateAccount" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down"></i></a></h5>
                                    <div class="panel-collapse collapse in" id="TerminateAccount">
                                        <ul class="acc-list">
                                            <li><a href="account-close.html"><i class="icon-cancel-circled "></i> Close account </a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </aside>
                </div>

                <div class="col-sm-9 page-content">
                    <div class="inner-box">
                        <div class="row">
                            <div class="col-md-5 col-xs-4 col-xxs-12">
                                <h3 class="no-padding text-center-480 useradmin"><a href=""><img class="userImg" src="images/user.jpg" alt="user"> <?=$this->user->personName;?> </a> </h3>
                            </div>
                            <div class="col-md-7 col-xs-8 col-xxs-12">
                                <div class="header-data text-center-xs">

                                    <div class="hdata">
                                        <div class="mcol-left">

                                            <i class="fa fa-eye ln-shadow"></i> </div>
                                        <div class="mcol-right">

                                            <p><a href="#">7000</a> <em>visits</em></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="hdata">
                                        <div class="mcol-left">

                                            <i class="icon-th-thumb ln-shadow"></i> </div>
                                        <div class="mcol-right">

                                            <p><a href="#">12</a><em>Ads</em></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="hdata">
                                        <div class="mcol-left">

                                            <i class="fa fa-user ln-shadow"></i> </div>
                                        <div class="mcol-right">

                                            <p><a href="#">18</a> <em>Favorites </em></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?=$content;?>
                </div>

            </div>

        </div>
    </div>
<?php $this->endContent(); ?>