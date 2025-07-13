<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{ Util::getPropSimpleFromArray($arr_loja, 'googletrackingid') }}"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', '{{ Util::getPropSimpleFromArray($arr_loja, "googletrackingid") }}');
</script>	