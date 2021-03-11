<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$cntId = "cnt_" . $arResult['FORM_ID'] . rand();


if ((intval($_REQUEST['RESULT_ID']) > 0 && $_REQUEST['formresult'] == "addok" && $_REQUEST['WEB_FORM_ID'] == $arResult["arForm"]['ID']) || $arResult["isFormErrors"] == "Y" || $arResult["isFormNote"] == "Y") {
    ob_end_clean();
    $APPLICATION->RestartBuffer();

    $arRs = array(
        "formresult" => (intval($_REQUEST['RESULT_ID']) > 0 && $_REQUEST['formresult'] == "addok") ? "Y" : "N",
        "isFormErrors" => $arResult["isFormErrors"],
        "isFormNote" => $arResult["isFormNote"],
        "FORM_NOTE" => $arResult["FORM_NOTE"],
        "FORM_ERRORS_TEXT" => $arResult["FORM_ERRORS_TEXT"],
    );

    echo \Bitrix\Main\Web\Json::encode($arRs);
    die();
}

// Sorting questions
/*$arQuestionSort = array(
    "name",
    "phone",
    "email",
    "city",
    "text",
    "file",
    "manager_email"
);
$arTmp = array();
foreach ($arQuestionSort as $field_sid) {
    if (array_key_exists($field_sid, $arResult["QUESTIONS"]))
        $arTmp[$field_sid] = $arResult["QUESTIONS"][$field_sid];
}*/

foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
    if (!array_key_exists($FIELD_SID, $arTmp))
        $arTmp[$FIELD_SID] = $arQuestion;
}

$arResult["QUESTIONS"] = $arTmp;?>
<div id="<?= $cntId ?>" class="feedback_form_container">
    <div class="feedback_form_note"><?= $arResult["FORM_NOTE"] ?></div>
    <div class="feedback_form_body">

        <?
        if ($arResult["isFormNote"] != "Y") {
            ?>
            <?= $arResult["FORM_HEADER"] ?>
            <input type="hidden" name="form_id" value="<?= $arResult['FORM_ID'] ?>"/>
            <div class="form-tablet-row">
            <?
            $i = 0;
            $j = 0; 

            foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
                if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden') {
                    echo $arQuestion["HTML_CODE"];
                } else {

                    if ($FIELD_SID == "form_title" || $FIELD_SID == "page_title" || $FIELD_SID == "page_url"
                        || $FIELD_SID == "name" || $FIELD_SID == "phone" || $FIELD_SID == "email" || $FIELD_SID == "text" || $FIELD_SID == "file"):
                        ?>
                        <?/* <input type="hidden" name="<?= $FIELD_SID ?>_field"
                               value="form_<?= $arQuestion['STRUCTURE'][0]['FIELD_TYPE'] ?>_<?= $arQuestion['STRUCTURE'][0]['ID'] ?>"/> */?>
                        <?
                        if (!in_array($FIELD_SID, array("name", "phone", "email", "text", "file"))):
                            continue;
                        endif;
                    elseif ($FIELD_SID == "manager_email"):
                        ?>
            

                        <?if(count($arParams['EMAILS']) > 0):?>
                            <div class="input-holder">
                                <select name="form_<?=$arQuestion['STRUCTURE'][0]['FIELD_TYPE']?>_<?=$arQuestion['STRUCTURE'][0]['ID']?>" id="">
                                    <?foreach($arParams['EMAILS'] as $email):?>
                                        <option value="<?=$email?>"><?=$email?></option>
                                    <?endforeach;?>
                                </select>
                            </div>
                        <?else:?>
                            <div class="input-holder">
                                <select name="form_<?=$arQuestion['STRUCTURE'][0]['FIELD_TYPE']?>_<?=$arQuestion['STRUCTURE'][0]['ID']?>" id="">
                                    <option value="elec@elevel.ru">elec@elevel.ru</option>
                                </select>
                            </div>
                        <?endif;?>
                        <?
                        continue;
                    elseif ($FIELD_SID == "no_file"):
                        $no_file = 'form_' . $arQuestion['STRUCTURE'][0]['FIELD_TYPE'] . '_' . $arQuestion['STRUCTURE'][0]['ID'];
                        ?>
                        <input type="hidden"
                               name="form_<?= $arQuestion['STRUCTURE'][0]['FIELD_TYPE'] ?>_<?= $arQuestion['STRUCTURE'][0]['ID'] ?>"
                               value="<?= $arQuestion['CAPTION'] ?>"/>
                        <?
                        continue;
                    endif;

                    $inputFileCount = 1;
                    foreach ($arQuestion['STRUCTURE'] as $arStructure):

                        if ($arStructure['FIELD_TYPE'] == "text" || $arStructure['FIELD_TYPE'] == "email"):
                            ?>
                            <div class="input-holder<?= ($arQuestion['REQUIRED'] == "Y") ? " required" : "" ?>">
                                <input name="form_<?= $arStructure['FIELD_TYPE'] ?>_<?= $arStructure['ID'] ?>" <?= ($arQuestion['REQUIRED'] == "Y") ? "required" : "" ?>
                                       placeholder="<?= $arQuestion['CAPTION'] ?>" type="text"/>
                            </div>
                        <?
                        elseif ($arStructure['FIELD_TYPE'] == "file"):
                            ?>
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
                        elseif ($arStructure['FIELD_TYPE'] == "textarea"):
                            ?>
                            <div class="input-holder<?= ($arQuestion['REQUIRED'] == "Y") ? " required" : "" ?> area-holder">
                                <textarea name="form_<?= $arStructure['FIELD_TYPE'] ?>_<?= $arStructure['ID'] ?>"
                                          placeholder="<?= $arQuestion['CAPTION'] ?>" cols="30" rows="10"></textarea>
                            </div>
                        <?
                        endif;
                    endforeach; ?>
                    <?
                }

                $i++;
                $j++;
            }
            ?>

            </div>

            <div class="form-tablet-row">
                <div class="feedback_form_errors"><?
                    if ($arResult["isFormErrors"] == "Y"):?><?= (mb_detect_encoding($arResult["FORM_ERRORS_TEXT"]) == "UTF-8") ? iconv("UTF-8", "cp1251", $arResult["FORM_ERRORS_TEXT"]) : $arResult["FORM_ERRORS_TEXT"]; ?><?endif; ?></div>
                <button class="button" name="web_form_apply" type="submit" <?
                if (SITE_SERVER_NAME == "elevel.ru"): ?>onclick="yaCounter1485305.reachGoal('otpravitClick1');return true;"<?
                endif;
                ?>><?= $arResult['arForm']['BUTTON'] ?></button>
            </div>
        </div>


            <?= $arResult["FORM_FOOTER"] ?>
            <?
        }
        ?>
