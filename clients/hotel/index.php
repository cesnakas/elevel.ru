<?
define('SITE_TEMPLATE_ID','company');
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "жилье, гостиничный комплекс, гостиницы, Гостинично-деловой комплекс Лотте, Гостинично-деловой центр Double Three by Hilton, inntech, Гостиница Barvikha Hotel, проектирование монтаж, электромонтаж, комплектация электрооборудованием, управление освещением, knx, электрощитовое оборудование, электрощиты, prodax, электроустановочное оборудование, Гостиница Парк Инн Прибалтийская, Holiday Inn, система автоматизации, система автоматизации гостиничных номеров");
$APPLICATION->SetPageProperty("keywords", "жилье, гостиничный комплекс, гостиницы, Гостинично-деловой комплекс Лотте, Гостинично-деловой центр Double Three by Hilton, inntech, Гостиница Barvikha Hotel, проектирование монтаж, электромонтаж, комплектация электрооборудованием, управление освещением, knx, электрощитовое оборудование, электрощиты, prodax, электроустановочное оборудование, Гостиница Парк Инн Прибалтийская, Holiday Inn, система автоматизации, система автоматизации гостиничных номеров");
$APPLICATION->SetTitle("Гостиницы");


?> 

<div class="container">
    <div class="row">
        <nav>
            <div class="wrap_nav_block">
                <div class="col-lg-3 col-md-3">
                    <div class="navigation_box">
                        <ul class="navigation_block">
                            <li class="active_block_bg">
                                Компания
                                <div class="close_btn">
                                </div>
                            </li>
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:menu",
                                "left-active",
                                Array(
                                    "CACHE_SELECTED_ITEMS" => "N",
                                    "CACHE_TIME" => 3600,
                                    "CACHE_TYPE" => "A",
                                    "CHILD_MENU_TYPE" => "TOP_MENU_1_SUBMENU_otz",
                                    "MAX_LEVEL" => "1",
                                    "ROOT_MENU_TYPE" => "TOP_MENU_1_SUBMENU_otz",
                                    "USE_EXT" => "Y"
                                )
                            );?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>    <!-- end side navigation -->

        <!-- begin content -->
        <div class="main_wrap">
            <div class="col-md-9 col-lg-9">
                <div class="wrap_nav hidden-lg hidden-md">
                    <div class="nav_btn"> </div>
                </div>
                <h1>Гостиницы</h1>

