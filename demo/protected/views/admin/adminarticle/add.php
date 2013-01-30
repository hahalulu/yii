<div class="content-box">
<div class="content-box-header">

    <h3 style="cursor: s-resize;">Content box</h3>

    <ul class="content-box-tabs">
        <li><a href="#tab1" class="default-tab current">Table</a></li>
        <!-- href must be unique and match the id of target div -->
        <li><a href="#tab2">Forms</a></li>
    </ul>

    <div class="clear"></div>

</div>

<div class="content-box-content">

<div class="tab-content default-tab" id="tab1" style="display: block;">
    <!-- This is the target div. id must match the href of this div's tab -->

    <div class="notification attention png_bg">
        <a href="#" class="close"><img
                src="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/images/icons/cross_grey_small.png"
                title="Close this notification" alt="close"></a>

        <div>
            This is a Content Box. You can put whatever you want in it. By the way, you can close this notification with
            the top-right cross.
        </div>
    </div>

    <table>

        <thead>
        <tr>
            <th><input class="check-all" type="checkbox"></th>
            <th>Column 1</th>
            <th>Column 2</th>
            <th>Column 3</th>
            <th>Column 4</th>
            <th>Column 5</th>
        </tr>

        </thead>

        <tfoot>
        <tr>
            <td colspan="6">
                <div class="bulk-actions align-left">
                    <select name="dropdown">
                        <option value="option1">Choose an action...</option>
                        <option value="option2">Edit</option>
                        <option value="option3">Delete</option>
                    </select>
                    <a class="button" href="#">Apply to selected</a>
                </div>

                <div class="pagination">
                    <a href="#" title="First Page"> << First</a><a href="#" title="Previous Page">< Previous</a>
                    <a href="#" class="number" title="1">1</a>
                    <a href="#" class="number" title="2">2</a>
                    <a href="#" class="number current" title="3">3</a>
                    <a href="#" class="number" title="4">4</a>
                    <a href="#" title="Next Page">Next > </a><a href="#" title="Last Page">Last >> </a>
                </div>
                <!-- End .pagination -->
                <div class="clear"></div>
            </td>
        </tr>
        </tfoot>

        <tbody>
        <tr class="alt-row">
            <td><input type="checkbox"></td>
            <td>Lorem ipsum dolor</td>
            <td><a href="#" title="title">Sit amet</a></td>
            <td>Consectetur adipiscing</td>
            <td>Donec tortor diam</td>
            <td>
                <!-- Icons -->
                <a href="#" title="Edit"><img
                        src="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/images/icons/pencil.png" alt="Edit"></a>
                <a href="#" title="Delete"><img
                        src="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/images/icons/cross.png" alt="Delete"></a>
                <a href="#" title="Edit Meta"><img
                        src="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/images/icons/hammer_screwdriver.png"
                        alt="Edit Meta"></a>
            </td>
        </tr>

        <tr>
            <td><input type="checkbox"></td>
            <td>Lorem ipsum dolor</td>
            <td><a href="#" title="title">Sit amet</a></td>
            <td>Consectetur adipiscing</td>
            <td>Donec tortor diam</td>
            <td>
                <!-- Icons -->
                <a href="#" title="Edit"><img
                        src="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/images/icons/pencil.png" alt="Edit"></a>
                <a href="#" title="Delete"><img
                        src="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/images/icons/cross.png" alt="Delete"></a>
                <a href="#" title="Edit Meta"><img
                        src="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/images/icons/hammer_screwdriver.png"
                        alt="Edit Meta"></a>
            </td>
        </tr>

        <tr class="alt-row">
            <td><input type="checkbox"></td>
            <td>Lorem ipsum dolor</td>
            <td><a href="#" title="title">Sit amet</a></td>
            <td>Consectetur adipiscing</td>
            <td>Donec tortor diam</td>
            <td>
                <!-- Icons -->
                <a href="#" title="Edit"><img
                        src="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/images/icons/pencil.png" alt="Edit"></a>
                <a href="#" title="Delete"><img
                        src="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/images/icons/cross.png" alt="Delete"></a>
                <a href="#" title="Edit Meta"><img
                        src="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/images/icons/hammer_screwdriver.png"
                        alt="Edit Meta"></a>
            </td>
        </tr>

        <tr>
            <td><input type="checkbox"></td>
            <td>Lorem ipsum dolor</td>
            <td><a href="#" title="title">Sit amet</a></td>
            <td>Consectetur adipiscing</td>
            <td>Donec tortor diam</td>
            <td>
                <!-- Icons -->
                <a href="#" title="Edit"><img
                        src="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/images/icons/pencil.png" alt="Edit"></a>
                <a href="#" title="Delete"><img
                        src="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/images/icons/cross.png" alt="Delete"></a>
                <a href="#" title="Edit Meta"><img
                        src="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/images/icons/hammer_screwdriver.png"
                        alt="Edit Meta"></a>
            </td>
        </tr>

        <tr class="alt-row">
            <td><input type="checkbox"></td>
            <td>Lorem ipsum dolor</td>
            <td><a href="#" title="title">Sit amet</a></td>
            <td>Consectetur adipiscing</td>
            <td>Donec tortor diam</td>
            <td>
                <!-- Icons -->
                <a href="#" title="Edit"><img
                        src="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/images/icons/pencil.png" alt="Edit"></a>
                <a href="#" title="Delete"><img
                        src="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/images/icons/cross.png" alt="Delete"></a>
                <a href="#" title="Edit Meta"><img
                        src="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/images/icons/hammer_screwdriver.png"
                        alt="Edit Meta"></a>
            </td>
        </tr>

        <tr>
            <td><input type="checkbox"></td>
            <td>Lorem ipsum dolor</td>
            <td><a href="#" title="title">Sit amet</a></td>
            <td>Consectetur adipiscing</td>
            <td>Donec tortor diam</td>
            <td>
                <!-- Icons -->
                <a href="#" title="Edit"><img
                        src="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/images/icons/pencil.png" alt="Edit"></a>
                <a href="#" title="Delete"><img
                        src="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/images/icons/cross.png" alt="Delete"></a>
                <a href="#" title="Edit Meta"><img
                        src="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/images/icons/hammer_screwdriver.png"
                        alt="Edit Meta"></a>
            </td>
        </tr>

        <tr class="alt-row">
            <td><input type="checkbox"></td>
            <td>Lorem ipsum dolor</td>
            <td><a href="#" title="title">Sit amet</a></td>
            <td>Consectetur adipiscing</td>
            <td>Donec tortor diam</td>
            <td>
                <!-- Icons -->
                <a href="#" title="Edit"><img
                        src="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/images/icons/pencil.png" alt="Edit"></a>
                <a href="#" title="Delete"><img
                        src="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/images/icons/cross.png" alt="Delete"></a>
                <a href="#" title="Edit Meta"><img
                        src="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/images/icons/hammer_screwdriver.png"
                        alt="Edit Meta"></a>
            </td>
        </tr>

        <tr>
            <td><input type="checkbox"></td>
            <td>Lorem ipsum dolor</td>
            <td><a href="#" title="title">Sit amet</a></td>
            <td>Consectetur adipiscing</td>
            <td>Donec tortor diam</td>
            <td>
                <!-- Icons -->
                <a href="#" title="Edit"><img
                        src="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/images/icons/pencil.png" alt="Edit"></a>
                <a href="#" title="Delete"><img
                        src="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/images/icons/cross.png" alt="Delete"></a>
                <a href="#" title="Edit Meta"><img
                        src="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/images/icons/hammer_screwdriver.png"
                        alt="Edit Meta"></a>
            </td>
        </tr>
        </tbody>

    </table>

