<div class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button class="navbar-toggle btn btn-primary" type="button" data-toggle="collapse" data-target="#navbar-collapse">Показать меню</button>
        <div class="navbar-collapse-bar">
            <div class="col-xs-5"><a class="navbar-brand" href="#">[[++site_name]]</a></div>
            <div class="col-xs-3 cart">[[!cs_shop_cart_status?&tpl=`cs_tpl_shop_cart_status`]]</div>
        </div>
    </div>
    <nav class="collapse navbar-collapse" id="navbar-collapse">
        [[Wayfinder? 
        &startId=`0`
        &level=`1`
        &rowTpl=`site_tpl_navigation_menu_row` 
        &hereTpl =`site_tpl_navigation_menu_row_active`
        &outerTpl =`site_tpl_navigation_menu_main`
        ]] 
        <ul class="nav navbar-nav navbar-right">
            <form class="navbar-form navbar-left" method="GET" action="[[~8]]" role="search">
                <div class="form-group search">
                    <input type="text" name="search_string" class="form-control" placeholder="Найти">
                    <i class="glyphicon glyphicon-search" onclick="$(this).closest('form').submit()"></i>
                </div>
            </form>
        </ul>
    </nav>
</div>