<div class="clients-box"> 
    <ul>
        <li class="client-item">
            <div class="photo-box">
                <img src="/images/ei_hiltonexpoforumufa.png" alt="Объект Эlevel - Гостиница Hilton, г. Уфа" title="Объект Эlevel - Гостиница Hilton, г. Уфа"  />
            </div>
            <div class="info-box">
                <h2>Гостиница Hilton, г. Уфа</h2>
                <i>Выполненные работы:</i> Поставка оборудования НКУ.
                <i>Используемое оборудование:</i> Schneider Electric.
                <i>Дата реализации:</i> 2015 г.
            </div>
        </li>
        <li class="client-item">
            <div class="photo-box">
                <img src="/images/ei_hiltonexpoforumspb.png" alt="Объект Эlevel - Гостиница Hilton Экспофорум, г. Санкт-Петербург" title="Объект Эlevel - Гостиница Hilton Экспофорум, г. Санкт-Петербург"  />
            </div>
            <div class="info-box">
                <h2>Гостиница Hilton Экспофорум, г. Санкт-Петербург</h2>
                <i>Выполненные работы:</i> Поставка электроустановочных изделий.
                <i>Используемое оборудование:</i> Jung.
                <i>Дата реализации:</i> 2015 г.
            </div>
        </li>
    <li class="client-item">
        <div class="photo-box">
            <img src="/images/ei_aparthotel.png" alt="Объект Эlevel - АПАРТ-Отель" title="Объект Эlevel - АПАРТ-Отель"  />
        </div>
        <div class="info-box">
            <h2>АПАРТ-Отель</h2>
            <i>Выполненные работы:</i> Монтаж системы электроснабжения,  освещение, и СКС, управление освещением, монтаж светильников, настройка и программирование системы автоматизации.
            <i>Дата реализации:</i> 2014 г.
        </div>
      </li>
    <li class="client-item">
        <div class="photo-box">
            <img src="/images/ei_balchugk14.png" alt="Объект Эlevel - Гостиница «Балчуг Кемпинский»" title="Объект Эlevel - Гостиница «Балчуг Кемпинский»"  />
        </div>
        <div class="info-box">
            <h2>Гостиница «Балчуг Кемпинский», г. Москва</h2>
            <i>Выполненные работы:</i> Элевел Инженер выступал в качестве генпроектировщика реновации «кремлевского» крыла здания по всем инженерным системам и архитектурным решениям.
            <i>Дата реализации:</i> 2014 г.
        </div>
      </li>
    <li class="client-item">
        <div class="photo-box">
            <img src="/images/ei_lotteplaza5.png" alt="Объект Эlevel - Lotte Hotel 5+, г. Москва" title="Объект Эlevel - Lotte Hotel 5+, г. Москва"  />
        </div>
        <div class="info-box">
            <h2>Lotte Hotel 5+, г. Москва</h2>
            <i>Выполненные работы:</i> Разработка проектной документации энергосберегающей системы управления гостиничными номерами. 
            <i>Дата реализации:</i> 2013 г.
        </div>
      </li>
      <li class="client-item">
        <div class="photo-box">
            <img src="/images/ei_parkinnnovosib2014.png" alt="Объект Эlevel - Гостиничный комплекс Park Inn, г. Новосибирск" title="Объект Эlevel - Гостиничный комплекс Park Inn, г. Новосибирск"  />
        </div>
        <div class="info-box">
            <h2>Гостиничный комплекс Park Inn, г. Новосибирск</h2>
            <i>Выполненные работы:</i> Поставка НКУ. 
            <i>Используемое оборудование:</i> Schneider Electric.
            <i>Дата реализации:</i> 2014 г.
        </div>
      </li>
      <li class="client-item">
        <div class="photo-box">
            <img src="/images/ei_dominanovosib2014.png" alt="Объект Эlevel - Гостиничный комплекс «Domina Novosibirsk», г. Новосибирск" title="Объект Эlevel - Гостиничный комплекс «Domina Novosibirsk», г. Новосибирск"  />
        </div> 
        <div class="info-box">
            <h2>Гостиничный комплекс «Domina Novosibirsk», г. Новосибирск</h2>
            <i>Выполненные работы:</i> Поставка низковольтных распределительных устройств.
            <i>Используемое оборудование:</i> Schneider Electric.
            <i>Дата реализации:</i> 2014 г.
        </div>
      </li>
      <li class="client-item">
        <div class="photo-box">
            <img src="/images/ei_monferanspb132014.png" alt="Объект Эlevel - Дом Монферан на Конногвардейском бульваре, г. Санкт-Петербург" title="Объект Эlevel - Дом Монферан на Конногвардейском бульваре, г. Санкт-Петербург"  />
        </div>
        <div class="info-box">
            <h2>Дом Монферан на Конногвардейском бульваре, г. Санкт-Петербург</h2>
            <i>Выполненные работы:</i> Поставка щитового оборудования, КПП, КНС, ЭУИ, СТП.
            <i>Используемое оборудование:</i> АВВ, DKC, Schneider Electric, Gira, Световые Технологии, КОМТЕХ.
            <i>Дата реализации:</i> 2013 - конец 2014 г.
        </div>
      </li>
      <li class="client-item">
        <div class="photo-box">
            <img src="/images/ei_bpushkin2014.png" alt="Объект Эlevel - Бутик-отель ПУШКИН, г. Москва" title="Объект Эlevel - Бутик-отель ПУШКИН, г. Москва"  />
        </div>
        <div class="info-box">
            <h2>Бутик-отель ПУШКИН, г. Москва</h2>
            <i>Выполненные работы:</i> Система электроснабжения здания (поставка материалов и оборудования, сборка силовых шкафов, комплекс электромонтажных и пуско-наладочных работ).
            <i>Используемое оборудование:</i> АВВ.
            <i>Дата реализации:</i> 2014 г.
        </div>
      </li>
      <li class="client-item">
        <div class="photo-box">
            <img src="/images/ei_astrumshelk2013.png" alt="Объект Эlevel - Многофункциональный гостиничный комплекс ASTRUM, г. Щелково" title="Объект Эlevel - Многофункциональный гостиничный комплекс ASTRUM, г. Щелково"  />
        </div>
        <div class="info-box">
            <h2>Многофункциональный гостиничный комплекс ASTRUM, г. Щелково</h2>
            <i>Выполненные работы:</i> Система электроснабжения здания, система автоматизации номерного фонда, система диспетчеризации электроснабжения.
            <i>Используемое оборудование:</i> Schneider Electric, INNTECH.
            <i>Дата реализации:</i> 2012-2014 г.
        </div>
      </li>
      <li class="client-item">
        <div class="photo-box">
            <img src="/images/ei_crownspb2011.png" alt="Объект Эlevel - Гостиница Crowne Plaza St.Petersburg Ligovsky" title="Объект Эlevel - Гостиница Crowne Plaza St.Petersburg Ligovsky"  />
        </div>
        <div class="info-box">
            <h2>Гостиница Crowne Plaza St.Petersburg Ligovsky, г. Санкт-Петербург</h2>
            <i>Выполненные работы:</i> Поставка электроустановочных изделий.
            <i>Используемое оборудование:</i> Bticino.
            <i>Дата реализации:</i> 2011 г.
        </div>
      </li>
      <li class="client-item">
        <div class="photo-box">
            <img src="/images/ei_4sspb2011.png" alt="Объект Эlevel - Гостиница FOUR SEASONS" title="Объект Эlevel - Гостиница FOUR SEASONS"  />
        </div>
        <div class="info-box">
            <h2>Гостиница FOUR SEASONS, г. Санкт-Петербург</h2>
            <i>Выполненные работы:</i> Поставка электроустановочных изделий.
            <i>Используемое оборудование:</i> Merten.
            <i>Дата реализации:</i> 2011 г.
        </div>
      </li>
      <li class="client-item">
        <div class="photo-box">
            <img src="/images/ie_spb2011_09_demetra.png" alt="Объект Эlevel - Гостиница Demetra art hotel" title="Объект Эlevel - Гостиница Demetra art hotel"  />
        </div>
        <div class="info-box">
            <h2>Гостиница Demetra art hotel, г. Санкт-Петербург</h2>
            <i>Выполненные работы:</i> Поставка электротехнического оборудования и светотехнической продукции. Сборка низковольтных комплекстных устройств.
            <i>Используемое оборудование:</i> DEVI, Esylux.
            <i>Дата реализации:</i> 2011 г.
        </div>
      </li>
      <li class="client-item">
        <div class="photo-box">
            <img src="/images/g_odincovo_2011.png" alt="Объект Эlevel - Гостиница в Одинцово" title="Объект Эlevel - Гостиница в Одинцово"  />
        </div>
        <div class="info-box">
            <h2>Гостиница в Одинцово, г. Одинцово</h2>
            <i>Выполненные работы:</i> Поставка электроустановочных изделий.
            <i>Используемое оборудование:</i> Lergand.
            <i>Дата реализации:</i> 2011 г.
        </div>
      </li>
      <li class="client-item">
        <div class="photo-box">
            <img src="/images/gukraine_msk_2011.png" alt="Объект Эlevel - Гостиница &amp;laquo;Украина&amp;raquo;" title="Объект Эlevel - Гостиница &amp;laquo;Украина&amp;raquo;"  />
        </div>
        <div class="info-box">
            <h2>Гостиница «Украина», г. Москва</h2>
            <i>Выполненные работы:</i> Поставка электроустановочных изделий.
            <i>Используемое оборудование:</i> Lergand.
            <i>Дата реализации:</i> 2011 г.
        </div>
      </li>
      <li class="client-item">
          <div class="photo-box">
            <img src="/images/gholidayinn_msk_2011.png" alt="Объект Эlevel - Гостиница «Holiday INN»" title="Объект Эlevel - Гостиница «Holiday INN»"  />
          </div>
          <div class="info-box">
            <h2>Гостиница «Holiday INN», г. Москва</h2>
            <i>Выполненные работы:</i> Монтаж системы автоматизации искусственного освещенияв помещениях.
            <i>Используемое оборудование:</i> Esylux.
            <i>Дата реализации:</i> 2011 г.
          </div>
      </li>
      <li class="client-item">
        <div class="photo-box">
            <img src="/images/gmariott_spb_2011.png" alt="Объект Эlevel - Отель «Marriot»" title="Объект Эlevel - Отель «Marriot»"  />
        </div>
        <div class="info-box">
            <h2>Отель «Marriot», г. Санкт-Петербург</h2>
            <i>Выполненные работы:</i> Поставка электроустановочных изделий.
            <i>Используемое оборудование:</i> Schneider Electric.
            <i>Дата реализации:</i> 2011 г.
        </div>
      </li>
      <li class="client-item">
        <div class="photo-box">
            <img src="/images/glotte_msk_2011.png" alt="Объект Эlevel - Гостиница «Lotte Plaza»" title="Объект Эlevel - Гостиница «Lotte Plaza»"  />
        </div>
        <div class="info-box">            
            <h2>Гостиница «Lotte Plaza», г. Москва</h2>
            <i>Выполненные работы:</i> Управление гостиничными номерами, щиты управления, системы кабельного обогрева. Проектирование и монтаж систем управления освещением.
            <i>Используемое оборудование:</i> Inntech, ABB, Nexans, Legrand, Helvar.
            <i>Дата реализации:</i> 2011 г.
        </div>
      </li>
      <li class="client-item">
        <div class="photo-box">
            <img src="/images/gkempinsky_msk_2011.png" alt="Объект Эlevel - Гостиница «Балчуг Кемпинский»" title="Объект Эlevel - Гостиница «Балчуг Кемпинский»"  />
        </div>
        <div class="info-box">
            <h2>Гостиница «Балчуг Кемпинский», г. Москва</h2>
            <i>Выполненные работы:</i> Проектирование и поставка систем управления освещением, фанкойлами. Поставка силовых щитов для распределенной системы электроснабжения. Электроустановочные изделия.
            <i>Используемое оборудование:</i> ABB, Gira, LCN.
            <i>Дата реализации:</i> 2011 г.
        </div>
      </li>
      <li class="client-item">
        <div class="photo-box">
            <img src="/images/gmoscow_2011_ei.png" alt="Объект Эlevel - Гостиница «Москва»" title="Объект Эlevel - Гостиница «Москва»"  />
        </div>
        <div class="info-box">
            <h2>Гостиница «Москва», г. Москва</h2>
            <i>Выполненные работы:</i> Сборка щитов НКУ.
            <i>Используемое оборудование:</i> ABB.
            <i>Дата реализации:</i> 2011 г.
        </div>
      </li>
      <li class="client-item">
        <div class="photo-box">
            <img src="/images/gazimut_astr_2010_ei.png" alt="Объект Эlevel - Отель «Азимут»" title="Объект Эlevel - Отель «Азимут»"  />
        </div>
        <div class="info-box">
            <h2>Отель «Азимут», г. Астрахань</h2>
            <i>Выполненные работы:</i> Поставка низковольтного оборудования и светотехнической продукции.
            <i>Используемое оборудование:</i> Schneider Electric.
            <i>Дата реализации:</i> 2010 г.
        </div>
      </li>
      <li class="client-item">
        <div class="photo-box">
            <img src="/images/gpetergof_spb_2010_ei.png" alt="Объект Эlevel - Гостиничный комплекс «Петергоф»" title="Объект Эlevel - Гостиничный комплекс «Петергоф»"  />
        </div>
        <div class="info-box">
            <h2>Гостиничный комплекс «Петергоф», г. Санкт-Петербург</h2>
            <i>Выполненные работы:</i> Сборка и поставка электрощитового оборудования.
            <i>Используемое оборудование:</i> ABB.
            <i>Дата реализации:</i> 2010 г.
        </div>
      </li>
      <li class="client-item">
        <div class="photo-box">
            <img src="/images/gparkinn_spb_2010_ei.png" alt="Объект Эlevel - Гостиница «Park Inn»" title="Объект Эlevel - Гостиница «Park Inn»"  />
        </div>
        <div class="info-box">
            <h2>Гостиница «Park Inn», г. Санкт-Петербург</h2>
            <i>Выполненные работы:</i> Поставка низковольтного оборудования.
            <i>Используемое оборудование:</i> ABB.
            <i>Дата реализации:</i> 2010 г.
        </div>
      </li>
      <li class="client-item">
        <div class="photo-box" >
            <img src="/images/ghilton_nsk_2009_ei.png" alt="Объект Эlevel - Гостинично-деловой центр Double Three by Hilton" title="Объект Эlevel - Гостинично-деловой центр Double Three by Hilton"  />
        </div>
        <div class="info-box">
            <h2>Гостинично-деловой центр Double Three by Hilton, г. Новосибирск</h2>
            <i>Выполненные работы:</i> Поставка светотехнической продукции (светильники, лампы), поставка кабельно-проводниковой продукции (гофратруба, лотки), поставка электроустановочных изделий.
            <i>Используемое оборудование:</i> Световые Технологии, Lena Lighting, Philips, ДКС, АВВ, Schneider Electric, Legrand, Bticino.
            <i>Дата реализации:</i> 2009 г.
        </div>
      </li>
      <li class="client-item">
        <div class="photo-box">
            <img src="/images/barvikha-luxury-village_80_2.jpg" alt="Объект Эlevel - Гостиница Barvikha Hotel" title="Объект Эlevel - Гостиница Barvikha Hotel"  />
        </div>
        <div class="info-box">
            <h2>Гостиница Barvikha Hotel &amp; Spa, Московская область</h2>
            <i>Выполненные работы:</i> Проектирование и реализация управления освещением в номерах и общественных зонах (KNX), сборка и установка электрощитового оборудования, комплектация оборудованием, монтаж и наладка.
            <i>Используемое оборудование:</i> ABB.
            <i>Дата реализации:</i> 2008 г.
        </div>
      </li>
      <li class="client-item">
        <div class="photo-box">
            <img src="/images/pinn.gif" alt="Объект Эlevel - Гостиница Парк Инн Прибалтийская" title="Объект Эlevel - Гостиница Парк Инн Прибалтийская"  />
        </div>
        <div class="info-box">
            <h2>Гостиница Парк Инн Прибалтийская, г. Санкт-Петербург</h2>
            <i>Выполненные работы:</i> Поставка электроустановочного оборудования.
            <i>Используемое оборудование:</i> Prodax.
            <i>Дата реализации:</i> 2007 г.
        </div>
      </li>
      <li class="client-item">
        <div class="photo-box">
            <img src="/images/4news_eng_23012008.gif" alt="Объект Эlevel - Офисно-гостиничный комплекс" title="Объект Эlevel - Офисно-гостиничный комплекс"  />
        </div>
        <div class="info-box">
            <h2>Офисно-гостиничный комплекс, г. Москва</h2>
            <i>Выполненные работы:</i> Проектирование систем информатизации и интегрированного комплекса систем безопасности.
            <i>Дата реализации:</i> 2006 г.
        </div>
      </li>
     <ul>
 </div>
 
            </div>
        </div>
    </div>
</div>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>