</div>
<!-- End #tab1 -->

<div class="tab-content" id="tab2" style="display: none;">

    <form action="" method="post">

        <fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->

            <p>
                <label>Small form input</label>
                <input class="text-input small-input" type="text" id="small-input" name="small-input"> <span
                    class="input-notification success png_bg">Successful message</span>
                <!-- Classes for input-notification: success, error, information, attention -->
                <br>
                <small>A small description of the field</small>
            </p>

            <p>
                <label>Medium form input</label>
                <input class="text-input medium-input" type="text" id="medium-input" name="medium-input"> <span
                    class="input-notification error png_bg">Error message</span>
            </p>

            <p>
                <label>Large form input</label>
                <input class="text-input large-input" type="text" id="large-input" name="large-input">
            </p>

            <p>
                <label>Checkboxes</label>
                <input type="checkbox" name="checkbox1"> This is a checkbox <input type="checkbox" name="checkbox2"> And
                this is another checkbox
            </p>

            <p>
                <label>Radio buttons</label>
                <input type="radio" name="radio1"> This is a radio button<br>
                <input type="radio" name="radio2"> This is another radio button
            </p>

            <p>
                <label>This is a drop down list</label>
                <select name="dropdown" class="small-input">
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                    <option value="option4">Option 4</option>
                </select>
            </p>

            <p>
                <label>Textarea with WYSIWYG</label>

            <div style="width: 653px;" class="wysiwyg">
                <ul class="panel">
                    <li><a class="bold"><!-- --></a></li>
                    <li><a class="italic"><!-- --></a></li>
                    <li class="separator"></li>
                    <li><a class="createLink"><!-- --></a></li>
                    <li><a class="insertImage"><!-- --></a></li>
                    <li class="separator"></li>
                    <li><a class="h1"><!-- --></a></li>
                    <li><a class="h2"><!-- --></a></li>
                    <li><a class="h3"><!-- --></a></li>
                    <li class="separator"></li>
                    <li><a class="increaseFontSize"><!-- --></a></li>
                    <li><a class="decreaseFontSize"><!-- --></a></li>
                    <li class="separator"></li>
                    <li><a class="removeFormat"><!-- --></a></li>
                </ul>
                <div style="clear: both;"><!-- --></div>
                <iframe style="min-height: 250px; width: 645px;" id="textareaIFrame"></iframe>
            </div>
            <textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"
                      style="display: none;"></textarea>
            </p>

            <p>
                <input class="button" type="submit" value="Submit">
            </p>

        </fieldset>

        <div class="clear"></div>
        <!-- End .clear -->

    </form>

</div>
<!-- End #tab2 -->

</div>
</div>