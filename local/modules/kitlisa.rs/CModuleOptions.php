<?php
IncludeModuleLangFile($_SERVER['DOCUMENT_ROOT'].BX_ROOT.'/modules/main/options.php');

class CModuleOptions
{
    public $arCurOptionValues = array();
    private $module_id = '';
    private $arTabs = array();
    private $arGroups = array();
    private $arOptions = array();
    private $need_access_tab = false;
    public function CModuleOptions($module_id, $arTabs, $arGroups, $arOptions, $need_access_tab = false)
    {
        $this->module_id = $module_id;
        $this->arTabs = $arTabs;
        $this->arGroups = $arGroups;
        $this->arOptions = $arOptions;
        $this->need_access_tab = $need_access_tab;
        if($need_access_tab)
            $this->arTabs[] = array(
                'DIV' => 'edit_access_tab',
                'TAB' => 'Access',
                'ICON' => '',
                'TITLE' => 'Access settings'
            );
        if($_REQUEST['update'] == 'Y' && check_bitrix_sessid()){

            $this->SaveOptions();

            if($this->need_access_tab)
            {
                $this->SaveGroupRight();
            }
        }
        $this->GetCurOptionValues();
    }
    private function SaveOptions()
    {
        foreach($this->arOptions as $opt => $arOptParams)
        {
            if($arOptParams['TYPE'] != 'CUSTOM')
            {
                $val = $_REQUEST[$opt];
                if($arOptParams['TYPE'] == 'CHECKBOX' && $val != 'Y')
                    $val = 'N';
                elseif(is_array($val))
                    $val = serialize($val);
                COption::SetOptionString($this->module_id, $opt, $val);
            }
        }

    }
    private function SaveGroupRight()
    {
        CMain::DelGroupRight($this->module_id);
        $GROUP = $_REQUEST['GROUPS'];
        $RIGHT = $_REQUEST['RIGHTS'];
        foreach($GROUP as $k => $v) {
            if($k == 0) {
                COption::SetOptionString($this->module_id, 'GROUP_DEFAULT_RIGHT', $RIGHT[0], 'Right for groups by default');
            }
            else {
                CMain::SetGroupRight($this->module_id, $GROUP[$k], $RIGHT[$k]);
            }
        }
    }
    private function GetCurOptionValues()
    {
        foreach($this->arOptions as $opt => $arOptParams)
        {
            if($arOptParams['TYPE'] != 'CUSTOM')
            {
                $this->arCurOptionValues[$opt] = COption::GetOptionString($this->module_id, $opt, $arOptParams['DEFAULT']);
                if(in_array($arOptParams['TYPE'], array('MSELECT')))
                    $this->arCurOptionValues[$opt] = unserialize($this->arCurOptionValues[$opt]);
            }
        }
    }

