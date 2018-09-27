<?php
 
 
//関連記事
function relationFunc( $atts, $content = null ) {
 extract( shortcode_atts( array(
 'head' => '',
 'link' => '',
 'text' => '',
 'color' => ''
 ), $atts ) );
 
 return '<div class="relation-'. $color .'"><p class="relation-head">' . $head .'</p><p class="margin-clear"><a class="relation-link" href="' . $link . '">' . $text . '</a></p></div>';
}
add_shortcode('relation', 'relationFunc');
 
 
//関連記事(記事IDver)
function relationIdFunc( $atts, $content = null ) {
 extract(shortcode_atts(array(
 'y' => null,'m' => null,'d' => null,
 'numberposts' => 5,'offset' => null,'order' => 'DESC','orderby' => 'post_date','meta_key' => null,
 'postid' => null,'exclude' => null,
 'head' => null,'color' => ''
 ),$atts));
 
 
$post = get_posts('post_status=publish&numberposts='.$numberposts.'&offset='.$offset.'&order='.$order.'&orderby='.$orderby.'&include='.$postid.'&year='.$y.'&monthnum='.$m.'&day='.$d.'&exclude='.get_the_ID().','.$exclude.'&meta_key='.$meta_key.$mode);
 
 foreach ($post as $item){
 $echo .= '<a class="relation-link-id-link" href="' . get_permalink($item->ID) . '">' . $item->post_title . '</a><br>';
 }
 
 return '<div class="relation-'. $color .'"><p class="relation-head">'. $head .'</p><p class="margin-clear"><span class="relation-link-id">'. $echo .'</span></p></div>';
}
 
add_shortcode('relationId', 'relationIdFunc');