<?php

class Menu_HomeController extends Custom_Controller_BaseUserController {

    private $order;

    /**
     * auto call this method when action being call
     */
    public function init() {
        /* Initialize action controller here */
        $this->_helper->layout->setLayout('/admin/layout');
        parent::init();
        parent::loadUserInfor();
        parent::loadMenuByRole();
        $this->order = 0;
    }

    public function indexAction() {
        
    }

    /**
     * view list menu
     */
    public function viewAction() {
        // posision menu : top, left, right, bottom
        $url = $this->getHelper('url')->url(array('module' => 'menu',
            'controller' => 'Home',
            'action' => 'edit'));
        $this->view->editController = $url;
        $this->show();
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
            $this->menuDAO->updateMenu($parentMenu['id'], null, ++$this->order);
            $this->loop($parentMenu);
        }
        $this->show();
    }

    /**
     * 
     */
    public function addAction() {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $name = $request->getPost("title", null);
            $alias = $request->getPost("alias", null);
            $posistion = $request->getPost("position", null);
            $root = $request->getPost("parent", null);
            if ($root == -1)
                $root = null;
            $module = $request->getPost("module", null);
            $content = $request->getPost("subcat", null);
            $description = $request->getPost("description", null);
            $newRow = array("name" => $name, "alias" => $alias, "root_menu" => $root, "module" => $module, "position" => $posistion, "content" => $content);
            $this->menuDAO->create($newRow);
            $this->show();
        } else if ($request->isGet()) {
            $request = $this->getRequest();
            $menuPosition = $request->getParam("menuPosition");
            $this->view->listMenu = $this->menuDAO->getMenusByPosition($menuPosition);
            $this->view->menuPosition = $menuPosition;
            $this->view->listModules = $this->moduleDAO->getAllModulesForMenus();
        }

        // show add gui from view gui
    }

    public function editAction() {
        $request = $this->getRequest();

        // posision menu : top, left, right, bottom
        if ($request->isPost()) {
            if (array_key_exists('editMenu', $request->getPost())) {
                # Publish-button was clicked
                $id = $request->getPost("id", null);
                $name = $request->getPost("title", null);
                $alias = $request->getPost("alias", null);
                $posistion = $request->getPost("position", null);
                $root = $request->getPost("parent", null);
                if ($root == -1)
                    $root = null;
                $module = $request->getPost("module", null);
                $content = $request->getPost("subcat", null);
                $description = $request->getPost("description", null);
                $newRow = array("name" => $name, "alias" => $alias, "root_menu" => $root, "module" => $module, "position" => $posistion, "content" => $content);
                $this->menuDAO->update($newRow, $id);
                $this->show();
            } else if (array_key_exists('deleteMenu', $request->getPost())) {
                $id = $request->getParam("id");
                $this->menuDAO->delete($id);
                $this->show();
                # Save-button was clicked
            }
        } else {
            $menuPosition = $request->getParam("menuPosition");
            $idMenu = $request->getParam("id");
            $this->view->listMenu = $this->menuDAO->getMenusByPosition($menuPosition);
            $this->view->menuPosition = $menuPosition;
            $this->view->currentMenu = $this->menuDAO->get($idMenu);
            $this->view->listModules = $this->moduleDAO->getAllModulesForMenus();
        }
    }

    /*
     * loop in children menu to update position
     */

    private function loop($parentMenu) {
        if (!empty($parentMenu['children'])) {
            $arrayMenu = $parentMenu['children'];
            foreach ($arrayMenu as $menu) {
                $this->menuDAO->updateMenu($menu['id'], $parentMenu['id'], ++$this->order);
                $this->loop($menu);
            }
        }
    }

    private function show() {
        $request = $this->getRequest();
        $menuPosition = $request->getParam("menuPosition");
        $this->view->listMenu = $this->menuDAO->getMenusByPosition($menuPosition);
        $this->view->menuPosition = $menuPosition;
        $this->view->listModules = $this->moduleDAO->getAllModulesForMenus();
        $this->_helper->viewRenderer->renderBySpec('view', array('module' =>
            'menu', 'controller' => 'Home'));
    }

}
