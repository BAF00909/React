<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();?>

<?if (!empty($arResult['ITEMS'])) {
    foreach ($arResult["ITEMS"] as $key => $arItem) {
        $source = null;
        if (!empty($arItem["PROPERTIES"]["LINK"]["VALUE"])) {
            $source = explode("/", $arItem["PROPERTIES"]["LINK"]["VALUE"]);
            if ($source[2] == "vimeo.com") {
                $arResult["ITEMS"][$key]["DETAIL_PAGE_URL"] = 'http://player.vimeo.com/video/'.$source[3]."?byline=0&portrait=0";

                if (empty($arItem["PREVIEW_PICTURE"])) {
                    //dot`n supported
                    //$arResult["ITEMS"][$key]["PREVIEW_PICTURE"]["SRC"] = "http://i.vimeocdn.com/video/".$source[3].".webp?mw=960";

                    $arResult["ITEMS"][$key]["PREVIEW_PICTURE"]["SRC"] = $this->GetFolder()."/images/no-image.png";
                }
            } else if ($source[2] == "www.youtube.com" or $source[2] == "youtube.com") {
                $arResult["ITEMS"][$key]["DETAIL_PAGE_URL"] = str_replace("watch?v=", "embed/", $arItem["PROPERTIES"]["LINK"]["VALUE"]);

                if (empty($arItem["PREVIEW_PICTURE"])) {
                    $id = explode("=", $source[3]);
                    $arResult["ITEMS"][$key]["PREVIEW_PICTURE"]["SRC"] = "http://i.ytimg.com/vi/".$id[1]."/sddefault.jpg";
                }
            }
            $arResult["ITEMS"][$key]["TYPE"] = "video";
        } else {
            $arResult["ITEMS"][$key]["DETAIL_PAGE_URL"] = $arItem["DETAIL_PICTURE"]["SRC"];
            $arResult["ITEMS"][$key]["TYPE"] = "";
        }
    }
}?>