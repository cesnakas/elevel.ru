<nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
	<ul class="accordion">
		<li class="eway"><a itemprop="url" title="¬ход e.way" href="/eway/"><span itemprop="name">¬ход <strong>e.way</strong></span></a></li>
		<? foreach ( $arResult as $key => $arItem ): ?>
			<li>
				<a href="<?=$arItem['LINK']?>" itemprop="url" title="<?=$arItem["TEXT"]?>" class="<?if ($arItem["SELECTED"]):?>active<?endif;?> <?if(!empty($arItem['CHILDS'])):?>accordion-open<?endif;?>">
					<span itemprop="name"><?=$arItem['TEXT']?></span>
				</a>
				
				<? if ( !empty( $arItem['CHILDS'] ) ): ?>
					<div class="accordion-slide">
						<ul>
							<? foreach ( $arItem['CHILDS'] as $arSubitem ): ?>
								<li>
									<a href="<?=$arSubitem['LINK']?>" itemprop="url" title="<?=$arSubitem["TEXT"]?>" <?if ($arSubitem["SELECTED"]):?>class="active"<?endif;?>>
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