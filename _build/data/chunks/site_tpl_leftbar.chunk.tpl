[[!cs_categorys?
&tpl_main=`cs_tpl_menu_sidebar_main`
&tpl_element=`cs_tpl_menu_sidebar_row`
&tpl_element_active=`cs_tpl_menu_sidebar_row_active`]]

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Наши услуги</h3>
    </div>
    <div class="panel-body">
        [[Wayfinder? 
        &startId=`17`
        &level=`1`
        &rowTpl=`site_tpl_sidebar_catalog_row` 
        &hereTpl =`site_tpl_sidebar_catalog_row_active`
        &outerTpl =`site_tpl_sidebar_catalog_main`
        ]]   
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><a href="[[~11]]">Новые записи в блоге</a></h3>
    </div>
    <div class="panel-body">
        [[getResources? 
        &parents=`11`
        &limit=`4`
        &sortby=`{"publishedon":"DESC"}` 
        &tpl=`site_tpl_sidebar_blogs_row` 
        &tplLast=`site_tpl_sidebar_blogs_row_last`
        &showHidden=`1` 
        &includeContent=`1`
        &includeTVs=`1`
        &processTVs=`1`]]   
    </div>
</div>

[[$site_tpl_vk_widget]]  
