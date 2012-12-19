<?php
/**
 * Common library class
 */
class Common {
    
    const TARGET_SELF = '_self';
    const TARGET_BLANK = '_blank';
    
    static public $dateText = array();
    /**
     *
     * Load language message by category
     * @param STRING $category
     * @return ARRAY
     */
    public static function loadMessages($category) {
        $languageFile = Yii::app()->getBasePath().DIRECTORY_SEPARATOR."messages".DIRECTORY_SEPARATOR.Yii::app()->getLanguage().DIRECTORY_SEPARATOR."{$category}.php";
        if(!file_exists($languageFile)) $languageFile = Yii::app()->getBasePath().DIRECTORY_SEPARATOR."messages".DIRECTORY_SEPARATOR.Yii::app()->getLanguage().DIRECTORY_SEPARATOR."FrontEnd.php.php";
        return require($languageFile);
    }

    public function highlight($x, $var) {
        $var = explode(" ",$var);

       for($j=0; $j< count($var); $j++){
            $xtemp = "";
            $i=0;
            while($i<strlen($x)){
                if((($i + strlen($var[$j])) <= strlen($x)) && (strcasecmp($var[$j], substr($x, $i, strlen($var[$j]))) == 0)) {
                        $xtemp .= "<b>" . substr($x, $i , strlen($var[$j])) . "</b>";
                        $i += strlen($var[$j]);
                }
                else {
                    $xtemp .= $x{$i};
                    $i++;
                }
            }
            $x = $xtemp;
        }
        return $x;
    }

    public function nl2br_except_pre($str)
	{
		$ex = explode("pre>",$str);
		$ct = count($ex);
		$newstr = "";
		for ($i = 0; $i < $ct; $i++)
		{
			if (($i % 2) == 0)
			{
				$newstr .= nl2br($ex[$i]);
			}
			else
			{
				$newstr .= $ex[$i];
			}

			if ($ct - 1 != $i)
				$newstr .= "pre>";
		}
		return $newstr;
	}
    
    /**
     *
     * make user fullname from firstname and lastname, displayed independen by language
     * @param User Object $user(id, firstname, lastname)
     * @return string
     */
    public static function makeFullname($firstname, $lastname) {
        if((!$firstname) && (!$lastname)) return '';
        if(Yii::app()->language == 'en_us')
        {
            $fullname = $lastname." ".$firstname;
        }
        else
        {
            $fullname = $firstname." ".$lastname;
        }

        return trim($fullname);
    }

     /**
     * Get newnest position function
     * @return number|number
     */
    public static function getNewestPosition($model)
    {
        $position = 0;
        if($model)
        {
            $criteria = new CDbCriteria();
            $criteria->select = "sorder";
            $criteria->order = "sorder";
            $items = $model->findAll($criteria);
            $position = 1;
            foreach($items as $item)
            {
                if($position != $item->sorder )
                {
                    return $position;
                }
                $position++;
            }
        }
        return $position;
    }

    /**
     * Make new random filename
     */
    public static function getRandFlieName($file_name)
    {
		$pos		= strrpos($file_name, '.');
		$extension	= substr($file_name, $pos+1);
		$name		= substr($file_name, 0, $pos);
		$rand_time	= time();
		$rand_name	= $name . $rand_time . "." . $extension;

		return $rand_name;
    }
    
    /**
     *
     * Create an url string
     * @staticvar ARRAY $charMap
     * @param STRING $string
     * @return STRING
     */
    public static function makeFriendlyUrl($string, $allowUnder = false)
    {
        static $charMap = array(
                    "à"=>"a","ả"=>"a","ã"=>"a","á"=>"a","ạ"=>"a","ă"=>"a","ằ"=>"a","ẳ"=>"a","ẵ"=>"a","ắ"=>"a","ặ"=>"a","â"=>"a","ầ"=>"a","ẩ"=>"a","ẫ"=>"a","ấ"=>"a","ậ"=>"a",
                    "đ"=>"d",
                    "è"=>"e","ẻ"=>"e","ẽ"=>"e","é"=>"e","ẹ"=>"e","ê"=>"e","ề"=>"e","ể"=>"e","ễ"=>"e","ế"=>"e","ệ"=>"e",
                    "ì"=>'i',"ỉ"=>'i',"ĩ"=>'i',"í"=>'i',"ị"=>'i',
                    "ò"=>'o',"ỏ"=>'o',"õ"=>"o","ó"=>"o","ọ"=>"o","ô"=>"o","ồ"=>"o","ổ"=>"o","ỗ"=>"o","ố"=>"o","ộ"=>"o","ơ"=>"o","ờ"=>"o","ở"=>"o","ỡ"=>"o","ớ"=>"o","ợ"=>"o",
                    "ù"=>"u","ủ"=>"u","ũ"=>"u","ú"=>"u","ụ"=>"u","ư"=>"u","ừ"=>"u","ử"=>"u","ữ"=>"u","ứ"=>"u","ự"=>"u",
                    "ỳ"=>"y","ỷ"=>"y","ỹ"=>"y","ý"=>"y","ỵ"=>"y",
                    "À"=>"A","Ả"=>"A","Ã"=>"A","Á"=>"A","Ạ"=>"A","Ă"=>"A","Ằ"=>"A","Ẳ"=>"A","Ẵ"=>"A","Ắ"=>"A","Ặ"=>"A","Â"=>"A","Ầ"=>"A","Ẩ"=>"A","Ẫ"=>"A","Ấ"=>"A","Ậ"=>"A",
                    "Đ"=>"D",
                    "È"=>"E","Ẻ"=>"E","Ẽ"=>"E","É"=>"E","Ẹ"=>"E","Ê"=>"E","Ề"=>"E","Ể"=>"E","Ễ"=>"E","Ế"=>"E","Ệ"=>"E",
                    "Ì"=>"I","Ỉ"=>"I","Ĩ"=>"I","Í"=>"I","Ị"=>"I",
                    "Ò"=>"O","Ỏ"=>"O","Õ"=>"O","Ó"=>"O","Ọ"=>"O","Ô"=>"O","Ồ"=>"O","Ổ"=>"O","Ỗ"=>"O","Ố"=>"O","Ộ"=>"O","Ơ"=>"O","Ờ"=>"O","Ở"=>"O","Ỡ"=>"O","Ớ"=>"O","Ợ"=>"O",
                    "Ù"=>"U","Ủ"=>"U","Ũ"=>"U","Ú"=>"U","Ụ"=>"U","Ư"=>"U","Ừ"=>"U","Ử"=>"U","Ữ"=>"U","Ứ"=>"U","Ự"=>"U",
                    "Ỳ"=>"Y","Ỷ"=>"Y","Ỹ"=>"Y","Ý"=>"Y","Ỵ"=>"Y"
        );

        $string = strtr($string, $charMap);

        $string = self::cleanUpSpecialChars($string, $allowUnder);
        return strtolower($string);
    }

