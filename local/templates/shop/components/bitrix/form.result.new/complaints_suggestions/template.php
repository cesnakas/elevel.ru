<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<div id="complaints_suggestions" class="lightbox">
    <h3>Жалобы и предложения</h3>

    <?= $arResult["FORM_HEADER"] ?>

    <fieldset>
        <div class="form-row clearfix">
            <div class="form-column">
                <div class="input-holder">
                    <input <? if ($arResult["QUESTIONS"]["fio"]["REQUIRED"] == "Y"): ?>required<? endif; ?>
                           placeholder="Ф.И.О" name="<?= $arResult["QUESTIONS"]["fio"]["TAG_FIELD_NAME"] ?>"
                           type="text" <?= $arResult["USER"]["NAME"] ?> />
                </div>
                <div class="input-holder">
                    <input <? if ($arResult["QUESTIONS"]["phone"]["REQUIRED"] == "Y"): ?>required<? endif; ?>
                           id="complaints_suggestions_phone" name="<?= $arResult["QUESTIONS"]["phone"]["TAG_FIELD_NAME"] ?>"
                           placeholder="Телефон" id="complaints_suggestions_phone" type="text" <?= $arResult["USER"]["PHONE"] ?> />
                </div>
                <div class="input-holder required">
                    <input <? if ($arResult["QUESTIONS"]["email"]["REQUIRED"] == "Y"): ?>required<? endif; ?>
                           name="<?= $arResult["QUESTIONS"]["email"]["TAG_FIELD_NAME"] ?>" placeholder="E-mail"
                           type="text" id="complaints_suggestions_email" <?= $arResult["USER"]["EMAIL"] ?>/>
                </div>
                <span class="note-required"><span class="text-orange sign-required">*</span> Поля, обязательные для заполнения</span>
            </div>
            <div class="form-column">
                <div class="input-holder required">
                    <textarea
                        <? if ($arResult["QUESTIONS"]["message"]["REQUIRED"] == "Y"): ?>required<? endif; ?> name="<?= $arResult["QUESTIONS"]["message"]["TAG_FIELD_NAME"] ?>"
                        placeholder="Текст сообщения" cols="30" rows="10"></textarea>
                </div>
                <?foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
                    $inputFileCount = 1;
                    foreach ($arQuestion['STRUCTURE'] as $arStructure):

                        if ($arStructure['FIELD_TYPE'] == "file"):?>
                            <input class="inputfile" multiple="multiple"
                                   name="form_<?= $arStructure['FIELD_TYPE'] ?>_<?= $arStructure['ID'] ?>"
                                   id="form_<?= $cntId ?>_<?= $arStructure['FIELD_TYPE'] ?>_<?= $arStructure['ID'] ?>_id"
                                   type="file"/>
                            <?
                            if ($inputFileCount == 1) { ?>
                                <label for="form_<?= $cntId ?>_<?= $arStructure['FIELD_TYPE'] ?>_<?= $arStructure['ID'] ?>_id"><?= $arQuestion['CAPTION'] ?></label>
                                <div class="file-name"></div>
                                <?
                            } ?>
                            <?
                            $inputFileCount++ ?>
                        <?
                        endif;
                    endforeach;
                }?>
            </div>
        </div>
        <div class="button-center">
            <div id="complaints_suggestions_errors" class="text-orange"></div>
            <button class="button" type="submit" name="web_form_submit" id="complaints_suggestions_submit">Отправить запрос</button>
        </div>

    </fieldset>

    <?= $arResult["FORM_FOOTER"] ?>

</div>