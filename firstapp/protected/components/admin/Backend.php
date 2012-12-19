<?php
/**
 * @author Qvv<qvv.hn.vn@gmail.com>
 */
Class Backend {

    /**
     *
     * get main menu items array
     * @return array
     */
    public static function getMainMenu() {
        $allMenu = array(
            //Home
            'Home' => array('iconUrl'=>Yii::app()->request->baseUrl.'/css/admin/images/icons/2_12x12.png', 'label'=>Yii::t('BackEnd','Home'), 'url' => array('/site/index')),

            //Content
			'CMS' => array('iconUrl'=>Yii::app()->request->baseUrl.'/css/admin/images/icons/1_12x12.png', 'label'=>Yii::t('BackEnd','Content'), 'url' => array('/article/index'), 'visible'=>UserAccess::checkAccess('articleIndex'),
                        'subs'=>array(
							'articles' => array('iconUrl'=>Yii::app()->request->baseUrl.'/css/admin/images/icons/5_12x12.png', 'label'=>Yii::t('BackEnd','Articles manage'), 'url'=>array('/article/index'), 'visible'=>UserAccess::checkAccess('articleIndex'),
							'subs' => array(
								'/article/index' => array('iconUrl'=>Yii::app()->request->baseUrl.'/css/admin/images/icons/5_12x12.png', 'label'=>Yii::t('BackEnd','Articles list'), 'url'=>array('/article/index'), 'visible'=>UserAccess::checkAccess('articleIndex')),
								'/articleCategory/index' => array('iconUrl'=>Yii::app()->request->baseUrl.'/css/admin/images/icons/6_12x12.png', 'label'=>Yii::t('BackEnd','Article categories'), 'url'=>array('/articleCategory/index'), 'visible'=>UserAccess::checkAccess('articleCategoryIndex')),
//                                '/comment/index' => array('iconUrl'=>Yii::app()->request->baseUrl.'/css/admin/images/icons/comment_16x16.png', 'label'=>Yii::t('BackEnd','Article comment'), 'url'=>array('/comment/index'), 'visible'=>UserAccess::checkAccess('commentIndex'))
							)),
                            '/video/admin' => array('iconUrl'=>Yii::app()->request->baseUrl.'/css/admin/images/icons/5_12x12.png', 'label'=>Yii::t('BackEnd','Video list'), 'url'=>array('/video/admin'), 'visible'=>UserAccess::checkAccess('videoAdmin')),
							'/videoType/admin' => array('iconUrl'=>Yii::app()->request->baseUrl.'/css/admin/images/icons/6_12x12.png', 'label'=>Yii::t('BackEnd','Video type'), 'url'=>array('/videoType/admin'), 'visible'=>UserAccess::checkAccess('videoTypeAdmin')),
                            '/menu/index' => array('iconUrl'=>Yii::app()->request->baseUrl.'/css/admin/images/icons/10_12x12.png', 'label'=>Yii::t('BackEnd','Menu manage'), 'url'=>array('/menu/index'), 'visible'=>UserAccess::checkAccess('menuIndex')),
                        ),
						'controllers' => array('videoType','video','article', 'banner', 'articleCategory', 'slideShow', 'menu','supportOnline','comment')
						),
            //System
            'Setting' => array('iconUrl'=>Yii::app()->request->baseUrl.'/css/admin/images/icons/3_12x12.png', 'label'=>Yii::t('BackEnd','System'), 'url' => array('#'),
                        'subs'=>array(
                            '/emailTemplate/admin' => array('iconUrl'=>Yii::app()->request->baseUrl.'/css/admin/images/icons/emailTemplate.png', 'label'=>Yii::t('BackEnd','Giao diện email'), 'url'=>array('/emailTemplate/admin'), 'visible'=>UserAccess::checkAccess('emailTemplateAdmin')),
                            '/adminUser/index' => array('iconUrl'=>Yii::app()->request->baseUrl.'/css/admin/images/icons/12_12x12.png', 'label'=>Yii::t('BackEnd','Account manager'), 'url'=>array('/adminUser/index'), 'visible'=>UserAccess::checkAccess('adminUserIndex')),
                            '/srbac' => array('iconUrl'=>Yii::app()->request->baseUrl.'/css/admin/images/icons/25_12x12.png','label'=>Yii::t('BackEnd','Grant Permission'), 'url'=>array('/srbac'), 'visible'=>UserAccess::checkAccess('srbac')),
                            'configuration' => array(
                                'iconUrl'=>Yii::app()->request->baseUrl.'/css/admin/images/icons/11_12x12.png',
                                'label'=>Yii::t('BackEnd','Setting manager'), 'url'=>array('/config/setting'), 'visible'=>UserAccess::checkAccess('configSetting'),
                                'subs' => array(
                                    '/config/setting' => array('iconUrl'=>Yii::app()->request->baseUrl.'/css/admin/images/icons/11_12x12.png', 'label'=>Yii::t('BackEnd','Setting'), 'url'=>array('/config/setting'), 'visible'=>UserAccess::checkAccess('configSetting')),
                                    '/config/index' => array('iconUrl'=>Yii::app()->request->baseUrl.'/css/admin/images/icons/3_12x12.png', 'label'=>Yii::t('BackEnd','Config manager'), 'url'=>array('/config/admin'), 'visible'=>UserAccess::checkAccess('configAdmin')),
                                    '/configGroup/index' => array('iconUrl'=>Yii::app()->request->baseUrl.'/css/admin/images/icons/14_12x12.png', 'label'=>Yii::t('BackEnd','Config group manager'), 'url'=>array('/configGroup/admin'), 'visible'=>UserAccess::checkAccess('configGroupAdmin')),
                                )),
                        ),
                        'controllers' => array('adminUser', 'config','emailTemplate')
                        ),
            'FrontEnd' => array('iconUrl'=>Yii::app()->request->baseUrl.'/css/admin/images/icons/4_12x12.png', 'label'=>Yii::t('BackEnd','Front end'), 'url' => (isset(Yii::app()->params->systemFrontEndUrl))?Yii::app()->params->systemFrontEndUrl:'#', 'target' => '_blank'),
        );

        self::rebuildArray($allMenu);
        return $allMenu;
    }

    public static function rebuildArray(&$allMenu)
    {
        foreach ($allMenu as $k=>$menu)
        {
            if(isset($menu['subs'])&& is_array($menu['subs']))
            {
                foreach ($menu['subs'] as $ksub=>$item)
                {
                    if(isset($item['visible']) && !$item['visible'])
                    {
                        unset ($menu['subs'][$ksub]);
                    }
                }
            }
            
            //Assign url in subs item to Parent
            if(isset($menu['url']))
            {
                $allMenu[$k]['url'] = $menu['url'];
            }
            elseif(count($menu['subs']))
            {
                $item = array_shift(array_values($menu['subs']));
                $allMenu[$k]['url'] = $item['url'][0];
            }
            else
            {
                unset ($allMenu[$k]);
            }

            //recursive function
//            if(isset($menu['subs']['subs'])&& is_array($menu['subs']['subs']))
//            {
//                self::rebuildArray($menu['subs']);
//            }
        }

    }
    public static function getModuleSlideBar($module, $activeItem, $level2 = '') {
        $mainMenu = self::getMainMenu();
        if($level2)
        {
            $slideBar = $mainMenu[$module]['subs'][$level2]['subs'];
        }
        else
        {
            $slideBar = $mainMenu[$module]['subs'];
        }
        if(!isset($slideBar[$activeItem])) return array();
        
        $slideBar[$activeItem]['url'] = "#";
        $slideBar[$activeItem]['class'] = 'active';
        return $slideBar;
    }
}
?>

