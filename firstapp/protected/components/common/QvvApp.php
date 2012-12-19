<?php
/**
 * @author Qvv <qvv.hn.vn@gmail.com>
 */
class QvvApp extends CWebApplication
{
    public function  init() {
        parent::init();
        $this->_loadConfig();
    }

    public function _loadConfig(){
        $params = $this->getParams();
        // config params
        $configs = Config::model()->findAll();
        if($configs){
            foreach($configs as $config){
                $params[$config->name] = $config->value;
            }
        }

        // Build site metadata if has config
        $htmlMetadata = isset($params->htmlMetadata) ? $params->htmlMetadata : array();
        if (isset($params->metaTitle))$htmlMetadata['title'] = $params->metaTitle;
        if (isset($params->metaDescription)) $htmlMetadata['description'] = $params->metaDescription;
        if (isset($params->metaKeywords)) $htmlMetadata['keywords'] = $params->metaKeywords;
        $params->htmlMetadata = $htmlMetadata;
    }
}
?>