<!DOCTYPE html>
<html lang="ru">
    <head>
        [[$site_tpl_head]]
        [[$site_tpl_css]]
        [[$site_tpl_css_fancybox]]
        [[$site_tpl_javascript_vk]]
    </head>
    <body>
        <div class="container main">
            [[$site_tpl_header]]
            <div class="container content">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    [[$site_tpl_leftbar]]
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                    [[BreadCrumb?
                    &containerTpl=`site_tpl_breadcrumb_main`
                    &linkCrumbTpl=`site_tpl_breadcrumb_row`
                    &showHomeCrumb=`1`]]
                    [[*content]]
                </div>
            </div>
            [[$site_tpl_footer]] 
        </div>
        [[$site_tpl_javascript]]
        [[$site_tpl_javascript_fancybox]]
    </body>
</html>