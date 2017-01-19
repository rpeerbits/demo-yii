<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
?>

<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 50px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit">
                                <i class="icon-magnifier"></i>
                            </a>
                        </span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            
                <li class="nav-item start active open">
                <a href="/php/demo/basic/web" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Blog</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start active open">
                        <a href="/php/demo/basic/web/blog/create" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Create</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="/php/demo/basic/web/blog/" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">List</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>