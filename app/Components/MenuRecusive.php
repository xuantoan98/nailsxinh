<?php

namespace App\Components;

use App\Models\Menu;

class MenuRecusive {

    private $html;

    public function __construct()
    {
        $this->html = '';
    }

    public function menuRecusiveCreate($parentID = 0, $text = '')
    {
        $data = Menu::where('parent_id', $parentID)->get();
        foreach($data as $item) {
            $this->html .= '<option value="' . $item->id . '">' . $text . $item->name . '</option>';
            $this->menuRecusiveCreate($item->id, $text . '--');
        }

        return $this->html;
    }


}
