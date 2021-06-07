<?php

namespace App\Components;

use App\Models\Menu;

class MenuRecusive {

    /**
     * @var string
     */
    private $html;

    /**
     * MenuRecusive constructor.
     */
    public function __construct()
    {
        $this->html = '';
    }

    /**
     * @param int $parentID
     * @param string $text
     * @return string
     */
    public function menuRecusiveCreate($parentID = 0, $text = '')
    {
        $data = Menu::where('parent_id', $parentID)->get();
        foreach($data as $item) {
            $this->html .= '<option value="' . $item->id . '">' . $text . $item->name . '</option>';
            $this->menuRecusiveCreate($item->id, $text . '--');
        }

        return $this->html;
    }

    /**
     * @param $parentIdItem
     * @param int $parentID
     * @param string $text
     * @return string
     */
    public function menuRecusiveEdit($parentIdItem, $parentID = 0, $text = '')
    {
        $data = Menu::where('parent_id', $parentID)->get();
        foreach($data as $item) {
            if($parentIdItem == $item->id) {
                $this->html .= '<option selected value="' . $item->id . '">' . $text . $item->name . '</option>';
            } else {
                $this->html .= '<option value="' . $item->id . '">' . $text . $item->name . '</option>';
            }

            $this->menuRecusiveEdit($parentIdItem, $item->id, $text . '--');
        }

        return $this->html;
    }
}
