<nav class="nav" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
	<ul>
		<? foreach ( $arResult as $key => $arItem ): ?>
			<li>
				<a href="<?=$arItem['LINK']?>" itemprop="url" title="<?=$arItem["TEXT"]?>" <?if ($arItem["SELECTED"]):?>class="active"<?endif;?> <?if (isset($arItem['PARAMS']['NEW_WINDOW']) && $arItem['PARAMS']['NEW_WINDOW'] === true):?>target="_blank"<?endif;?>>
					<span itemprop="name"><?=$arItem['TEXT']?></span>
				</a>
				
				<? if ( !empty( $arItem['CHILDS'] ) ): ?>
					<div class="drop">
						<ul class="drop-inner">
							<? foreach ( $arItem['CHILDS'] as $arSubitem ): ?>
								<li>
									<a href="<?=$arSubitem['LINK']?>" itemprop="url" title="<?=$arSubitem["TEXT"]?>" <?if ($arSubitem["SELECTED"]):?>class="active"<?endif;?> <?if (isset($arSubitem['PARAMS']['NEW_WINDOW']) && $arSubitem['PARAMS']['NEW_WINDOW'] === true):?>target="_blank"<?endif;?>>
										<span itemprop="name"><?=$arSubitem['TEXT']?></span>
									</a>
								</li>
							<? endforeach; ?>
						</ul>
					</div>
				<? endif; ?>
			</li>
		<? endforeach; ?>
	</ul>
</nav>