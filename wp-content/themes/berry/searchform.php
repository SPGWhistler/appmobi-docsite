<form method="get" class="searchform" action="<?php bloginfo('home'); ?>">
	<div>
		<input type="text" value="<?php if(isset($s)){echo wp_specialchars($s, 1);} else{echo 'Search';} ?>" name="s" class="searchtext" onfocus="if(this.value == 'Search'){this.value = '';}" onblur="if(this.value == ''){this.value = 'Search';}"/>
		<button type="submit">Go</button>
	</div>
</form>
