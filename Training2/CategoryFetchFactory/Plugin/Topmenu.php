<?php
namespace Task\Task1\Plugin;

class Topmenu
{

    public function afterGetHtml(\Magento\Theme\Block\Html\Topmenu $topmenu, $html)
    {
        $swappartyUrl = $topmenu->getUrl('tasktask1/custommenu');
        $html .= "<li class=\"level0 nav-4 level-top parent ui-menu-item\"><a href=\"" . $swappartyUrl . "\" class=\"level-top ui-corner-all\"><span class=\"ui-menu-icon ui-icon ui-icon-carat-1-e\"></span><span>" . __("Custom Menu") . "</span></a>";
        $html .= "</li>";
        return $html;
    }
}