    public static function makeUcwords($string)
    {
        static $chars = array(
            "à"=>"À","ả"=>"Ả","ã"=>"Ã","á"=>"Á","ạ"=>"Ạ","ă"=>"Ă","ắ"=>"Ắ","ẳ"=>"Ẳ","ằ"=>"Ằ","ẵ"=>"Ẵ","ặ"=>"Ặ","â"=>"Â","ầ"=>"Ầ","ẫ"=>"Ẫ","ẩ"=>"Ẩ","ấ"=>"Ấ","ậ"=>"Ậ",
            "đ"=>"Đ",
            "è"=>"È","é"=>"É","ẻ"=>"Ẻ","ẽ"=>"Ẽ","ẹ"=>"Ẹ","ê"=>"Ê","ề"=>"Ề","ế"=>"Ế","ể"=>"Ể","ễ"=>"Ễ","ệ"=>"Ệ",
            "Ì"=>"I","Ỉ"=>"I","Ĩ"=>"I","Í"=>"I","Ị"=>"I",
            "ò"=>"Ò","ó"=>"Ó","ỏ"=>"Ỏ","õ"=>"Õ","ọ"=>"Ọ",
            "ô"=>"Ô","ồ"=>"Ồ","ố"=>"Ố","ổ"=>"Ổ","ỗ"=>"Ỗ","ộ"=>"Ộ",
            "ơ"=>"Ơ","ờ"=>"Ờ","ớ"=>"Ớ","ở"=>"Ở","ỡ"=>"Ỡ","ợ"=>"Ợ",
            "ù"=>"Ù","ú"=>"Ú","ủ"=>"Ủ","ũ"=>"Ũ","ụ"=>"Ụ","ư"=>"Ư","ừ"=>"Ừ","ứ"=>"Ứ","ử"=>"Ử","ữ"=>"Ữ","ự"=>"Ự",
            "ỳ"=>"Ỳ","ý"=>"Ý","ỷ"=>"Ỷ","ỹ"=>"Ỹ","ỵ"=>"Ỵ"
        );
        
            $str = explode(' ', trim($string));
            $ttWords = count($str);
            $newStr = '';
            
            for ($i = 0; $i <= $ttWords; $i++)
            {
                $k = $i;
                foreach ($chars as $char => $upper)
                {
                    if (mb_substr($str[$i], 0, 1, 'UTF-8') == $char)
                    {
                        $newStr .= ' '.str_replace($char, $upper, $str[$i]);
                        $k++;
                        break;
                    }
                }
                if ($k == $i)
                    $newStr .= ' '.ucwords($str[$k]);
            }
           $newStr = trim($newStr);
       return $newStr;
    }

    public static function cleanUpSpecialChars($string, $allowUnder = false){
        //$string = preg_replace( array("`[^a-zA-Z0-9\$_+*'()]`i","`[-]+`") , "-", $string);
        $regExpression = "`\W`i";
        if($allowUnder) $regExpression = "`[^a-zA-Z0-9-]`i";

        $string = preg_replace( array($regExpression, "`[-]+`",) , "-", $string);
        return trim($string, '-');
    }

    //Float $price
    public static function formatPrice($price, $decimal=0)
    {
        if($price == 0)
        {
            $result = Yii::t('Global', 'Contact');
        }
        else
        {
            $result = number_format($price, $decimal, '.', ',').' '.Yii::t('Global', 'Price currency');
        }

        return $result;
    }

