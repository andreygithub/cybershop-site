<!DOCTYPE html>
<html lang="ru">
    <head>
        [[$site_tpl_head]]
        [[$site_tpl_css]]
        [[$site_tpl_javascript_vk]]
    </head>
    <body>
        <div class="container main">
            [[$site_tpl_header]]
            [[$site_tpl_carusel]]
            <div class="container content">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    [[$site_tpl_leftbar]]
                </div> <!-- class="col-md-3" -->
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                    <h1> Распродажи </h1>
                    [[!cs_catalog?
                    &tpl_catalog_main=`cs_tpl_catalog_main`
                    &tpl_catalog_element=`cs_tpl_catalog_row`
                    &options=`{"onhomepage":1}`]]
                    [[*content]]
                </div> <!-- class="col-md-9" -->
            </div>
            [[$site_tpl_footer]] 
        </div>
        [[$site_tpl_javascript]]
        [[$site_tpl_javascript_carusel]]
    </body>
</html>
