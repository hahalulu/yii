<?php $this->beginContent('application.views.admin.layouts.main'); ?>
<ul class="shortcut-buttons-set">

    <li><a class="shortcut-button new-article" href="<?php echo Yii::app()->createUrl('/adminArticle/add', array()); ?>"><span class="png_bg">
					Write an Article
				</span></a></li>

    <li><a class="shortcut-button new-page" href="#"><span class="png_bg">
					Create a New Page
				</span></a></li>

    <li><a class="shortcut-button upload-image" href="#"><span class="png_bg">
					Upload an Image
				</span></a></li>

    <li><a class="shortcut-button add-event" href="#"><span class="png_bg">
					Add an Event
				</span></a></li>

    <li><a class="shortcut-button manage-comments" href="#messages" rel="modal"><span class="png_bg">
					Open Modal
				</span></a></li>

</ul>
<div class="clear"></div>

<div class="content-box">
    <!-- Start Content Box -->
    <?php echo $content; ?>
    <!-- End .content-box -->
</div>


<?php $this->endContent(); ?>