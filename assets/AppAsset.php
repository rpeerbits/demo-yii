<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;
/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = 
    [
        'plugins/font-awesome/css/font-awesome.min.css',
        'plugins/simple-line-icons/simple-line-icons.min.css',
        'plugins/bootstrap/css/bootstrap.min.css',
        'plugins/bootstrap-switch/css/bootstrap-switch.min.css',
        'plugins/bootstrap-daterangepicker/daterangepicker.min.css',
        
        
        
        'css/components.min.css',
        'css/plugins.min.css',
        
        'layouts/layout/css/layout.min.css',
        'layouts/layout/css/themes/darkblue.min.css',
        'layouts/layout/css/custom.min.css'

        
        

    ];
    
    public $js = 
    [
        'plugins/jquery.js',
        'plugins/jquery.min.js',
        'plugins/bootstrap/js/bootstrap.min.js',
        'plugins/js.cookie.min.js',
        'plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        'plugins/jquery.blockui.min.js',
        'plugins/bootstrap-switch/js/bootstrap-switch.min.js',
        
        'plugins/moment.min.js',
        
        'scripts/app.min.js',
        'scripts/dashboard.min.js',
        'layouts/layout/scripts/layout.min.js',
        'layouts/layout/scripts/demo.min.js',
        'layouts/global/scripts/quick-sidebar.min.js',
     
        
        
        

    ];
    
    public $jsOptions = array(
    'position' => \yii\web\View::POS_HEAD
    );
   
}
