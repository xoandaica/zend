<?php

class Menu_HomeController extends Custom_Controller_BaseUserController {

    private $menuDAO;

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

    public function viewAction() {
        $request = $this->getRequest();
        // posision menu : top, left, right, bottom
        $menuPosition = $request->getParam("menuPosition");
        $this->view->listMenu = $this->menuDAO->getAllMenu($menuPosition);
        $this->view->menuPosition = $menuPosition;
    }

    public function saveAction() {
        $request = $this->getRequest();
        $listMenu = $request->getPost("newMenu", null);
        $menuPosition = $request->getPost("menuPosition", null);
        $arrayMenu = json_decode($listMenu, true); //decode json to array
        foreach ($arrayMenu as $parentMenu) {
            // update rootMenu
            $this->menuDAO->updateMenu($parentMenu['id'], null);
            $this->loop($parentMenu);
        }
    }

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
