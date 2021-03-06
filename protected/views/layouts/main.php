<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar', array(
	'type'=>'inverse',
	'brand'=>sprintf("<span class='hidden-phone'>%s</span>&nbsp;", Yii::app()->name),
	'brandUrl'=>Yii::app()->homeUrl,
	'items'=>array(
		//array(
		//	'class'=>'bootstrap.widgets.TbMenu',
		//	'items'=>array(
		//		array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
		//	),
		//),
		array(
			'class'=>'bootstrap.widgets.TbMenu',
			'htmlOptions'=>array('class'=>'pull-right'),
			'items'=>array(
				array(
					'label'=>Yii::t('app', 'Login with Twitter'),
					'url'=>array('/site/twitterLogin'),
					'visible'=>Yii::app()->user->isGuest
				),
				array(
					'label'=>Yii::app()->user->name,
					'url' => '#',
					'items'=>array(
						array(
							'label'=>Yii::t('app', 'Personal Home'),
							'icon'=>'home',
							'url'=>array('/user/profile'),
						),
						array(
							'label'=>Yii::t('app', 'Logout'),
							'icon'=>'off',
							'url'=>array('/site/logout')
						),
						array(
							'label'=>Yii::t('app', 'Admin Tools'),
							'url'=>array('/admin'),
							'icon'=>'cog',
							'visible'=>Yii::app()->user->isAdmin,
						),
					),
					'visible'=>!Yii::app()->user->isGuest,
				),
//			),
//		),
//		array(
//			'class'=>'bootstrap.widgets.TbMenu',
//			'htmlOptions'=>array('class'=>'pull-left'),
//			'items'=>array(
				array(
					'label'=>'',
					'icon'=>'globe white',
					'items'=>array(
						array('label'=>'English', 'url'=>'#',
							'linkOptions'=>array(
								'submit'=>array('/site/language'), 'params'=>array(
									'language'=>'en',
									'returnUrl'=>Yii::app()->request->requestUri,
								),
							)
						),
						array('label'=>'Japanese', 'url'=>'#',
							'linkOptions'=>array(
								'submit'=>array('/site/language'), 'params'=>array(
									'language'=>'ja',
									'returnUrl'=>Yii::app()->request->requestUri,
								),
							)
						),
					),
				)
			),
		),
	),
));
?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
        )); ?><!-- breadcrumbs -->
	<?php endif; ?>

	<?php $this->widget('bootstrap.widgets.TbAlert', array(
		'block'=>true, // display a larger alert block?
		'fade'=>true, // use transitions?
		'closeText'=>'×', // close link text - if set to false, no close link is displayed
	)); ?>

	<?php echo $content; ?>

	<div class="clear"></div>

</div><!-- page -->

<div id="footer">
	<?php echo Yii::powered(); ?>
</div><!-- footer -->

</body>
</html>
