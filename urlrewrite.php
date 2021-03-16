<?php
$arUrlRewrite=array (
  0 => 
  array (
    'CONDITION' => '#^/online/([\\.\\-0-9a-zA-Z]+)(/?)([^/]*)#',
    'RULE' => 'alias=$1',
    'ID' => '',
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  40 => 
  array (
    'CONDITION' => '#^/video/([\\.\\-0-9a-zA-Z]+)(/?)([^/]*)#',
    'RULE' => 'alias=$1&videoconf',
    'ID' => 'bitrix:im.router',
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/company/vacancy/([0-9]+)/([0-9]+)/#',
    'RULE' => 'sid=$1&eid=$2',
    'ID' => '',
    'PATH' => '/company/vacancy/detail.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/([a-zA-Z_]{1,})/([a-zA-Z_]{1,})$#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/$1/$2/',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/shop/promo/([a-zA-Z0-9_]+)/#',
    'RULE' => 'CODE=$1',
    'ID' => '',
    'PATH' => '/shop/promo/index.php',
    'SORT' => 100,
  ),
  4 => 
  array (
    'CONDITION' => '#^/brandz/([0-9a-zA-Z_\\-]+)/#',
    'RULE' => 'sid=$1',
    'ID' => '',
    'PATH' => '/brandz/list.php',
    'SORT' => 100,
  ),
  5 => 
  array (
    'CONDITION' => '#^/company/vacancy/([0-9]+)/#',
    'RULE' => 'sid=$1',
    'ID' => '',
    'PATH' => '/company/vacancy/list.php',
    'SORT' => 100,
  ),
  6 => 
  array (
    'CONDITION' => '#^/company/novelty/([0-9]+)/#',
    'RULE' => 'eid=$1',
    'ID' => '',
    'PATH' => '/company/novelty/detail.php',
    'SORT' => 100,
  ),
  7 => 
  array (
    'CONDITION' => '#^/clients_test/([0-9a-z]+)/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/clients_test/index.php',
    'SORT' => 100,
  ),
  8 => 
  array (
    'CONDITION' => '#^/company/actions/([0-9]+)/#',
    'RULE' => 'eid=$1',
    'ID' => '',
    'PATH' => '/company/actions/detail.php',
    'SORT' => 100,
  ),
  10 => 
  array (
    'CONDITION' => '#^/bitrix/services/ymarket/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/bitrix/services/ymarket/index.php',
    'SORT' => 100,
  ),
  9 => 
  array (
    'CONDITION' => '#^/shops/([0-9]+)/([0-9]+)/#',
    'RULE' => 'sid=$1&gid=$2',
    'ID' => '',
    'PATH' => '/shops/urlrewrite.php',
    'SORT' => 100,
  ),
  11 => 
  array (
    'CONDITION' => '#^/light/([^brand]+)[/]*$#',
    'RULE' => 'SECTION_CODE=$1',
    'ID' => '',
    'PATH' => '/light/brand/index.php',
    'SORT' => 100,
  ),
  12 => 
  array (
    'CONDITION' => '#^/company/photogallery/#',
    'RULE' => '',
    'ID' => 'bitrix:photogallery',
    'PATH' => '/company/photogallery/index.php',
    'SORT' => 100,
  ),
  13 => 
  array (
    'CONDITION' => '#^/acrit.exportpro/(.*)#',
    'RULE' => 'path=$1',
    'ID' => '',
    'PATH' => '/acrit.exportpro/index.php',
    'SORT' => 100,
  ),
  14 => 
  array (
    'CONDITION' => '#^/online/(/?)([^/]*)#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  15 => 
  array (
    'CONDITION' => '#^/stssync/calendar/#',
    'RULE' => '',
    'ID' => 'bitrix:stssync.server',
    'PATH' => '/bitrix/services/stssync/calendar/index.php',
    'SORT' => 100,
  ),
  16 => 
  array (
    'CONDITION' => '#^/company/articles/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/articles/index.php',
    'SORT' => 100,
  ),
  17 => 
  array (
    'CONDITION' => '#^/shops/([0-9]+)/#',
    'RULE' => 'sid=$1',
    'ID' => '',
    'PATH' => '/shops/urlrewrite.php',
    'SORT' => 100,
  ),
  19 => 
  array (
    'CONDITION' => '#^/legrandaction/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/legrandaction/index.php',
    'SORT' => 100,
  ),
  18 => 
  array (
    'CONDITION' => '#^/shop/articles/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/shop/articles/index.php',
    'SORT' => 100,
  ),
  21 => 
  array (
    'CONDITION' => '#^/shop/catalog/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/shop/catalog/index.php',
    'SORT' => 100,
  ),
  20 => 
  array (
    'CONDITION' => '#^/company/news/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/news/index.php',
    'SORT' => 100,
  ),
  22 => 
  array (
    'CONDITION' => '#^/exhibition/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/exhibition/index.php',
    'SORT' => 100,
  ),
  24 => 
  array (
    'CONDITION' => '#^/abbchamp/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/abbchamp/index.php',
    'SORT' => 100,
  ),
  26 => 
  array (
    'CONDITION' => '#^/articles/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/articles/index.php',
    'SORT' => 100,
  ),
  23 => 
  array (
    'CONDITION' => '#^/projects/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/projects/index.php',
    'SORT' => 100,
  ),
  30 => 
  array (
    'CONDITION' => '#^/catalog/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/122223455qwqerrqweqweqwe.php',
    'SORT' => 100,
  ),
  31 => 
  array (
    'CONDITION' => '#^/contact/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/contact/index.php',
    'SORT' => 100,
  ),
  29 => 
  array (
    'CONDITION' => '#^/actions/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/actions/index.php',
    'SORT' => 100,
  ),
  28 => 
  array (
    'CONDITION' => '#^/newshop/#',
    'RULE' => '',
    'ID' => 'tezart:catalog',
    'PATH' => '/newshop/index.php',
    'SORT' => 100,
  ),
  27 => 
  array (
    'CONDITION' => '#^/vendors/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog.section',
    'PATH' => '/vendors/index.php',
    'SORT' => 100,
  ),
  32 => 
  array (
    'CONDITION' => '#^/brands/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/brands/detail.php',
    'SORT' => 100,
  ),
  33 => 
  array (
    'CONDITION' => '#^/shops/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/shops/index.php',
    'SORT' => 100,
  ),
  41 => 
  array (
    'CONDITION' => '#^\\??(.*)#',
    'RULE' => '&$1',
    'ID' => 'bitrix:catalog.section',
    'PATH' => '/shop/sale.php',
    'SORT' => 100,
  ),
  35 => 
  array (
    'CONDITION' => '#^/test/#',
    'RULE' => '',
    'ID' => 'elevel:private.download',
    'PATH' => '/test/index.php',
    'SORT' => 100,
  ),
  36 => 
  array (
    'CONDITION' => '#^/news/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/news/index.php',
    'SORT' => 100,
  ),
  39 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
  42 => 
  array (
    'CONDITION' => '#^/shop/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/shop/index.php',
    'SORT' => 100,
  ),
  37 => 
  array (
    'CONDITION' => '#^/adv/#',
    'RULE' => '',
    'ID' => 'concept:pages',
    'PATH' => '/adv/index.php',
    'SORT' => 100,
  ),
  38 => 
  array (
    'CONDITION' => '#^/#',
    'RULE' => '',
    'ID' => 'elevel:private.download',
    'PATH' => '/skachat_praysy/index.php',
    'SORT' => 100,
  ),
);
