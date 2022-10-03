<?

use \Bitrix\Main\Application;
use \Bitrix\Main\Loader;

class FeedbackComponent extends CBitrixComponent
{
    public function onPrepareComponentParams($params)
    {
        $params["IBLOCK_ID"] = 1;
        $params["EVENT"] = 'FEEDBACK_FORM';
        return $params;
    }

    public function executeComponent()
    {
        $context = Application::getInstance()->getContext();
        $request = $context->getRequest();
        $this->arResult["send"] = false;
        $this->arResult["errors"] = [];

        if ($request->get("send") == "feedback") {
            $this->arResult["send"] = true;
            $this->arResult["form"] = [
                'applicationTitle' => htmlspecialchars($request->get("applicationTitle")),
                'feedbackCategory' => htmlspecialchars($request->get("feedbackCategory")),
                'feedbackView' => htmlspecialchars($request->get("feedbackView")),
                'feedbackStock' => htmlspecialchars($request->get("feedbackStock")),
                'feedbackFormControlFile' => $request->get("feedbackFormControlFile"),
                'item_name' => implode(', ', $request->get("item_name")),
                'item_brand' => implode(', ', $request->get("item_brand")),
                'item_amount' => implode(', ', $request->get("item_amount")),
                'item_client' => implode(', ', $request->get("item_client")),
                'feedbackComment' => htmlspecialchars($request->get("feedbackComment")),
            ];

            /**
             * Check form validation
             */
            if (!strlen($this->arResult["form"]['applicationTitle']) ||
                !strlen($this->arResult["form"]['feedbackStock']) ||
                !strlen($this->arResult["form"]['feedbackCategory']) ||
                !check_bitrix_sessid()
            ) {
                $this->arResult["error"] = true;
                $errors = [
                    'Пожалуйста, введите заголовок заявки.' => !strlen($this->arResult["form"]['applicationTitle']),
                    'Пожалуйста, выбирите категорию.' => !strlen($this->arResult["form"]['feedbackCategory']),
                    'Срок вашей сессии истёк, перегрузите страницу.' => !check_bitrix_sessid()
                ];
                foreach ($errors as $k => $v) {
                    if ($v) {
                        $this->arResult["errors"][] = $k;
                    }
                }
            } else {
                /**
                 * Add iblock element
                 */
                $arEventFields = [];
                $message = implode(', ', $this->arResult["form"]);

                if ($this->arParams["IBLOCK_ID"]) {
                    Loader::includeModule("iblock");
                    $arElementFields = [
                        'EMAIL_TO' => $this->arParams["EMAIL_TO"],
                        'IBLOCK_ID' => $this->arParams["IBLOCK_ID"],
                        'ACTIVE' => 'Y',
                        'NAME' => $this->arResult["form"]['applicationTitle'],
                        'PREVIEW_TEXT' => $message,
                        'MESSAGE' => $message,
                        'PREVIEW_PICTURE' => $_FILES['feedbackFormControlFile'],
                    ];
                    $element = new CiblockElement();
                    $arEventFields["ID"] = $element->Add($arElementFields);
                    $arEventFields = array_merge($arEventFields, $arElementFields);
                }
                /**
                 * Sending mail
                 */
                if ($this->arParams["EVENT"]) {
                    foreach ($this->arResult["form"] as $k => $v) {
                        $arEventFields[strtoupper($k)] = $v;
                    }
                    \CEvent::Send($this->arParams["EVENT"], [SITE_ID], $arEventFields);
                }

            }
        }
        $this->IncludeComponentTemplate();
    }
}