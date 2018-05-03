<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if (!\Bitrix\Main\Loader::includeModule('iblock'))
	return;

$arViewModeList = array(
	'LIST' => GetMessage('CPT_BC_SECTIONS_VIEW_MODE_LIST'),
	'LINE' => GetMessage('CPT_BC_SECTIONS_VIEW_MODE_LINE'),
	'TEXT' => GetMessage('CPT_BC_SECTIONS_VIEW_MODE_TEXT'),
	'TILE' => GetMessage('CPT_BC_SECTIONS_VIEW_MODE_TILE')
);


$arTemplateParameters = array(
	"SECTIONS_VIEW_MODE" => array(
		"PARENT" => "SECTIONS_SETTINGS",
		"NAME" => GetMessage('CPT_BC_SECTIONS_VIEW_MODE'),
		"TYPE" => "LIST",
		"VALUES" => $arViewModeList,
		"MULTIPLE" => "N",
		"DEFAULT" => "LIST",
		"REFRESH" => "Y"
	),
	"SECTIONS_SHOW_PARENT_NAME" => array(
		"PARENT" => "SECTIONS_SETTINGS",
		"NAME" => GetMessage('CPT_BC_SECTIONS_SHOW_PARENT_NAME'),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y"
	)
);

if (isset($arCurrentValues['SECTIONS_VIEW_MODE']) && 'TILE' == $arCurrentValues['SECTIONS_VIEW_MODE'])
{
	$arTemplateParameters['SECTIONS_HIDE_SECTION_NAME'] = array(
		'PARENT' => 'SECTIONS_SETTINGS',
		'NAME' => GetMessage('CPT_BC_SECTIONS_HIDE_SECTION_NAME'),
		'TYPE' => 'CHECKBOX',
		'DEFAULT' => 'N'
	);
}

if (isset($arCurrentValues['IBLOCK_ID']) && 0 < intval($arCurrentValues['IBLOCK_ID']))
{
	$arAllPropList = array();
	$arFilePropList = array(
		'-' => GetMessage('CP_BC_TPL_PROP_EMPTY')
	);
	$arListPropList = array(
		'-' => GetMessage('CP_BC_TPL_PROP_EMPTY')
	);
	$arHighloadPropList = array(
		'-' => GetMessage('CP_BC_TPL_PROP_EMPTY')
	);
	$rsProps = CIBlockProperty::GetList(
		array('SORT' => 'ASC', 'ID' => 'ASC'),
		array('IBLOCK_ID' => $arCurrentValues['IBLOCK_ID'], 'ACTIVE' => 'Y')
	);
	while ($arProp = $rsProps->Fetch())
	{
		$strPropName = '['.$arProp['ID'].']'.('' != $arProp['CODE'] ? '['.$arProp['CODE'].']' : '').' '.$arProp['NAME'];
		if ('' == $arProp['CODE'])
			$arProp['CODE'] = $arProp['ID'];
		$arAllPropList[$arProp['CODE']] = $strPropName;
		if ('F' == $arProp['PROPERTY_TYPE'])
			$arFilePropList[$arProp['CODE']] = $strPropName;
		if ('L' == $arProp['PROPERTY_TYPE'])
			$arListPropList[$arProp['CODE']] = $strPropName;
		if ('S' == $arProp['PROPERTY_TYPE'] && 'directory' == $arProp['USER_TYPE'] && CIBlockPriceTools::checkPropDirectory($arProp))
			$arHighloadPropList[$arProp['CODE']] = $strPropName;
	}
}
?>