    // website address format
    public function adressFormat($add)
    {
        if (strpos($add, 'http') === FALSE) return FALSE;
		else {
			$regex = "((http?|https?)\:\/\/)?"; // SCHEME
			$regex .= "([a-z0-9-.]*)\.([a-z]{2,4})?"; // Host or IP
			$regex .= "(\:[0-9]{2,5})?"; // Port
			$regex .= "(\/([a-z0-9+\$_-]\.?)+)*?"; // Path
			$regex .= "(\/)?"; // Path
			//$regex .= "(\/?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)"; // GET Query
			//$regex .= "(#[a-z_.-][a-z0-9+\$_.-]*)?"; // Anchor
			return (preg_match("/^$regex$/", $add)) ? TRUE : FALSE;
		}
    }
    /**
     *
     * Tao cau truc thu muc da cap de luu tru file. Khac phuc gioi han ve so luong file trong 1 thu muc
     * @param INT $objID
     * @return string
     */
    public static function storageSolutionEncode($objID, $isUri = false)
    {
        $step           = 15;    //so bit de ma hoa ten thu muc tren 1 cap
        $layer          = 3;    //so cap thu muc
        $max_bits         = PHP_INT_SIZE*8;
        $separator      = $isUri ? "/" : DIRECTORY_SEPARATOR;
        $result         = "";

        for($i=$layer; $i>0; $i--)
        {
            $shift   = $step*$i;
            $layer_name  = $shift<=$max_bits?$objID >> $shift:0;

            $result .= $separator.$layer_name;
        }

        return $result;
    }

    public static function emptyFolder($dir)
    {
        // Open a known directory, and proceed to read its contents
        if (is_dir($dir))
        {
            if ($dh = opendir($dir))
            {
                while (($file = readdir($dh)) !== false)
                {
                    if(($file != ".") && ($file != "..")) unlink($dir . '/' .$file);
                }
                closedir($dh);
            }
        }

    }

    public static function removeDir($dir)
    {
        if(is_dir($dir))
        {
            self::emptyFolder($dir);
            rmdir($dir);
        }
    }

     /**
     *
     * @param object $uploadedFile
     * @param string $targetFile
     * @return array(
     *      'code' => 1, // 1= true, 0 = false
     *      'message' => 'some message'
     * )
     */
    public static function uploadImage($uploadedFile, $targetFile, $isImage = false)
    {
        if($uploadedFile['name'])
        {
            $error = "";
            if(!$uploadedFile) $error = Yii::t('BackEnd', 'No input file');;

            $limitFileSize = Yii::app()->params['maxUploadFileSize'];
            if(!$isImage) $supportMineTypes = Yii::app()->params['supportMineTypes'];
            else $supportMineTypes = array("image/gif", "image/jpeg", "image/png", "image/bmp", "image/jp2");

            // validate image
            if($uploadedFile)
            {
                if($uploadedFile['size'] > $limitFileSize)
                {
                    $error = Yii::t('BackEnd', 'File too big').'('.$uploadedFile['size'].')';
                }
                if ($uploadedFile['error'] != UPLOAD_ERR_OK)
                {
                    $error = Yii::t('FronBackEndtEnd', 'Error on uploading');
                }

                if(!in_array($uploadedFile['type'], $supportMineTypes))
                {
                    $error = Yii::t('BackEnd', 'Not supported file type');
                }
            }

            // save image
            if($error != "")
            {
                return array(
                    'code' => 0,
                    'message' => $error,
                );
            }
            else
            {
                $tmpName = $uploadedFile["tmp_name"];
                move_uploaded_file($tmpName, $targetFile);
                return array(
                    'code' => 1,
                    'message' => Yii::t('FrontEnd', 'Success'),
                );
            }
        }

        return array(
            'code' => 0,
            'message' => Yii::t('FrontEnd', 'No file'),
        );
    }

    public static function uploadImageFromArray($uploadedFiles, $fileIndex, $targetFile)
    {
        $error = "";
        if(!$uploadedFiles) $error = Yii::t('BackEnd', 'No input file');;

        $limitFileSize = Yii::app()->params['maxUploadFileSize'];
        $supportMineTypes = Yii::app()->params['supportMineTypes'];
        // validate image
        if($uploadedFiles)
        {
            if($uploadedFiles['size'][$fileIndex]['file'] > $limitFileSize)
            {
                $error = Yii::t('BackEnd', 'File too big').'('.$uploadedFiles['size'][$fileIndex]['file'].')';
            }
            if ($uploadedFiles['error'][$fileIndex]['file'] != UPLOAD_ERR_OK)
            {
                $error = Yii::t('BackEnd', 'Error on uploading');
            }

            if(!in_array($uploadedFiles['type'][$fileIndex]['file'], $supportMineTypes))
            {
                $error = Yii::t('BackEnd', 'Not supported file type');
            }
        }

        // save image
        if($error != "")
        {
            return array(
                'code' => 0,
                'message' => $error,
            );
        }
        else
        {
            $sourceFile = $uploadedFiles["tmp_name"][$fileIndex]['file'];
            //echo $fileIndex."|".$sourceFile."|".$targetFile;die();
            move_uploaded_file($sourceFile, $targetFile);
            return array(
                'code' => 1,
                'message' => Yii::t('BackEnd', 'Upload successfully.'),
            );
        }
    }