    public function ShowHTML()
    {
        global $APPLICATION;
        $arP = array();
        foreach($this->arGroups as $group_id => $group_params)
            $arP[$group_params['TAB']][$group_id] = array();
        if(is_array($this->arOptions))
        {
            foreach($this->arOptions as $option => $arOptParams)
            {
                $val = $this->arCurOptionValues[$option];
                if($arOptParams['SORT'] < 0 || !isset($arOptParams['SORT']))
                    $arOptParams['SORT'] = 0;
                $label = (isset($arOptParams['TITLE']) && $arOptParams['TITLE'] != '') ? $arOptParams['TITLE'] : '';
                $opt = htmlspecialchars($option);
                switch($arOptParams['TYPE'])
                {
                    case 'CHECKBOX':
                        $input = '<input type="checkbox" name="'.$opt.'" id="'.$opt.'" value="Y"'.($val == 'Y' ? ' checked' : '').' '.($arOptParams['REFRESH'] == 'Y' ? 'onclick="document.forms[\''.$this->module_id.'\'].submit();"' : '').' />';
                        break;
                    case 'TEXT':
                        $input = '<textarea cols="40" rows="10" name="'.$opt.'">'.htmlspecialchars($val).'</textarea>';
                        if($arOptParams['REFRESH'] == 'Y')
                            $input .= '<input type="submit" name="refresh" value="OK" />';
                        break;
                    case 'SELECT':
                        $input = SelectBoxFromArray($opt, $arOptParams['VALUES'], $val, '', '', ($arOptParams['REFRESH'] == 'Y' ? true : false), ($arOptParams['REFRESH'] == 'Y' ? $this->module_id : ''));
                        if($arOptParams['REFRESH'] == 'Y')
                            $input .= '<input type="submit" name="refresh" value="OK" />';
                        break;
                    case 'MSELECT':
                        $input = SelectBoxMFromArray($opt.'[]', $arOptParams['VALUES'], $val);
                        if($arOptParams['REFRESH'] == 'Y')
                            $input .= '<input type="submit" name="refresh" value="OK" />';
                        break;
                    case 'COLORPICKER':
                        if(!isset($arOptParams['FIELD_SIZE']))
                            $arOptParams['FIELD_SIZE'] = 25;
                        ob_start();
                        echo     '<input id="__CP_PARAM_'.$opt.'" name="'.$opt.'" size="'.$arOptParams['FIELD_SIZE'].'" value="'.htmlspecialchars($val).'" type="text" style="float: left;" '.($arOptParams['FIELD_READONLY'] == 'Y' ? 'readonly' : '').' />
                                <script>
                                    function onSelect_'.$opt.'(color, objColorPicker)
                                    {
                                        var oInput = BX("__CP_PARAM_'.$opt.'");
                                        oInput.value = color;
                                    }
                                </script>';
                        $APPLICATION->IncludeComponent('bitrix:main.colorpicker', '', Array(
                                'SHOW_BUTTON' => 'Y',
                                'ID' => $opt,
                                'NAME' => '?????????? ??????????',
                                'ONSELECT' => 'onSelect_'.$opt
                            ), false
                        );
                        $input = ob_get_clean();
                        if($arOptParams['REFRESH'] == 'Y')
                            $input .= '<input type="submit" name="refresh" value="OK" />';
                        break;
                    case 'FILE':

                        if (!empty($_FILES[$opt]['tmp_name'])) {//???????? ?????? ??????????
                          $arr_file=Array(
                          "name" => $_FILES[$opt]['name'],
                          "size" => $_FILES[$opt]['size'],
                          "tmp_name" => $_FILES[$opt]['tmp_name'],
                          "type" => "",
                          "old_file" => "",
                          "del" => "Y",
                          "MODULE_ID" => $module_id);
                          $fid = CFile::SaveFile($arr_file, "kilmarket");
                          if (strlen($fid)>0) {
                            $fileSrc = CFile::GetPath($fid);
                            $input = "<img src='".$fileSrc."' width='150' /><br />";
                            $input .= CFile::InputFile($opt, 20, __FD_PARAM_.$opt,"/include/img/",0,"IMAGE",false,false,false,false,true,true);
                            if($opt == 'UPLOAD_LOGO') {
                              RewriteFile($_SERVER["DOCUMENT_ROOT"]."/include/logo.php", $fileSrc);
                            }
                            if($opt == 'COMPANY_INTRO_IMG') {
                              RewriteFile($_SERVER["DOCUMENT_ROOT"]."/include/about-pictureLink.php", $fileSrc);
                            }
                          }
                        } else {
                          $input = '';
                          if($opt == 'UPLOAD_LOGO') {
                            $fileSrc = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/include/logo.php");
                            if($fileSrc != '') {
                              $input .= "<img src='".$fileSrc."' width='300' /><br />";
                            }
                          }
                          if($opt == 'COMPANY_INTRO_IMG') {
                            $fileSrc = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/include/about-pictureLink.php");
                            if($fileSrc != '') {
                              $input .= "<img src='".$fileSrc."' width='300' /><br />";
                            }
                          }
                          $input .= CFile::InputFile($opt, 20, __FD_PARAM_.$opt,"/include/img/",0,"IMAGE",false,false,false,false,true,true);
                        }


                        break;
                    case 'CUSTOM':
                        $input = $arOptParams['VALUE'];
                        break;
                    default:
                        if(!isset($arOptParams['SIZE']))
                            $arOptParams['SIZE'] = 25;
                        if(!isset($arOptParams['MAXLENGTH']))
                            $arOptParams['MAXLENGTH'] = 255;
                        $input = '<input type="'.($arOptParams['TYPE'] == 'INT' ? 'number' : 'text').'" size="'.$arOptParams['SIZE'].'" maxlength="'.$arOptParams['MAXLENGTH'].'" value="'.htmlspecialchars($val).'" name="'.htmlspecialchars($option).'" />';
                        if($arOptParams['REFRESH'] == 'Y')
                            $input .= '<input type="submit" name="refresh" value="OK" />';
                        break;
                }
                if(isset($arOptParams['NOTES']) && $arOptParams['NOTES'] != '')
                    $input .=     '<div class="notes">
                                    <table cellspacing="0" cellpadding="0" border="0" class="notes">
                                        <tbody>
                                            <tr class="top">
                                                <td class="left"><div class="empty"></div></td>
                                                <td><div class="empty"></div></td>
                                                <td class="right"><div class="empty"></div></td>
                                            </tr>
                                            <tr>
                                                <td class="left"><div class="empty"></div></td>
                                                <td class="content">
                                                    '.$arOptParams['NOTES'].'
                                                </td>
                                                <td class="right"><div class="empty"></div></td>
                                            </tr>
                                            <tr class="bottom">
                                                <td class="left"><div class="empty"></div></td>
                                                <td><div class="empty"></div></td>
                                                <td class="right"><div class="empty"></div></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>';
                $arP[$this->arGroups[$arOptParams['GROUP']]['TAB']][$arOptParams['GROUP']]['OPTIONS'][] = $label != '' ? '<tr><td valign="middle">'.$label.'</td><td valign="middle" nowrap>'.$input.'</td></tr>' : '<tr><td valign="middle" colspan="2" align="center">'.$input.'</td></tr>';
                $arP[$this->arGroups[$arOptParams['GROUP']]['TAB']][$arOptParams['GROUP']]['OPTIONS_SORT'][] = $arOptParams['SORT'];
            }
            $tabControl = new CAdminTabControl('tabControl', $this->arTabs);
            $tabControl->Begin();
            echo '<form name="'.$this->module_id.'" method="POST" action="'.$APPLICATION->GetCurPage().'?mid='.$this->module_id.'&lang='.LANGUAGE_ID.'" enctype="multipart/form-data">'.bitrix_sessid_post();
            foreach($arP as $tab => $groups)
            {
                $tabControl->BeginNextTab();
                foreach($groups as $group_id => $group)
                {
                    if(sizeof($group['OPTIONS_SORT']) > 0)
                    {
                        echo '<tr class="heading"><td colspan="2">'.$this->arGroups[$group_id]['TITLE'].'</td></tr>';
                        array_multisort($group['OPTIONS_SORT'], $group['OPTIONS']);
                        foreach($group['OPTIONS'] as $opt)
                            echo $opt;
                    }
                }
            }
            if($this->need_access_tab)
            {
                $tabControl->BeginNextTab();
                $module_id = $this->module_id;
                require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/admin/group_rights.php");
            }
            $tabControl->Buttons();
            echo  '<input type="hidden" name="update" value="Y" />
                    <input type="submit" name="save" value="' . GetMessage('MAIN_SAVE') . '" />
                    <input type="reset" name="reset" value="' . GetMessage('MAIN_OPT_CANCEL') . '" />
                    </form>';
            $tabControl->End();
        }
    }
}
