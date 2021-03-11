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
$this->setFrameMode(true);?>
<?
$INPUT_ID = trim($arParams["~INPUT_ID"]);
if(strlen($INPUT_ID) <= 0)
	$INPUT_ID = "title-search-input";
$INPUT_ID = CUtil::JSEscape($INPUT_ID);

$CONTAINER_ID = trim($arParams["~CONTAINER_ID"]);
if(strlen($CONTAINER_ID) <= 0)
	$CONTAINER_ID = "title-search";
$CONTAINER_ID = CUtil::JSEscape($CONTAINER_ID);

/*if($arParams["SHOW_INPUT"] !== "N"):?>
	<div id="<?echo $CONTAINER_ID?>">
	<form action="<?echo $arResult["FORM_ACTION"]?>">
		<input id="<?echo $INPUT_ID?>" type="text" name="q" value="" size="40" maxlength="50" autocomplete="off" />&nbsp;<input name="s" type="submit" value="<?=GetMessage("CT_BST_SEARCH_BUTTON");?>" />
	</form>
	</div>
<?endif*/?>

<div class="block-categories popup-holder">
	<a title="��� �������" class="open" href=""><span class="inner"><span class="text">��� �������</span></span></a>
	<div class="popup">
		<div class="popup-inner">
			<nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
				<ul>
					<li><a class="close-link" itemprop="url" href="https://yoursite.com/" title="������� � �����������"><span itemprop="name">������� � �����������</span></a></li>
					<li><a class="close-link" itemprop="url" href="https://yoursite.com/" title="��������, ���, �����������"><span itemprop="name">��������, ���, �����������</span></a></li>
					<li><a class="close-link" itemprop="url" href="https://yoursite.com/" title="���������������"><span itemprop="name">���������������</span></a></li>
					<li><a class="close-link" itemprop="url" href="https://yoursite.com/" title="������"><span itemprop="name">������</span></a></li>
					<li><a class="close-link" itemprop="url" href="https://yoursite.com/" title="������������� �������"><span itemprop="name">������������� �������</span></a></li>
					<li><a class="close-link" itemprop="url" href="https://yoursite.com/" title="����������� � ��������� ���������"><span itemprop="name">����������� � ��������� ���������</span></a></li>
					<li><a class="close-link" itemprop="url" href="https://yoursite.com/" title="������������"><span itemprop="name">������������</span></a></li>
					<li><a class="close-link" itemprop="url" href="https://yoursite.com/" title="������������������� �������"><span itemprop="name">������������������� �������</span></a></li>
					<li><a class="close-link" itemprop="url" href="https://yoursite.com/" title="������������� ������������"><span itemprop="name">������������� ������������</span></a></li>
					<li><a class="close-link" itemprop="url" href="https://yoursite.com/" title="�����, �����, ����"><span itemprop="name">�����, �����, ����</span></a></li>
					<li><a class="close-link" itemprop="url" href="https://yoursite.com/" title="����������"><span itemprop="name">����������</span></a></li>
					<li><a class="close-link" itemprop="url" href="https://yoursite.com/" title="������������� � ����������������"><span itemprop="name">������������� � ����������������</span></a></li>
					<li><a class="close-link" itemprop="url" href="https://yoursite.com/" title="��������������"><span itemprop="name">��������������</span></a></li>
					<li><a class="close-link" itemprop="url" href="https://yoursite.com/" title="������� ���������� � ��������"><span itemprop="name">������� ���������� � ��������</span></a></li>
					<li><a class="close-link" itemprop="url" href="https://yoursite.com/" title="������������ � ����������"><span itemprop="name">������������ � ����������</span></a></li>
				</ul>
			</nav>
		</div>
	</div>
</div>

<form class="search-form popup-holder" action="<?echo $arResult["FORM_ACTION"]?>" id="<?=$CONTAINER_ID?>">
	<fieldset>
		<input class="open" id="<?echo $INPUT_ID?>" name="q" value="" maxlength="80" autocomplete="off" type="text"/>
		<input value="�����" name="s" type="submit"/>
		<?/*<div class="popup">
			<div class="popup-inner">
				<ul>
					<li><a class="close-link" title="������" href="">
						<div class="visual"><img src="images/img05.jpg" alt=""/></div>
						<div class="text">
							������ <br/>100 ���
						</div>
					</a></li>
					<li><a class="close-link" title="������ ������������ ����������" href="">
						<div class="visual"><img src="images/img06.jpg" alt=""/></div>
						<div class="text">
							������ ������������ ���������� <br/>750 ���
						</div>
					</a></li>
					<li><a class="close-link" title="������������ ������" href="">
						<div class="visual"><img src="images/img07.jpg" alt=""/></div>
						<div class="text">
							������������ ������ <br/>50 ���
						</div>
					</a></li>
					<li><a class="close-link" title="������" href="">
						<div class="visual"><img src="images/img05.jpg" alt=""/></div>
						<div class="text">
							������ <br/>100 ���
						</div>
					</a></li>
					<li><a class="close-link" title="������ ������������ ����������" href="">
						<div class="visual"><img src="images/img06.jpg" alt=""/></div>
						<div class="text">
							������ ������������ ���������� <br/>750 ���
						</div>
					</a></li>
				</ul>
				<a class="link-more" href="">�������� ��� ����������</a>
			</div>
		</div>*/?>
	</fieldset>
</form>

<script>
	BX.ready(function(){
		new JCTitleSearch({
			'AJAX_PAGE' : '<?echo CUtil::JSEscape(POST_FORM_ACTION_URI)?>',
			'CONTAINER_ID': '<?echo $CONTAINER_ID?>',
			'INPUT_ID': '<?echo $INPUT_ID?>',
			'MIN_QUERY_LEN': 2
		});
	});
</script>