</div>


<script>

    $(function () {

        var $files = [];
        $('#<?=$cntId?> form input[type=file]').on('change', function () {
            var $this = $(this);
            /*получаем загруженные файлы*/
            if($this[0].files.length && $files.length <= 4) {
                $files = $files.concat(Object.keys($this[0].files).map((i) => $(this)[0].files[i]));
            }

            arF = "";
            count = 1;
            $.each($files, function (index,file) {
                if(count <= 4) {
                    arF += file.name + '<br>';
                }
                count++;
            });

            id = $this.attr('id');
            $this.parent().find('.file-name').html(arF);

            if($files.length>=4) {
                $this.parent().find('label[for=' + id + ']').hide();
            }

            if ($('#<?=$cntId?> form input[name=<?=$no_file?>]').val())
                $('#<?=$cntId?> form input[name=<?=$no_file?>]').val(' ');
        });


        //submit
        $('#<?=$cntId?> form').submit(function (event) {
            event.preventDefault();

            var $form = $(this),
                $parent = $(this).parents('.feedback_form_container'),
                $button = $parent.find('button.button');


            var formData = new FormData($form[0]);

            /*добавляем загруженные файлы в formData*/
            var i = 0;
            $form.find('input[type=file]').each(function () {
                var $this = $(this);
                if($files[i]) {
                    formData.append($this.attr('name'), $files[i]);
                }
                i++;
            });
            formData.append('web_form_apply', 'Y');
            // _data = $form.serialize();
            // _data += "&web_form_apply=Y";

            // $form.find('input[type=file]').each(function(indx, element){
            // _data.append('img', element.prop('files')[0]);
            // });

            $button.addClass('loading');

            $.ajax({
                type: $form.attr('method'),
                url: $form.attr('action'),
                // url: 'ak.php',
                // async: false,
                // cache: false,
                contentType: false,
                processData: false,
                data: formData,
                // data: _data,
                // contentType: 'application/x-www-form-urlencoded; charset=utf-8',
                // data: encodeURI(_data),
                success: function (data) {
                    data = JSON.parse(data);

                    if (data.isFormNote == "Y" || data.formresult == "Y") {
                        $parent.find('.feedback_form_note').html(data.FORM_NOTE).show();
                        $parent.find('.feedback_form_body').hide();

                        $form[0].reset();
                    }

                    if (data.isFormErrors == "Y") {
                        $parent.find('.feedback_form_errors').html(data.FORM_ERRORS_TEXT);

                    }

                },
                complete: function (data) {
                    $button.removeClass('loading');
                }
            });
            return false;


        });
    });

</script>