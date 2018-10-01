<?php

// 子テーマのstyle.cssを後から読み込む
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('style')
    );
}


// 子テーマ版のlibrary/shortcode.php読み込み
require_once( 'library_child/shortcode.php' );



//▼rinkerのクレジット削除
/**
* Rinkerのクレジットを削除します
*/
function yyi_rinker_delete_credit_html_data( $meta_datas ) {
	$meta_datas[ 'credit' ] = '';
	return $meta_datas;
}
add_filter( 'yyi_rinker_meta_data_update',  'yyi_rinker_delete_credit_html_data', 200 );


//▼rinkerrの購入ボタンに「から探す」を追加
function yyi_rinker_custom_shop_labels( $attr ) {
	$attr[ 'alabel' ]	= 'Amazonから探す';
	$attr[ 'rlabel' ]	= '楽天から探す';
	$attr[ 'ylabel' ]	= 'Yahooショッピングから探す';
	return $attr;
}
add_action( 'yyi_rinker_update_attribute', 'yyi_rinker_custom_shop_labels' );



// MOREタグの下に広告を表示
add_filter('the_content', 'adMoreReplace');
function adMoreReplace($contentData) {
if (is_mobile()){
$adTags = <<< EOF

<div class="add more">
<!--ここにスマホ用の広告コードをはりつけてください。-->

</div>

EOF;
} else{
$adTags = <<< EOF

<div class="add more">
<!--ここにPC用・タブレット用の広告コードをはりつけてください。-->

</div>
  
EOF;
}
$contentData = preg_replace('/<p><span id="more-([0-9]+?)"><\/span>(.*?)<\/p>/i', $adTags, $contentData);
$contentData = str_replace('', "", $contentData);
$contentData = str_replace('', '', $contentData);
return $contentData;
}


//▼見出しごとのアドセンス広告

function add_ad_before_h2_for_3times($the_content) {
//広告（AdSense）タグを記入
$ad = <<< EOF
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- H2タグ上広告 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-6583929129673787"
     data-ad-slot="5628566558"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
EOF;
 
  if ( is_single() ) {//投稿ページ
    $h2 = '/^<h2.*?>.+?<\/h2>$/im';//H2見出しのパターン
    if ( preg_match_all( $h2, $the_content, $h2s )) {//H2見出しが本文中にあるかどうか
      if ( $h2s[0] ) {//チェックは不要と思うけど一応
        if ( $h2s[0][3] ) {//3番目のH2見出し手前に広告を挿入
          $the_content  = str_replace($h2s[0][3], $ad.$h2s[0][3], $the_content);
        }
        if ( $h2s[0][6] ) {//6番目のH2見出し手前に広告を挿入
          $the_content  = str_replace($h2s[0][6], $ad.$h2s[0][6], $the_content);
        }
        if ( $h2s[0][9] ) {//9番目のH2見出し手前に広告を挿入
          $the_content  = str_replace($h2s[0][9], $ad.$h2s[0][9], $the_content);
        }
        if ( $h2s[0][12] ) {//12番目のH2見出し手前に広告を挿入
          $the_content  = str_replace($h2s[0][12], $ad.$h2s[0][12], $the_content);
        }
        if ( $h2s[0][15] ) {//15番目のH2見出し手前に広告を挿入
          $the_content  = str_replace($h2s[0][15], $ad.$h2s[0][15], $the_content);
        }
      }
    }
  }
  return $the_content;
}
add_filter('the_content','add_ad_before_h2_for_3times');



//▼コメント欄に周期的にアドセンスタグを出力

function add_ad_to_comments_3times($the_content) {
//広告（AdSense）タグを記入
$ad2 = <<< EOF
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- commentタグ上広告 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-6583929129673787"
     data-ad-slot="5628566558"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
EOF;
 
  if ( is_single() ) {//投稿ページかどうか判別
    $cmBlock = '/<div class="reply">.+?/im';//正規表現でのコメント抽出ロジック　　ここがうまくいかないのよね
    if ( preg_match_all($cmBlock, $the_content, $cmBlocks )) {//$cmBlockで定義した内容を全部取得し、$cmBlocksに格納
      if ( $cmBlocks[0] ) {//チェックは不要と思うけど一応
        if ( $cmBlocks[0][3] ) {//3番目のcomment手前に広告を挿入
          $the_content  = str_replace($cmBlocks[0][3], $ad2."ほげほげ".$cmBlocks[0][3], $the_content);
        }
        if ( $cmBlocks[0][6] ) {//6番目のcomment手前に広告を挿入
          $the_content  = str_replace($cmBlocks[0][6], $ad2.$cmBlocks[0][6], $the_content);
        }
        if ( $cmBlocks[0][9] ) {//9番目のcomment手前に広告を挿入
          $the_content  = str_replace($cmBlocks[0][9], $ad2.$cmBlocks[0][9], $the_content);
        }
        if ( $cmBlocks[0][12] ) {//12番目のcomment手前に広告を挿入
          $the_content  = str_replace($cmBlocks[0][12], $ad2.$cmBlocks[0][12], $the_content);
        }
        if ( $cmBlocks[0][15] ) {//15番目のcomment手前に広告を挿入
          $the_content  = str_replace($cmBlocks[0][15], $ad2.$cmBlocks[0][15], $the_content);
        }
      }
    }
  }
  return $the_content;
}
add_filter('the_content','add_ad_to_comments_3times');


