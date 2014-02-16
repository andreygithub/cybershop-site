<!DOCTYPE html>
<html lang="ru">
    <head>
        [[$site_tpl_head]]
        [[$site_tpl_css]]
        [[$site_tpl_css_fancybox]]
    </head>
    <body>
        <div class="container main">
            [[$site_tpl_header]]
            <div class="container content">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    [[$site_tpl_leftbar]]
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                    [[!cs_breadcrumbs?
                    &tpl_main=`cs_tpl_breadcrumb_main`
                    &tpl_row=`cs_tpl_breadcrumb_row`
                    &tpl_active_row=`cs_tpl_breadcrumb_row_active`
                    &id_catalog_get=`4`]]
                    [[*content]]
                </div>
            </div>
            [[$site_tpl_footer]] 
        </div>
        [[$site_tpl_javascript]]
        [[$site_tpl_javascript_fancybox]]
    </body>
</html>