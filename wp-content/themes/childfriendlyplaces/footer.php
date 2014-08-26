<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<?php wp_footer(); ?>
</div>
</div>

<div id="secnavbar">
<hr/>
<div class="nav">
  <div>
    <h3 class="attenuate"><?php _e("Facilitator Guides", 'childfriendlyplaces'); ?></h3>
    <ul>
      <li><a href="<?php echo post_permalink(24); ?>"><?php echo get_the_title(24); ?></a></li>
      <li><a href="<?php echo post_permalink(45); ?>"><?php echo get_the_title(45); ?></a></li>
      <li><a href="<?php echo post_permalink(47); ?>"><?php echo get_the_title(47); ?></a></li>
      <li><a href="<?php echo post_permalink(49); ?>"><?php echo get_the_title(49); ?></a></li>
      <li><a href="<?php echo post_permalink(51); ?>"><?php echo get_the_title(51); ?></a></li>
      <li><a href="<?php echo post_permalink(53); ?>"><?php echo get_the_title(53); ?></a></li>
      <li><a href="<?php echo post_permalink(55); ?>"><?php echo get_the_title(55); ?></a></li>
      <li><a href="<?php echo post_permalink(57); ?>"><?php echo get_the_title(57); ?></a></li>
    </ul>
  </div>
  <div>
    <h3 class="attenuate"><?php _e("Background Materials", 'childfriendlyplaces'); ?></h3>
    <ul>
	  <li><a href="/resourcekit/"><?php _e("Resource Kit Overview"); ?></a></li>
	  <li><a href="/resourcekit/introduction-to-the-resource-kit/"><?php _e("Introduction to the Resource Kit"); ?></a></li>
	  <li><a href="/tracking/redirect/?url=http%3A%2F%2Fchildfriendlyplaces.org%2Fresourcekit%3Fdid%3D285%26vp_edd_act%3Dshow_download"><?php _e("Ways to Use the Resource Kit"); ?></a></li>
	  <!-- <li><a href="/tracking/redirect/?url=http%3A%2F%2Fchildfriendlyplaces.org%2Fresourcekit%3Fdid%3DXXX%26vp_edd_act%3Dshow_download"><?php _e("Assessment Topics and Items"); ?></a></li> -->
	  <li><a href="/tracking/redirect/?url=http%3A%2F%2Fchildfriendlyplaces.org%2Fresourcekit%3Fdid%3D278%26vp_edd_act%3Dshow_download"><?php _e("Adapting the Resource Kit to Your Context"); ?></a></li>
	  <li><a href="/tracking/redirect/?url=http%3A%2F%2Fchildfriendlyplaces.org%2Fresourcekit%3Fdid%3D81%26vp_edd_act%3Dshow_download"><?php _e("Planning Your Assessment Process"); ?></a></li>
	  <li><a href="/tracking/redirect/?url=http%3A%2F%2Fchildfriendlyplaces.org%2Fresourcekit%3Fdid%3D173%26vp_edd_act%3Dshow_download"><?php _e("Identifying Participants"); ?></a></li>
	  <li><a href="/tracking/redirect/?url=http%3A%2F%2Fchildfriendlyplaces.org%2Fresourcekit%3Fdid%3D172%26vp_edd_act%3Dshow_download"><?php _e("Working with Different Age Groups"); ?></a></li>
	  <li><a href="/tracking/redirect/?url=http%3A%2F%2Fchildfriendlyplaces.org%2Fresourcekit%3Fdid%3D171%26vp_edd_act%3Dshow_download"><?php _e("Ensuring the Participation of Everyone"); ?></a></li>
	  <li><a href="/tracking/redirect/?url=http%3A%2F%2Fchildfriendlyplaces.org%2Fresourcekit%3Fdid%3D170%26vp_edd_act%3Dshow_download"><?php _e("Understanding Children's Rights"); ?></a></li>
	  <li><a href="/tracking/redirect/?url=http%3A%2F%2Fchildfriendlyplaces.org%2Fresourcekit%3Fdid%3D739%26vp_edd_act%3Dshow_download"><?php _e("Creating a Children’s Rights Community Observatory"); ?></a></li>
	  <li><a href="/tracking/redirect/?url=http%3A%2F%2Fchildfriendlyplaces.org%2Fresourcekit%3Fdid%3D130%26vp_edd_act%3Dshow_download"><?php _e("Developing and Sharing a Case Study"); ?></a></li>
    </ul>
  </div>
</div>
</div>

<div id="footer">
  <div>
    <h3 class="attenuate"><?php _e('Initiative, Research & Coordination', 'childfriendlyplaces'); ?></h3>
    <a href="http://cergnyc.org/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cerg.png" title="CERG"></a>
    <a href="http://www.gc.cuny.edu/Home"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cuny.png" title="The Graduate Center - City University of New York"></a>
  </div>

  <div>
    <h3 class="attenuate"><?php _e('Support', 'childfriendlyplaces'); ?></h3>
    <a href="http://www.bernardvanleer.org/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bernard_van_leer.png" title="Bernard Van Leer Foundation"></a>
  </div>

  <div>
    <h3 class="attenuate"><?php _e('Webdesign & Development', 'childfriendlyplaces'); ?></h3>
    <a href="http://it3s.org/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/it3s.png" title="it3s"></a>
  </div>

  <div class="license">
    <h3 class="attenuate"><?php _e('License', 'childfriendlyplaces'); ?></h3>
    <p class="small">
     <?php _e('Except where otherwise noted, content on this site is licensed under a <a href="http://creativecommons.org/licenses/by-sa/3.0/deed.en_US">Creative Commons Attribution-ShareAlike 3.0 Unported License</a>.', 'childfriendlyplaces' ); ?>
    </p>
  </div>
</div>

</body>
</html>
