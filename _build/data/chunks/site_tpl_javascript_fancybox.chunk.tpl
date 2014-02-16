<script type="text/javascript" src="assets/template/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="assets/template/fancybox/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="assets/template/fancybox/helpers/jquery.fancybox-buttons.js"></script>
<script type="text/javascript" src="assets/template/fancybox/helpers/jquery.fancybox-media.js"></script>
<script type="text/javascript" src="assets/template/fancybox/helpers/jquery.fancybox-thumbs.js"></script>
<script>
$(document).ready(function() {
        $(".fancybox").fancybox();
	$(".fancybox-thumb").fancybox({
		prevEffect	: 'none',
		nextEffect	: 'none',
		helpers	: {
			title	: {
				type: 'outside'
			},
			thumbs	: {
				width	: 50,
				height	: 50
			}
		}
	});
});
</script>