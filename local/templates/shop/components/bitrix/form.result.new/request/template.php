<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<div id="request" class="lightbox">
    <h3>��������� ������</h3>

    <?= $arResult["FORM_HEADER"] ?>

    <fieldset>
        <div class="form-row clearfix">
            <div class="form-column">
                <div class="input-holder">
                    <input <? if ($arResult["QUESTIONS"]["fio"]["REQUIRED"] == "Y"): ?>required<? endif; ?>
                           placeholder="�.�.�" name="<?= $arResult["QUESTIONS"]["fio"]["TAG_FIELD_NAME"] ?>"
                           type="text" <?= $arResult["USER"]["NAME"] ?> />
                </div>
                <div class="input-holder">
                    <input <? if ($arResult["QUESTIONS"]["phone"]["REQUIRED"] == "Y"): ?>required<? endif; ?>
                           id="request_phone" name="<?= $arResult["QUESTIONS"]["phone"]["TAG_FIELD_NAME"] ?>"
                           placeholder="�������" id="request_phone" type="text" <?= $arResult["USER"]["PHONE"] ?> />
                </div>
                <div class="input-holder required">
                    <input <? if ($arResult["QUESTIONS"]["email"]["REQUIRED"] == "Y"): ?>required<? endif; ?>
                           name="<?= $arResult["QUESTIONS"]["email"]["TAG_FIELD_NAME"] ?>" placeholder="E-mail"
                           type="text" id="request_email" <?= $arResult["USER"]["EMAIL"] ?>/>
                </div>
                <span class="note-required"><span class="text-orange sign-required">*</span> ����, ������������ ��� ����������</span>
            </div>
            <div class="form-column">
                <div class="input-holder required">
                    <textarea
                        <? if ($arResult["QUESTIONS"]["message"]["REQUIRED"] == "Y"): ?>required<? endif; ?> name="<?= $arResult["QUESTIONS"]["message"]["TAG_FIELD_NAME"] ?>"
                        placeholder="����� ���������" cols="30" rows="10"></textarea>
                </div>
                <div class="input-holder">
                    <select name="<?= $arResult["QUESTIONS"]["shop"]["TAG_FIELD_NAME"] ?>">
                        <? foreach ($arResult["arDropDown"]["shop"]["reference"] as $i => $answer): ?>
                            <option value="<?= $arResult["arDropDown"]["shop"]["reference_id"][$i] ?>"><?= $answer ?></option>
                        <? endforeach; ?>
                    </select>
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
            <div id="request_errors" class="text-orange"></div>
            <button class="button" type="submit" name="web_form_submit" id="request_submit">��������� ������</button>
        </div>

    </fieldset>

    <?= $arResult["FORM_FOOTER"] ?>

</div>