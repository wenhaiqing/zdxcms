<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name='TTUNION_verify' content='b846c3c2b85efabc496d2a2b8399cd62'>
    <meta name="baidu_union_verify" content="cac58ed2e3155eda17d13f99c687243a">
    <meta name="sogou_site_verification" content="gI1bINaJcL"/>
    <meta name="360-site-verification" content="37ae9186443cc6e270d8a52943cd3c5a"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="keywords" content="红色e站,吕梁党建网">
    <meta name="description" content="红色e站,吕梁党建网">
    <meta name="author" content="AUI, a-ui.com">
    <meta name="baidu-site-verification" content="ZVPGgtpUfW"/>
    <title>红色e站--专题学习</title>
    <link rel="icon" type="image/x-icon" href="/Public/lldjwap2/favicon.ico">
    <link href="/Public/lldjwap2/iTunesArtwork@2x.png" sizes="114x114" rel="apple-touch-icon-precomposed">
    <link rel="stylesheet" href="{{asset('wap/amaze/css/amazeui.min.css')}}">
    <link rel="stylesheet" href="{{asset('wap/amaze/css/wap.css')}}">
</head>
<body style="background:#ececec">
<div class="pet_mian" >
    <div class="pet_head">
        <header data-am-widget="header"
                class="am-header am-header-default pet_head_block">
            <div class="am-header-left am-header-nav ">
                <a href="#left-link" class="iconfont pet_head_jt_ico">&#xe601;</a>
            </div>
            <div class="pet_news_list_tag_name">专题学习</div>
            <div class="am-header-right am-header-nav">
                <a href="javascript:;" class="iconfont pet_head_gd_ico">&#xe600;</a>
            </div>
        </header>
    </div>


</div>
</div>

<div class="pet_content pet_content_list pet_topci">
    <div class="pet_article_like">
        <div class="pet_content_main pet_article_like_delete">
            <div data-am-widget="list_news" class="am-list-news am-list-news-default am-no-layout">
                <div class="am-list-news-bd">
                    <ul class="am-list">
                        <!--缩略图在标题右边-->
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-right pet_topci_list">
                            <a href="http://www.chinanews.com/gn/z/2018quanguolianghui/index.shtml" class="pet_topci_block">
                                <div class="pet_topci_video"><i class="iconfont">&#xe62d;</i></div>
                                <div class="pet_topci_shadow_font">2018全国两会专题</div>
                                <div class="pet_topci_shadow"></div>
                                <img src="{{asset('wap/bootstrap/images/lldj/s22.jpg')}}" alt="">
                            </a>
                        </li>
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-right pet_topci_list">
                            <a href="http://www.12371.cn/special/xg19thjs/" class="pet_topci_block">
                                <div class="pet_topci_video"><i class="iconfont">&#xe62d;</i></div>
                                <div class="pet_topci_shadow_font">学习贯彻党的十九届三中全会精神</div>
                                <div class="pet_topci_shadow"></div>
                                <img src="{{asset('wap/bootstrap/images/lldj/s11.jpg')}}" alt="">
                            </a>
                        </li>
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-right pet_topci_list">
                            <a href="http://www.12371.cn/special/2017qgzzbzhy/" class="pet_topci_block">
                                <div class="pet_topci_video"><i class="iconfont">&#xe62d;</i></div>
                                <div class="pet_topci_shadow_font">全国组织部长会议</div>
                                <div class="pet_topci_shadow"></div>
                                <img src="{{asset('wap/bootstrap/images/lldj/s33.jpg')}}" alt="">
                            </a>
                        </li>
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-right pet_topci_list">
                            <a href="http://www.12371.cn/special/xsdcyzd/" class="pet_topci_block">
                                <div class="pet_topci_video"><i class="iconfont">&#xe62d;</i></div>
                                <div class="pet_topci_shadow_font">新时代全面从严治党</div>
                                <div class="pet_topci_shadow"></div>
                                <img src="{{asset('wap/bootstrap/images/lldj/s44.jpg')}}" alt="">
                            </a>
                        </li>

                        <!--<li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-right pet_topci_list">
                          <a href="###" class="pet_topci_block">
                            <div class="pet_topci_video"><i class="iconfont">&#xe62d;</i><span>3:42</span></div>
                            <div class="pet_topci_shadow_font">Twitter 正式任命 Jack Dorsey 为 CEO。</div>
                            <div class="pet_topci_shadow"></div>
                            <img src="img/c6.png" alt="">
                          </a>
                        </li>-->


                    </ul>
                </div>

            </div>

        </div>

    </div>

    <div class="pet_article_footer_info">中共吕梁市委组织部</div>
</div>
</div>
<script src="/Public/lldjwap2/js/jquery.min.js"></script>
<script src="/Public/lldjwap2/js/amazeui.min.js"></script>
<script>
    $(function(){

        // 动态计算新闻列表文字样式
        auto_resize();
        $(window).resize(function() {
            auto_resize();
        });
        $('.am-list-thumb img').load(function(){
            auto_resize();
        });
        $('.pet_article_like li:last-child').css('border','none');
        function auto_resize(){
            $('.pet_list_one_nr').height($('.pet_list_one_img').height());
            // alert($('.pet_list_one_nr').height());
        }
        $('.pet_article_user').on('click',function(){
            if($('.pet_article_user_info_tab').hasClass('pet_article_user_info_tab_show')){
                $('.pet_article_user_info_tab').removeClass('pet_article_user_info_tab_show').addClass('pet_article_user_info_tab_cloes');
            }else{
                $('.pet_article_user_info_tab').removeClass('pet_article_user_info_tab_cloes').addClass('pet_article_user_info_tab_show');
            }
        });

        $('.pet_head_gd_ico').on('click',function(){
            $('.pet_more_list').addClass('pet_more_list_show');
        });
        $('.pet_more_close').on('click',function(){
            $('.pet_more_list').removeClass('pet_more_list_show');
        });
    });

</script>
</body>
</html>