    /**
     * Resize a image function
     */
    public static function resize($image_in, $image_out, $options=array(), $crop=1)
    {
        //Check if GD extension is loaded
        if (!extension_loaded('gd') && !extension_loaded('gd2')){
              trigger_error(Yii::t('BackEnd', "GD is not loaded."), E_USER_WARNING);
              return false;
        }
        if(file_exists($image_in))
        {
            $imgInfo = getimagesize($image_in);
            switch ($imgInfo[2]) {
                case 1: $im = imagecreatefromgif($image_in); break;
                case 2: $im = imagecreatefromjpeg($image_in);break;
                case 3: $im = imagecreatefrompng($image_in); break;
                default: trigger_error(Yii::t('BackEnd', 'Unsupported filetype!'), E_USER_WARNING);  break;
            }
            $width = $imgInfo[0];
            $height = $imgInfo[1];
            $max_width = $options['width'];
            $max_height = $options['height'];
            if((!$max_width && !$max_height) || ($options['width'] > $width && $options['height'] > $height)){
                $max_width = $width;
                $max_height = $height;
            }else{
                if(!$max_width) $max_width = 1000;
                if(!$max_height) $max_height = 1000;
            }
            $x_ratio = $max_width / $width;
            $y_ratio = $max_height / $height;
            $dst = new stdClass();
            $src = new stdClass();
            $src->y = $src->x = 0;
            $dst->y = $dst->x = 0;
            if ($crop) {
                $dst->w = $max_width;
                $dst->h = $max_height;
                if (($width <= $max_width) && ($height <= $max_height) ) {
                    $src->w = $max_width;
                    $src->h = $max_height;
                }else{
                    if ($x_ratio < $y_ratio) {
                        $src->w = ceil($max_width/$y_ratio);
                        $src->h = $height;
                    } else {
                        $src->w = $width;
                        $src->h = ceil($max_height/$x_ratio);
                    }
                }
                $src->x = floor(($width-$src->w)/2);
                $src->y = floor(($height-$src->h)/2);
            } else {
                $src->w = $width;
                $src->h = $height;
                if (($width <= $max_width) && ($height <= $max_height) ) {
                    $dst->w = $width;
                    $dst->h = $height;
                } else if (($x_ratio * $height) < $max_height) {
                    $dst->h = ceil($x_ratio * $height);
                    $dst->w = $max_width;
                } else {
                    $dst->w = ceil($y_ratio * $width);
                    $dst->h = $max_height;
                }
            }

             $newImg = imagecreatetruecolor($dst->w, $dst->h);
//             $background = imagecolorallocate($newImg, 255, 255, 255);
//             imagefilledrectangle($newImg, 0, 0, $dst->w - 1, $dst->h - 1, $background);
//             $transparent = imagecolorallocatealpha($newImg, 255, 255, 255, 75);
             
             /* Check if this image is PNG or GIF, then set if Transparent*/
             if(($imgInfo[2] == 1) OR ($imgInfo[2]==3)){
                imagealphablending($newImg, false);
                imagesavealpha($newImg,true);
                $transparent = imagecolorallocatealpha($newImg, 255, 255, 255, 127);
                imagefilledrectangle($newImg, 0, 0, $dst->w, $dst->h, $transparent);
             }
             imagecopyresampled($newImg, $im, $dst->x, $dst->y, $src->x, $src->y, $dst->w, $dst->h, $src->w, $src->h);

             //Generate the file, and rename it to $newfilename
             switch ($imgInfo[2]) {
                case 1:
                {
                    imagegif($newImg,$image_out);
                    break;
                }
                case 2:
                {
                    imagejpeg($newImg,$image_out, 90);
                    break;
                }
                case 3:
                {
                    imagepng($newImg,$image_out);
                    break;
                }
                default: return '';  break;
             }
             imagedestroy($newImg);
        }
    }

    /**
     * get all product category and dump it into an array
     * @return Array Of Category
     * Each item is an instance of category onject, include fields as follow:
     *  - id: id of category
     *  - name: name of category
     *  - children: array of children category, each item is an instance of category object (include id and name field)
     */
    public static function dumpAllCategoryToArray($parentId = 0, $maxLevel = 0) {
        $tree = array();
        $criteria = new CDbCriteria();
        $criteria->alias = 'c';
        $criteria->select = "c.id, c.sorder, cd.name, cd.url_key";
        $criteria->condition = "cd.language = '".Yii::app()->language."' AND c.parent_id ={$parentId}";
        $criteria->join = "INNER JOIN category_description cd ON cd.category_id = c.id";
        $criteria->order = "c.sorder, c.id";
        $categories = Category::model()->findAll($criteria);
        
        foreach($categories as $category)
        {
            self::dumpCategoryChildren($category, 1, $maxLevel);
            array_push($tree, $category);
        }
        return $tree;
    }

