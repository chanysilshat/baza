<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Каталог брендов и производителей электротехнической продукции в интернет-магазине КС-ГРУПП");
$APPLICATION->SetPageProperty("keywords", "Производители");
$APPLICATION->SetPageProperty("description", "Наша компания является официальным дилером представленных торговых марок. Это означает, что вся продукция действительно фирменная, никакого «серого импорта».");
$APPLICATION->SetTitle("Производители");
?><?$APPLICATION->IncludeComponent(
	"bitrix:news", 
	"partners", 
	array(
		"ADD_DETAIL_TO_SLIDER" => "Y",
		"ADD_ELEMENT_CHAIN" => "Y",
		"ADD_PICT_PROP" => "MORE_PHOTO",
		"ADD_PROPERTIES_TO_BASKET" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_FILTER_CATALOG" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"ALT_TITLE_GET" => "NORMAL",
		"BLOCK_BLOG_NAME" => "",
		"BLOCK_BRANDS_NAME" => "",
		"BLOCK_LANDINGS_NAME" => "",
		"BLOCK_NEWS_NAME" => "",
		"BLOCK_PARTNERS_NAME" => "",
		"BLOCK_PROJECTS_NAME" => "",
		"BLOCK_REVIEWS_NAME" => "",
		"BLOCK_SERVICES_NAME" => "",
		"BLOCK_STAFF_NAME" => "",
		"BLOCK_TIZERS_NAME" => "",
		"BLOCK_VACANCY_NAME" => "",
		"BLOG_TITLE" => "Комментарии",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "N",
		"CACHE_NOTES" => "",
		"CACHE_TIME" => "100000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMMENTS_COUNT" => "5",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"CONVERT_CURRENCY" => "N",
		"COUNT_IN_LINE" => "3",
		"DEFAULT_LIST_TEMPLATE" => "block",
		"DEPTH_LEVEL_BRAND" => "2",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_BLOCKS_ALL_ORDER" => "desc,tizers,char,docs,services,news,vacancy,blog,projects,brands,staff,gallery,partners,form_order,landings,goods_sections,reviews,goods,goods_catalog,comments",
		"DETAIL_BLOG_EMAIL_NOTIFY" => "N",
		"DETAIL_BLOG_URL" => "catalog_comments",
		"DETAIL_BLOG_USE" => "N",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_FB_USE" => "N",
		"DETAIL_FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "DETAIL_TEXT",
			4 => "DETAIL_PICTURE",
			5 => "",
		),
		"DETAIL_LINKED_GOODS_SLIDER" => "N",
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "LINK_BRANDS",
			1 => "LINK_VACANCY",
			2 => "LINK_LANDINGS",
			3 => "LINK_NEWS",
			4 => "LINK_REVIEWS",
			5 => "LINK_PARTNERS",
			6 => "LINK_PROJECTS",
			7 => "SITE",
			8 => "LINK_STAFF",
			9 => "LINK_BLOG",
			10 => "PHONE",
			11 => "LINK_TIZERS",
			12 => "LINK_SERVICES",
			13 => "DOCUMENTS",
			14 => "PHOTOS",
			15 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DETAIL_USE_COMMENTS" => "N",
		"DETAIL_VK_USE" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_COMPARE" => "N",
		"DISPLAY_LINKED_PAGER" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_WISH_BUTTONS" => "N",
		"ELEMENT_TYPE_VIEW" => "element_4",
		"FILE_404" => "",
		"GALLERY_PRODUCTS_PROPERTY" => "PHOTOS",
		"GALLERY_TYPE" => "small",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"HIDE_NOT_AVAILABLE" => "L",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"IBLOCK_CATALOG_ID" => "52",
		"IBLOCK_CATALOG_TYPE" => "-",
		"IBLOCK_ID" => "56",
		"IBLOCK_LINK_BLOG_ID" => "",
		"IBLOCK_LINK_BRANDS_ID" => "",
		"IBLOCK_LINK_LANDINGS_ID" => "",
		"IBLOCK_LINK_NEWS_ID" => "",
		"IBLOCK_LINK_PARTNERS_ID" => "",
		"IBLOCK_LINK_PROJECTS_ID" => "",
		"IBLOCK_LINK_REVIEWS_ID" => "",
		"IBLOCK_LINK_SERVICES_ID" => "",
		"IBLOCK_LINK_STAFF_ID" => "",
		"IBLOCK_LINK_TIZERS_ID" => "",
		"IBLOCK_LINK_VACANCY_ID" => "",
		"IBLOCK_TYPE" => "aspro_max_content",
		"IMAGE_POSITION" => "left",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"LINKED_ELEMENST_PAGE_COUNT" => "20",
		"LINKED_ELEMENT_TAB_SORT_FIELD" => "SCALED_PRICE_1",
		"LINKED_ELEMENT_TAB_SORT_FIELD2" => "CATALOG_QUANTITY",
		"LINKED_ELEMENT_TAB_SORT_ORDER" => "asc,nulls ",
		"LINKED_ELEMENT_TAB_SORT_ORDER2" => "desc,nulls",
		"LINKED_PRODUCTS_PROPERTY" => "BRAND",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "",
		),
		"LIST_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_OFFERS_LIMIT" => "5",
		"LIST_OFFERS_PROPERTY_CODE" => array(
			0 => "SIZES",
			1 => "COLOR_REF",
			2 => "",
		),
		"LIST_PROPERTY_CATALOG_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "SITE",
			1 => "PHONE",
			2 => "",
		),
		"LIST_VIEW" => "slider",
		"MAX_GALLERY_GOODS_ITEMS" => "5",
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "21",
		"NUM_DAYS" => "30",
		"NUM_NEWS" => "20",
		"OFFERS_CART_PROPERTIES" => "",
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_ORDER2" => "desc",
		"OFFER_ADD_PICT_PROP" => "-",
		"OFFER_HIDE_NAME_PROPS" => "N",
		"OFFER_TREE_PROPS" => array(
			0 => "SIZES",
			1 => "COLOR_REF",
		),
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PRICE_CODE" => array(
			0 => "BASE",
			1 => "OPT",
			2 => "",
		),
		"PRICE_VAT_INCLUDE" => "N",
		"PRODUCT_PROPERTIES" => array(
		),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"SALE_STIKER" => "-",
		"SECTION_ELEMENTS_TYPE_VIEW" => "list_elements_1",
		"SEF_FOLDER" => "/info/brands/",
		"SEF_MODE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"SHOW_404" => "Y",
		"SHOW_ARTICLE_SKU" => "N",
		"SHOW_COUNT_ELEMENTS" => "N",
		"SHOW_DETAIL_LINK" => "Y",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_DISCOUNT_PERCENT_NUMBER" => "N",
		"SHOW_DISCOUNT_TIME" => "N",
		"SHOW_DISCOUNT_TIME_EACH_SKU" => "N",
		"SHOW_GALLERY" => "Y",
		"SHOW_GALLERY_GOODS" => "N",
		"SHOW_LINKED_PRODUCTS" => "Y",
		"SHOW_MEASURE" => "Y",
		"SHOW_MEASURE_WITH_RATIO" => "Y",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_ONE_CLICK_BUY" => "N",
		"SHOW_RATING" => "N",
		"SHOW_SECTIONS_FILTER" => "N",
		"SHOW_SECTION_PREVIEW_DESCRIPTION" => "Y",
		"SHOW_SORT_IN_FILTER" => "Y",
		"SHOW_UNABLE_SKU_PROPS" => "N",
		"SIDE_LEFT_BLOCK" => "FROM_MODULE",
		"SIDE_LEFT_BLOCK_DETAIL" => "FROM_MODULE",
		"SORT_BUTTONS" => array(
			0 => "POPULARITY",
			1 => "NAME",
			2 => "PRICE",
		),
		"SORT_BY1" => "HAS_PREVIEW_PICTURE",
		"SORT_BY2" => "NAME",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"SORT_PRICES" => "REGION_PRICE",
		"SORT_REGION_PRICE" => "BASE",
		"STAFF_TYPE_DETAIL" => "list",
		"STIKERS_PROP" => "-",
		"STORES" => array(
			0 => "",
			1 => "",
		),
		"STRICT_SECTION_CHECK" => "N",
		"TAGS_SECTION_COUNT" => "",
		"TYPE_LEFT_BLOCK" => "FROM_MODULE",
		"TYPE_LEFT_BLOCK_DETAIL" => "FROM_MODULE",
		"T_DOCS" => "",
		"T_GALLERY" => "",
		"T_GOODS" => "",
		"T_GOODS_SECTION" => "",
		"T_PROJECTS" => "",
		"T_REVIEWS" => "",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_RATING" => "N",
		"USE_REVIEW" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
		"USE_SHARE" => "Y",
		"USE_SUBSCRIBE_IN_TOP" => "N",
		"VIEW_TYPE" => "table",
		"YANDEX" => "N",
		"COMPONENT_TEMPLATE" => "partners",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "",
			"detail" => "#ELEMENT_CODE#/",
		)
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>