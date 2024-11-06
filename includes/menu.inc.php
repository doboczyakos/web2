<?php

/*  db felepitese:
Nyitolap     10
SOAP         20
    server   30
    kliens   40
    MNB      50
RESTful      60
    server   70
    kliens   80
PDF          90
belepes      100
kilepes      110
admin        120  */

Class Menu {
    public static $menu = array();
    
    public static function setMenu() {
        self::$menu = array();
        $connection = Database::getConnection();
        $stmt = $connection->query("select url, nev, szulo, jogosultsag from menu where jogosultsag like '".$_SESSION['userlevel']."'order by sorrend");
        while($menuitem = $stmt->fetch(PDO::FETCH_ASSOC)) {
            self::$menu[$menuitem['url']] = array($menuitem['nev'], $menuitem['szulo'], $menuitem['jogosultsag']);
        }
    }

    public static function getMenu($sItems) {
        $iconIndex = 0;
        $icons = array("home", "cog", "retweet", "sitemap", "envelope", "phone", "home", "cog", "retweet", "sitemap", "envelope", "phone");
        $submenu = "";
        $menu = "<ul>";
        
        /*  nyitolapArray (    [0] => Nyitólap       [1] =>      [2] => 111 )
            soapArray (        [0] => SOAP           [1] =>      [2] => 111 )
            soap-serverArray ( [0] => SOAP-server    [1] => soap [2] => 111 )
            soap-kliensArray ( [0] => SOAP-kliens    [1] => soap [2] => 111 )
            soap-mnbArray (    [0] => SOAP-MNB       [1] => soap [2] => 111 )
            restArray (        [0] => Restful        [1] =>      [2] => 100 )
            rest-serverArray ( [0] => Restful-server [1] => rest [2] => 100 )
            rest-kliensArray ( [0] => Restful-kliens [1] => rest [2] => 100 )
            pdfArray (         [0] => PDF            [1] =>      [2] => 100 )
            belepesArray (     [0] => Belépés        [1] =>      [2] => 100 )  */

        foreach(self::$menu as $menuindex => $menuitem) 
        {
            // it is a sub-menu
            if($menuitem[1] != "")
            {
                if ($submenu == "")
                {
                    $menu = rtrim($menu, "</li>");
                    $menu = $menu.">"; // no idea why it trims </a></li> to: </a

                    $submenu = "<ul>";
                }

                $submenu .="<li><a href='".SITE_ROOT.$menuindex."' >".$menuitem[0]."</a></li>";
            }
            else
            {
                if ($submenu != "")
                {
                    $menu .= $submenu."</ul></li>";
                    $submenu = "";
                }
              
                $menu.= "<li><a  class=\"icon solid fa-".$icons[$iconIndex]."\" href='".SITE_ROOT.$menuindex."' "."><span>".$menuitem[0]."</span></a></li>"; 
                $iconIndex = $iconIndex + 1;
            }

        }

        $menu.="</ul>";
        return $menu;
    }
}

Menu::setMenu();
?>
