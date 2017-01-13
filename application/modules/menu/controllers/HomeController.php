<?php

class Menu_HomeController extends Custom_Controller_BaseUserController {

    private $menuDAO;
    
    /**
     * auto call this method when action being call
     */
    public function init() {
        /* Initialize action controller here */
        $this->_helper->layout->setLayout('/admin/layout');
        $this->loadSession();
        $this->loadUserInfor();
        $this->loadMenuByRole();
        $this->menuDAO = new Application_Model_DbTable_Menus();
    }
    
    public function indexAction() {
        // action body
    }
    
    /**
     * view list menu
     */
    public function viewAction() {
        $request = $this->getRequest();
        // posision menu : top, left, right, bottom
        $menuPosition = $request->getParam("menuPosition");
        $this->view->listMenu = $this->menuDAO->getAllMenu($menuPosition);
        $this->view->menuPosition = $menuPosition;
    }

    /**
     * save new positoin for menu
     * input = json like [{ "id": 1, "children": [{ "id": 2, "children": [{ "id": 4, "children": [{ "id": 5, "children": [{ "id": 6 }] }] }, { "id": 3 }, { "id": 7 }, { "id": 8 }] }, { "id": 9, "children": [{ "id": 10 }, { "id": 11 }] }] }]
     */
    public function saveAction() {
        $request = $this->getRequest();
        $listMenu = $request->getPost("newMenu", null);
//        $menuPosition = $request->getPost("menuPosition", null);
        $arrayMenu = json_decode($listMenu, true); //decode json to array
        foreach ($arrayMenu as $parentMenu) {
            // update rootMenu
            $this->menuDAO->updateMenu($parentMenu['id'], null);
            $this->loop($parentMenu);
        }
    }

    /*
     * loop in children menu to update position
     */

    private function loop($parentMenu) {
        if (!empty($parentMenu['children'])) {
            $arrayMenu = $parentMenu['children'];
            foreach ($arrayMenu as $menu) {
                $this->menuDAO->updateMenu($menu['id'], $parentMenu['id']);
                $this->loop($menu);
            }
        }
    }

}
