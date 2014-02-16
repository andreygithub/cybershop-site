<header>  
    <div class="container topbar"> 
        <div class="col-sm-6 col-md-4 brand"><b>[[++site_name]]</b></div>
        <div class="col-sm-6 col-md-4 info">
            <div class="tel">Тел.: <span>+7 915 773 53 24</span></div>
            <div class="call-me"><a data-toggle="modal" data-target="#call_me_modal" href="#">Обратный звонок</a>
                [[!call_me? &tpl_main=`call_me_main` &tpl_success=`call_me_success` &tpl_mail=`call_me_mail`]]
            </div>
        </div>
        <div class="col-md-4 cart">[[!cs_shop_cart_status?&tpl=`cs_tpl_shop_cart_status`]]</div>
    </div>
[[
    <div class="container logo">
        <a href="[[+site_url]]"><img class="img-responsive"><img src="assets/components/template/images/logo.jpg" alt="Stickerbomb" /></a>
    </div>
]]
[[$site_tpl_navigation]]
</header>