    public static function dumpCategoryChildren(&$parent, $level=1, $maxLevel=0) {
        $criteria = new CDbCriteria();
        $criteria->alias = 'c';
        $criteria->select = "c.id, c.sorder, cd.name, cd.url_key";
        $criteria->condition = "cd.language = '".Yii::app()->language."' AND c.parent_id ={$parent->id}";
        $criteria->join = "INNER JOIN category_description cd ON cd.category_id = c.id";
        $criteria->order = "c.sorder, c.id";

        if(!$maxLevel || ($maxLevel && $level<$maxLevel))
        {
            $children = Category::model()->findAll($criteria);
            if($children)
            {
                $parent->children = array();
                foreach($children as $child)
                {
                    self::dumpCategoryChildren($child, $level+1, $maxLevel);
                    array_push($parent->children, $child);
                }
            }
        }
    }

    public static function dumpAllArticleCategoryToArray($parentId = 0, $maxLevel = 0, $status='') {
        $tree   = array();
        $criteria = new CDbCriteria();
        $criteria->select = "id, name, url_key, sorder";
        $criteria->condition = "parent_id = $parentId";
        $criteria->addCondition("status !=".ArticleCategory::STATUS_DELETE);
        if(!empty($status))
            $criteria->addCondition("status =".$status);
        $criteria->order = "sorder, id";
        $categories = ArticleCategory::model()->findAll($criteria);
        foreach($categories as $category)
        {
            self::dumpArticleCategoryChildren($category, 1, $maxLevel);
            array_push($tree, $category);
        }

        return $tree;
    }

    public static function dumpArticleCategoryChildren(&$parent, $level=1, $maxLevel=0, $status='') {
        $criteria = new CDbCriteria();
        $criteria->select = "id, name, url_key";
        $criteria->condition = "parent_id=".$parent->id;
        if(!empty($status))
            $criteria->addCondition("status =".$status);
        $criteria->order = "sorder, id";

        if(!$maxLevel || ($maxLevel && $level<$maxLevel))
        {
            $children = ArticleCategory::model()->findAll($criteria);
            if($children)
            {
                $parent->children = array();
                foreach($children as $child)
                {
                    self::dumpArticleCategoryChildren($child, $level+1, $maxLevel, $status);
                    array_push($parent->children, $child);
                }
            }
        }
    }

     /**
     *
     * Convert server request uri to search string
     * @param string $uri
     * @return string
     */
    public static function uriToString($uri)
    {
        $string = $uri;

        $string = preg_replace(array("`[^\p{L}]`u", "`[\ ]+`"), " ", $string);

        $arr = explode(" ", trim($string));

        $string = implode(" ", array_unique($arr));

//        $string = urlencode($string);

//        $string = htmlentities($string);

        return $string;
    }

    // cut str
    public function limitStr($str, $limit, $end_char = '&#8230;')
    {
        if (trim($str) == '')
        {
            return $str;
        }
        $str = strip_tags($str);
        preg_match('/^\s*+(?:\S++\s*+){1,'.(int) $limit.'}/', $str, $matches);
        if (strlen($str) == strlen($matches[0]))
        {
            $end_char = '';
        }
        return rtrim($matches[0]).$end_char;
    }

    public static function substrwords($text,$maxchar,$end='...'){
        if(strlen($text)>$maxchar){
            $words=explode(" ",$text);
            $output = '';
            $i=0;
            while(1){
                $length = (strlen($output)+strlen($words[$i]));
                if($length>$maxchar){
                    break;
                }else{
                    $output = $output." ".$words[$i];
                    ++$i;
                };
            };
        }else{
            $output = $text;
        }
        return $output.$end;
    }

