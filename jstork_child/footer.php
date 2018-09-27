<div id="page-top">
	<a href="#header" title="ページトップへ"><i class="fa fa-chevron-up"></i></a>
</div>
<?php if(!is_singular( 'post_lp' ) ): ?>
<div id="footer-top" class="wow animated fadeIn cf <?php echo get_option('side_options_headerbg');?>">
	<div class="inner wrap cf">
		<?php if ( is_mobile() && is_active_sidebar( 'footer-sp' )) : ?>
		<?php dynamic_sidebar( 'footer-sp' ); ?>
		<?php else:?>
		<?php if ( is_active_sidebar( 'footer1' ) ) : ?>
			<div class="m-all t-1of2 d-1of3">
			<?php dynamic_sidebar( 'footer1' ); ?>
			</div>
		<?php endif; ?>
		
		<?php if ( is_active_sidebar( 'footer2' ) ) : ?>
			<div class="m-all t-1of2 d-1of3">
			<?php dynamic_sidebar( 'footer2' ); ?>
			</div>
		<?php endif; ?>
		
		<?php if ( is_active_sidebar( 'footer3' ) ) : ?>
			<div class="m-all t-1of2 d-1of3">
			<?php dynamic_sidebar( 'footer3' ); ?>
			</div>
		<?php endif; ?>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>

<footer id="footer" class="footer <?php echo get_option('side_options_headerbg');?>" role="contentinfo">
	<div id="inner-footer" class="inner wrap cf">
		<nav role="navigation">
			<?php wp_nav_menu(array(
			'container' => 'div',
			'container_class' => 'footer-links cf',
			'menu' => __( 'Footer Links' ),
			'menu_class' => 'footer-nav cf',
			'theme_location' => 'footer-links',
			'before' => '',
			'after' => '',
			'link_before' => '',
			'link_after' => '',
			'depth' => 0,
			'fallback_cb' => ''
			)); ?>
		</nav>
		<p class="source-org copyright">&copy;Copyright<?php echo date('Y'); ?> <a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo( 'name' ); ?></a>.All Rights Reserved.</p>
	</div>
</footer>
</div>
<?php wp_footer(); ?>
<!-- Research Artisan Pro Script Tag Start -->
<script type="text/javascript">
  var _Ra = {};
  _Ra.hId = '1';
  _Ra.uCd = '18011800006088450013';
  (function() {var s=document.getElementsByTagName('script')[0],js=document.createElement('script');js.type='text/javascript';js.async='async';js.src='https://analyze.pro.research-artisan.com/track/script.php';s.parentNode.insertBefore(js,s);})();
</script>
<noscript><p><img src="https://analyze.pro.research-artisan.com/track/tracker.php?ucd=18011800006088450013&amp;hid=1&amp;guid=ON" alt="" width="1" height="1" /></p></noscript>
<!-- Research Artisan Pro Script Tag End   -->
<!-- Research Artisan Pro Recording Script Tag Start -->
<script>
(function() {var ssl=window.location.protocol=='https:'?true:false,s=document.getElementsByTagName('script')[0],rc=document.createElement('script');_Ra.recServer='recording.research-artisan.com';_Ra.port=ssl?'443':'80';_Ra.nPort=ssl?'3443':'3000';_Ra.proto=ssl?'https://':'http://';_Ra.rhid=0;rc.src=_Ra.proto+_Ra.recServer+':'+_Ra.port+'/js/track.min.js';rc.async=true;rc.defer=true;s.parentNode.insertBefore(rc,s);})();
</script>
<!-- Research Artisan Pro Recording Script Tag End -->
</body>
</html>

<?php
var_dump($cmBlook);
?>