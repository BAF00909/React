<?php
defined( '_JEXEC' ) or die;
JHTML::_('behavior.mootools');
$document =JFactory::getDocument();
$app = JFactory::getApplication();
$pageview = xtcIsFrontpage() ? 'frontpage' : 'innerpage';
$user =JFactory::getUser();
$params = $templateParameters->group->$layout; // We got $layout from the index.php
// Use the Grid parameters to compute the main columns width
$grid = $params->xtcgrid;
$style = $params->xtcstyle;
$typo = $params->xtctypo;

//Group parameters from grid.xml
$gridParams = $templateParameters->group->$grid;
$styleParams = $templateParameters->group->$style;
$typoParams = $templateParameters->group->$typo;
$tmplWidth = 100;

$isstartpage = $_SERVER['REQUEST_URI']=='/' || $_SERVER['REQUEST_URI']=='/index.php';

// Start of HEAD
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="<?php echo $xtc->templateUrl; ?>css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $xtc->templateUrl; ?>css/bootstrap-responsive.min.css" type="text/css" />
<link href="<?php echo $xtc->templateUrl; ?>images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" /> 
<?php
// Include the CSS files using the groups as defined in the layout parameters
echo xtcCSS($params->xtctypo,$params->xtcgrid,$params->xtcstyle);

$document->addStyleSheet( $xtc->templateUrl.'css/css3effects.css', 'text/css');

// Get Xtc Menu library
$document->addScript($xtc->templateUrl.'js/xtcMenu.js'); 
$document->addScriptDeclaration("window.addEvent('load', function(){ xtcMenu(null, 'menu', 200, 50, 'h', new Fx.Transition(Fx.Transitions.Cubic.easeInOut), 90, false, false); });");

if ($templateParameters->mootools) {
$type = ($templateParameters->mootools == 1) ? 'core' : 'more';?>
<script type="text/javascript" src="<?php echo JURI::root(); ?>media/system/js/mootools-<?php echo $type; ?>.js"></script>
<script type="text/javascript" src="<?php echo JURI::root(); ?>media/system/js/core.js"></script>
<?php
}
if ($templateParameters->jquery) {?>
<script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js" ></script>
<?php
	if ($templateParameters->jquery == 2) {?>
<script type="text/javascript">jQuery.noConflict();</script>
<?php
	}
}
?>
<jdoc:include type="head" />
<script src="<?php echo $xtc->templateUrl; ?>js/bootstrap.js" type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed&subset=latin,cyrillic,cyrillic-ext' rel='stylesheet' type='text/css'>
</head>
<?php
// End of HEAD
// Start of BODY
?>
      
<body id="bttop" class="<?php echo $pageview;?> <?php echo $gridParams->stickyheader;?>">
<div id="headerwrap" class="xtc-bodygutter <?php echo $gridParams->stickyheader;?>">
		<div id="header" class="xtc-wrapper clearfix">
			<div id="logo" class="hd2">
				<a class="hideTxt" href="index.php">
					<?php echo $app->getCfg('sitename');?>
				</a>
			</div>
			<?php if ($this->countModules('menuright2') || $this->countModules('menuright1')) : ?>
				<div id="menu2" class="hd2">
					<?php if ($this->countModules('menuright2')) : ?>
						<div id="menuright2">                           
							<jdoc:include type="modules" name="menuright2" style="none"/>
						</div>
					<?php endif; ?> 
					<?php if ($this->countModules('menuright1')) : ?>
						<div id="menuright1">                           
							<jdoc:include type="modules" name="menuright1" style="none"/>
						</div>
					<?php endif; ?> 
				</div>
			<?php endif; ?> 
			<div id="menuwrap"><div id="menu" class="clearfix hd8 <?php echo $gridParams->menustyle;?>">
				<jdoc:include type="modules" name="menubarleft" style="raw" />
			</div></div>
			<div id="mainmenu">
			<div id="mainleft" class="clearfix hd2">
				<jdoc:include type="modules" name="mainmenuleft" style="raw" />
			</div>
			<div id="mainright" class="clearfix hd8">
				<jdoc:include type="modules" name="mainmenuright" style="raw" />
			</div>
			</div>
		</div> 
	</div>


<?php
			// Draw the regions in the specified order
			$regioncfg = $gridParams->regioncfg;
			foreach (explode(",",$regioncfg) as $region) {
				if ($region == '') continue;
				require 'layout_includes/region'.$region.'.php';
			}
?>
<?php
	
	$areaWidth = $tmplWidth;
	$gutter = 0;	
	$order = 'footer,legals';
	$columnArray = array();
	$columnArray['footer'] = '<jdoc:include type="modules" name="footer" style="xtc" />';
	$columnArray['legals'] = '<jdoc:include type="modules" name="legals" style="xtc" />';
	$customWidths = '';
	$columnClass = '';
	$columnPadding = '';
	$debug = '';
	$footer_legals = xtcBootstrapGrid($columnArray,$order,'',$columnClass);
        	if ($footer_legals) {
		echo '<div id="footerwrap" class="xtc-bodygutter">';
                echo '<div id="footerwrappad" class="xtc-wrapperpad">';
		echo '<div id="footerpad" class="row-fluid xtc-wrapper">'.$footer_legals.'</div>';
	        echo '</div>';
                echo '</div>';
    
	}
?>
<jdoc:include type="modules" name="debug" />

</body>
</html>
<?php
// End of BODY
?>