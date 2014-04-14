<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('webflow.css');
		echo $this->Html->css('hapide.css');

		echo $this->Html->script('jquery-1.11.0.min.js');
		echo $this->Html->script('modernizr.js');
		echo $this->Html->script('hapide.js');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<header class="navbar">
				<div class="w-container">
					<div class="w-row">
						<div class="w-col w-col-4">
							<?php echo $this->Html->image('logo-header.png',array('width' => '25', 'class' => 'logo', 'url' => array('controller' => 'index', 'action' => ''))); ?>
							<div class="app-name">
								<?php echo $this->Html->link('HAPIDE', '/'); ?>
							</div>
						</div>
						<div class="w-col w-col-8 nav-column">
							<a class="nav-link" href="#">Features</a>
							<?php echo $this->Html->link('SIGN UP', '/users/signup', array('class' => 'nav-link') ) ?>
							<?php echo $this->Html->link('LOGIN', '/main/login', array('class' => 'nav-link') ) ?>
						</div>
					</div>
				</div>
			</header>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<div class="section grey footer">
				<div class="w-container">
					<p class="footer-text">Slate Template by Webflow. Images by <a href="http://www.flickr.com/photos/kara_allyson/" class="text-link">Kata Allyson</a>.</p>
					<div class="button-block">
						<a class="w-inline-block social-button" href="mailto:support@webflow.com?subject=Hello!" target="_blank">
							<?php echo $this->Html->image('email-icon.png',array('width' => '21px')); ?>
						</a>
						<a class="w-inline-block social-button" href="http://facebook.com/webflowapp" target="_blank">
							<?php echo $this->Html->image('facebook-icon.png',array('width' => '21px')); ?>
						</a>
						<a class="w-inline-block social-button" href="http://twitter.com/webflowapp" target="_blank">
							<?php echo $this->Html->image('twitter-icon.png',array('width' => '21px')); ?>
						</a>
					</div>
					<?php echo $this->Html->image('footer-logo.png',array('width' => '25px', 'class' => 'logo-in-footer')); ?>
				</div>
			</div>
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