    /**
      * Truncates text.
      *
      * Cuts a string to the length of $length and replaces the last characters
      * with the ending if the text is longer than length.
      *
      * @param string  $text String to truncate.
      * @param integer $length Length of returned string, including ellipsis.
      * @param string  $ending Ending to be appended to the trimmed string.
      * @param boolean $exact If false, $text will not be cut mid-word
      * @param boolean $considerHtml If true, HTML tags would be handled correctly
      * @return string Trimmed string.
      */
      public static function truncate($text, $length = 100, $ending = '...', $exact = true, $considerHtml = true) {
          if ($considerHtml) {
              // if the plain text is shorter than the maximum length, return the whole text
              if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
                  return $text;
              }
              // splits all html-tags to scanable lines
              preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);
              $total_length = strlen($ending);
              $open_tags = array();
              $truncate = '';
                foreach ($lines as $line_matchings) {
                  // if there is any html-tag in this line, handle it and add it (uncounted) to the output
                  if (!empty($line_matchings[1])) {
                      // if it's an "empty element" with or without xhtml-conform closing slash (f.e. <br/>)
                      if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
                          // do nothing
                      // if tag is a closing tag (f.e. </b>)
                      } else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
                          // delete tag from $open_tags list
                          $pos = array_search($tag_matchings[1], $open_tags);
                          if ($pos !== false) {
                              unset($open_tags[$pos]);
                          }
                      // if tag is an opening tag (f.e. <b>)
                      } else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
                          // add tag to the beginning of $open_tags list
                          array_unshift($open_tags, strtolower($tag_matchings[1]));
                      }
                      // add html-tag to $truncate'd text
                      $truncate .= $line_matchings[1];
                  }

                  // calculate the length of the plain text part of the line; handle entities as one character
                  $content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
                  if ($total_length+$content_length> $length) {
                      // the number of characters which are left
                      $left = $length - $total_length;
                      $entities_length = 0;
                      // search for html entities
                      if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
                          // calculate the real length of all entities in the legal range
                          foreach ($entities[0] as $entity) {
                              if ($entity[1]+1-$entities_length <= $left) {
                                  $left--;
                                  $entities_length += strlen($entity[0]);
                              } else {
                                  // no more characters left
                                  break;
                              }
                          }
                      }
                      $truncate .= substr($line_matchings[2], 0, $left+$entities_length);
                      // maximum lenght is reached, so get off the loop
                      break;
                  } else {
                      $truncate .= $line_matchings[2];
                      $total_length += $content_length;
                  }
                  // if the maximum length is reached, get off the loop
                  if($total_length>= $length) {
                      break;
                  }
              }
          } else {
              if (strlen($text) <= $length) {
                  return $text;
              } else {
                  $truncate = substr($text, 0, $length - strlen($ending));
              }
          }

          // if the words shouldn't be cut in the middle...
          if (!$exact) {
              // ...search the last occurance of a space...
              $spacepos = strrpos($truncate, ' ');
              if (isset($spacepos)) {
                  // ...and cut the text in this position
                  $truncate = substr($truncate, 0, $spacepos);
              }
          }
          // add the defined ending to the text
          $truncate .= $ending;
          if($considerHtml) {
              // close all unclosed html-tags
              foreach ($open_tags as $tag) {
                  $truncate .= '</' . $tag . '>';
              }
          }
          return $truncate;
    }

    public static function rebuildImageNameForLinux($imageName)
    {
        $pos = strrpos($imageName,'.');
        if($pos)
        {
            $name = substr($imageName, 0, strrpos($imageName,'.'));
            $ext = substr($imageName, strrpos($imageName,'.')+1);
            return self::makeFriendlyUrl($name).'.'.self::makeFriendlyUrl($ext);
        }
        else
        {
            return self::makeFriendlyUrl($imageName);
        }
    }

    public static function sendEmail($emailTemplateCode, $params = array())
    {
        Yii::import('application.components.phpMailer.*');
        if(!empty($emailTemplateCode))
        {
            // Get email template
            $emailTemp = EmailTemplate::model()->find("code = '{$emailTemplateCode}' AND status=".EmailTemplate::STATUS_ENABLED);
        }
        if($emailTemp->id > 0)
        {
            $to = array();
            $to[] = $params['to_email'];
            $now = date('dmY-Hms');
            $subject = $emailTemp->subject." - ".$now;
            $from = $emailTemp->from;
            $message = $emailTemp->body;
            if($params && is_array($params))
            {
                foreach($params as $key=>$value){
                    $message = str_replace("{{$key}}", $value, $message);
                }
            }
            $mail = new PHPMailer();
            $mail->Mailer = "smtp";
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465;
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPAuth = true; // turn on SMTP authentication
            $mail->Username = (Yii::app()->params['gmailInfo']["username"])? Yii::app()->params['gmailInfo']["username"] :"thebestretail@gmail.com"; // SMTP username
            $mail->Password = (Yii::app()->params['gmailInfo']["password"])? Yii::app()->params['gmailInfo']["password"] :"thebestretail@123"; // SMTP passwor
            $mail->CharSet = "utf-8";
            //$from_name = substr($from, 0, strpos($from, '@'));
            $from_name = Yii::app()->name;
            $mail->SetFrom($from, $from_name);
            $mail->set('Sender', $from);
            $mail->Subject = $subject;
            $mail->MsgHTML($message);
            $mail->SetWordWrap();

            if(count($to) == 0 && isset($params['email'])) $to[] = $params['email'];
            foreach($to as $address)
            {
                $headers  = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
                if(strpos($address, '<') > 0 && strpos($address, '>') > 0)
                {
                    // For email format: abc<abc@abc.com>
                    $headers .= "To: $address\r\n";
                    $current_name = substr($address, 0, strpos($address, '<')-1);
                    $current_address = substr($address, (strpos($address, '<')+1), ((strpos($address, '>') - strpos($address, '<'))-1));
                    $mail->AddAddress($current_address, $current_name);
                    #echo $current_name."<-->".$current_address;die();
                }
                else // For email format: abc@abc.com
                {
                    $current_name = $address;
                    //$current_name = substr($address, 0, (strpos($address, '@')-1));
                    $headers .= "To: $current_name<$address>\r\n";
                    $mail->AddAddress($address, $current_name);
                }
                $headers .= "From: {$from_name}<{$from}>\r\n";
                if(!$mail->Send())
                {
                    $msg = 'Send mail error ('.date('d-m-Y H:i:s').') - header: '.$headers.'<br/>'.$subject.'<br/>'.$message.'<br/><hr/>';
                    Yii::log($msg, 'error');
                } else {
                    $msg = 'Send mail success ('.date('d-m-Y H:i:s').') - header: '.$headers.'<br/>'.$subject.'<br/>'.$message.'<br/><hr/>';
                    Yii::log($msg, 'error');
                }
            }
        }

    }

    public static function getDateText($date, $now)
    {
        self::$dateText = array();
        
        $dateText = '';
        $time = $now - $date;
        $year = floor($time/(60*60*24*30*12));
        if($year > 0)
        {
            self::$dateText['year'] = $year;
            $time = $time%(60*60*24*30*12);
        }
        $month = floor($time/(60*60*24*30));
        if($month > 0)
        {
            self::$dateText['month'] = $month;
            $time = $time%(60*60*24*30);
        }
        $day = floor($time/(60*60*24));
        if($day > 0)
        {
            self::$dateText['day'] = $day;
            $time = $time%(60*60*24);
        }
        $hour = floor($time/(60*60));
        if($hour > 0)
        {
            self::$dateText['hour'] = $hour;
            $time = $time%(60*60);
        }
        $minute = floor($time/60);
        self::$dateText['minute'] = 1;
        if($minute > 1)
        {
            self::$dateText['minute'] = $minute;
        }
        
        if(self::$dateText['year'])
        {
            if(self::$dateText['year'] > 1)
                $year = Yii::t('FrontEnd', 'years');
            else
                $year = Yii::t('FrontEnd', 'year');
            $dataText .= self::$dateText['year'] . ' ' .$year;

            if(self::$dateText['month'])
            {
                if(self::$dateText['month'] > 1)
                    $month = Yii::t('FrontEnd', 'months');
                else
                    $month = Yii::t('FrontEnd', 'month');
                $dataText .= ', ' .self::$dateText['month'] . ' ' .$month;
            }
        }
        elseif(self::$dateText['month'])
        {
            if(self::$dateText['month'] > 1)
                $month = Yii::t('FrontEnd', 'months');
            else
                $month = Yii::t('FrontEnd', 'month');
            $dataText .= self::$dateText['month'] . ' ' .$month;
            if(self::$dateText['day'])
            {
                if(self::$dateText['day'] > 1)
                    $month = Yii::t('FrontEnd', 'days');
                else
                    $month = Yii::t('FrontEnd', 'day');
                $dataText .= ', ' .self::$dateText['day'] . ' ' .$month;
            }
        }
        elseif(self::$dateText['day'])
        {
            if(self::$dateText['day'] > 1)
                $month = Yii::t('FrontEnd', 'days');
            else
                $month = Yii::t('FrontEnd', 'day');
            $dataText .= self::$dateText['day'] . ' ' .$month;
            if(self::$dateText['hour'])
            {
                if(self::$dateText['hour'] > 1)
                    $month = Yii::t('FrontEnd', 'hours');
                else
                    $month = Yii::t('FrontEnd', 'hour');
                $dataText .= ', ' .self::$dateText['hour'] . ' ' .$month;
            }
        }
        elseif(self::$dateText['hour'])
        {
            if(self::$dateText['hour'] > 1)
                $month = Yii::t('FrontEnd', 'hours');
            else
                $month = Yii::t('FrontEnd', 'hour');
            $dataText .= self::$dateText['hour'] . ' ' .$month;
            if(self::$dateText['minute'])
            {
                if(self::$dateText['minute'] > 1)
                    $month = Yii::t('FrontEnd', 'minutes');
                else
                    $month = Yii::t('FrontEnd', 'minute');
                $dataText .= ', ' .self::$dateText['minute'] . ' ' .$month;
            }
        }
        elseif(self::$dateText['minute'])
        {
            if(self::$dateText['minute'] > 1)
                $month = Yii::t('FrontEnd', 'minutes');
            else
                $month = Yii::t('FrontEnd', 'minute');
            $dataText .= self::$dateText['minute'] . ' ' .$month;
        }
        $dataText .= Yii::t('FrontEnd', ' ago.');
        return $dataText;
    }

    public static function getFilesByType($path, $type = false, $appendPath = false, $includeExtension = true)
    {
        if (is_dir($path)) {
            $dir = scandir($path); //open directory and get contents
            if (is_array($dir)) { //it found files
                $returnFiles = false;
                foreach ($dir as $file) {
                    if (!is_dir($path . '/' . $file)) {
                        if ($type) { //validate the type
                            $fileParts = explode('.', $file);
                            if (is_array($fileParts)) {
                                $fileType = array_pop($fileParts);
                                $file = implode('.', $fileParts);

                                //check whether the filetypes were passed as an array or string
                                if (is_array($type)) {
                                    if (in_array($fileType, $type)) {
                                        $filePath =  $appendPath . $file;
                                        if ($includeExtension == true) {
                                            $filePath .= '.' . $fileType;
                                        }
                                        $returnFiles[] = $filePath;
                                    }
                                } else {
                                    if ($fileType == $type) {
                                        $filePath =  $appendPath . $file;
                                        if ($includeExtension == true) {
                                            $filePath .= '.' . $fileType;
                                        }
                                        $returnFiles[] = $filePath;
                                    }
                                }
                            }
                        } else { //the type was not set.  return all files and directories
                            $returnFiles[] = $file;
                        }
                    }
                }

                if ($returnFiles) {
                    return $returnFiles;
                }
            }
        }
    }

    public static function dumpAllLayoutToArray($path="", $label="", $blackList = array())
    {
        if(!$path) $path = _APP_PATH_.'/protected/views/front/layouts/';
        $array = array();
        if(!empty($label))
        {
            $array[] = $label;
        }
        if(!empty($path))
        {
            $files = Common::getFilesByType($path, false, false, false);
            if(is_array($files))
            {
                foreach($files as $fileName)
                {
                    $fileName = substr($fileName, 0, strpos($fileName, '.php'));
                    if(!in_array($fileName, $blackList))
                    {
                        $array[$fileName] = Yii::t('FrontEnd', $fileName);
                    }
                    $array['allLayout'] = Yii::t('FrontEnd', 'allLayout');
                }
            }
        }
        return $array;
    }
    public static function targetToArray($label = '')
    {
        $array = array();
        if($label) $array[''] = $label;
        $array[self::TARGET_SELF] = Yii::t('BackEnd', 'Self');
        $array[self::TARGET_BLANK] = Yii::t('BackEnd', 'Blank');
        return $array;
    }
    public static function getTargetName($target){
        $array = self::targetToArray();
        return $array[$target];
    }

    public function dumpAllHtmlTagToArray($label = '')
    {
        $array = array();
        if($label) $array[''] = $label;
        $array['textField'] = Yii::t('BackEnd', 'Text field');
        $array['dateField'] = Yii::t('BackEnd', 'Date field');
        $array['textArea'] = Yii::t('BackEnd', 'Text area');
        $array['radioList'] = Yii::t('BackEnd', 'Radio list');
        $array['dropDownList'] = Yii::t('BackEnd', 'Drop down list');
        return $array;
    }
    public static function getHtmlTagName($tag)
    {
        $array = self::dumpAllHtmlTagToArray();
        return $array[$tag];
    }
    //Using for common gii and icon of index,admin,list,view,update,create
    public static function icon($type)
    {
        $icon = array(
            'manager' =>'<img src="'.Yii::app()->request->baseUrl.'/css/admin/images/icons/18_12x12.png" class="icon" />&nbsp;'.Yii::t('BackEnd', 'Manage'),
            'create'  =>'<img src="'.Yii::app()->request->baseUrl.'/css/admin/images/icons/create_12x12.png" class="icon" />&nbsp;'.Yii::t('BackEnd', 'Create'),
            'delete'  =>'<img src="'.Yii::app()->request->baseUrl.'/css/admin/images/icons/delete_12x12.png" class="icon" />&nbsp;'.Yii::t('BackEnd', 'Delete'),
            'list'    =>'<img src="'.Yii::app()->request->baseUrl.'/css/admin/images/icons/12_12x12.png" class="icon" />&nbsp;'.Yii::t('BackEnd', 'List'),
            'title'   =>'<img src="'.Yii::app()->request->baseUrl.'/css/admin/images/icons/1_16x16.png" class="icon" />&nbsp;',
            'update'  =>'<img src="'.Yii::app()->request->baseUrl.'/css/admin/images/icons/edit_12x12.png" class="icon" />&nbsp;'.Yii::t('BackEnd', 'Update'),
            'save'    =>'<img src="'.Yii::app()->request->baseUrl.'/css/admin/images/icons/20_12x12.png" class="icon" />&nbsp;'.Yii::t('BackEnd', 'Save'),
            'reset'   =>'<img src="'.Yii::app()->request->baseUrl.'/css/admin/images/icons/reset_12x12.png" class="icon" />&nbsp;'.Yii::t('BackEnd', 'Reset'),
        );
        return $icon[$type];
    }
    public static  function clearData($data, $striptag = false )
    {
        $p = new CHtmlPurifier();
        if($striptag)
        {
            $data = strip_tags($data);
        }
        $data = $p->purify($data);
        return $data;
    }

    /**
     *
     * @param int $memberId
     * @return string $avatarUrl
     */
    public static function getMemberAvatar($memberId){
        $avatarUrl = Yii::app()->request->baseUrl.'/css/front/v1/images/no-avatar.png';
        if($memberId >0){
            if(Yii::app()->user->id == $memberId)
            {
                $avatarUrl = Yii::app()->user->getState('avatar');
            }
            else
            {
                //Get via api on passport
                if(extension_loaded('soap'))
                {
                    $client = new SoapClient("http://api.passport/api/soap");
                    $result = $client->getMemberAvatar($memberId);
                    if($result['found'] == 1)
                        $avatarUrl = $result['avatar'];
                }
            }
        }
        return $avatarUrl;
    }

    /**
     *
     * @param int $memberId
     * @return string $memberName
     */
    public static function getMemberName($memberId){
        $memberName = Yii::t('FrontEnd','Guest');
        if($memberId >0){
            if(Yii::app()->user->id == $memberId)
            {
                $memberName = Yii::app()->user->getState('name');
            }
            else
            {
                //Get via api on passport
                if(extension_loaded('soap'))
                {
                    $client = new SoapClient("http://api.passport/api/soap");
                    $result = $client->getMemberName($memberId);
                    if($result['found'] == 1)
                        $memberName = $result['name'];
                }
            }
        }
        return $memberName;
    }
    
    public function getMemberUrl($memberId){
        return 'javascript:void(0);';
    }
    public static function ranDomMaxim($values = array()){
        $rand_keys = array_rand($values, 2);
        return $values[$rand_keys[0]];
    }
}
?>