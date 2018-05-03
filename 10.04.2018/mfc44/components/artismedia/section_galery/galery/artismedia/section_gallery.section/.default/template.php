<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$strElementEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT");
$strElementDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE");
$arElementDeleteParams = array("CONFIRM" => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));

if (!empty($arResult['ITEMS'])) {?>
    <link rel="stylesheet" href="<?=$templateFolder?>/js/photobox/photobox.css">
    <!--[if lt IE 9]><link rel="stylesheet" href="<?=$templateFolder?>/css/photobox/photobox.ie.css"><![endif]-->
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src='<?=$templateFolder?>/js/photobox/jquery.photobox.js'></script>

    <div class="artismedia_gallery_box">
        <ul id="gallery">
            <?foreach ($arResult["ITEMS"] as $key => $arItem) {?>
                <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
                    $strMainID = $this->GetEditAreaId($arItem['ID']);
                ?>

                <li class="loaded <?=$type?>" id="<? echo $strMainID; ?>">
                    <div class="portofolio_item one_fourth image">
                        <div class="image_frame">
                            <span class="image_holder" style="background-image: none;">
                                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"  class="<?if ($arItem["TYPE"] == "video") {?>overlay_play<?} else {?>overlay_zoom<?}?>" rel="<?=$arItem["TYPE"]?>">
                                    <?//dump($arItem["PREVIEW_PICTURE"]);?>
                                    <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" />
                                    <span class="image_overlay" style="opacity: 0; visibility: visible;">
                                        <span style="top: -50%;"></span>
                                    </span>
                                </a>
                            </span>
                        </div>
                        <div class="portofolio_details">
                            <h4 class="portfolio_title">
                                <?=$arItem["NAME"]?>
                            </h4>
                        </div>
                    </div>
                </li>
            <?}?>
        </ul>
    </div>
    <div style="clear: both;"></div>

    <script src='<?=$templateFolder?>/js/main.js'></script>
<div class="nav_gallery">
	<?if ($arParams["DISPLAY_BOTTOM_PAGER"]) {?>
        <? echo $arResult["NAV_STRING"]; ?>
    <?} ?>
	</div>
<?}?>