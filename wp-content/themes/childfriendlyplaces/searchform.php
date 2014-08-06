<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div><label class="screen-reader-text" for="s">Search for:</label>
	<input type="text" value="" name="s" id="s" placeholder="<?php  _e( 'Search', 'childfriendlyplaces' ); ?>" />
        <input type="submit" id="searchsubmit" value="<?php  _e( 'Search', 'childfriendlyplaces' ); ?>" />
    </div>
</form>
