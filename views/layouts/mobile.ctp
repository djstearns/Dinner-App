<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<title><?php echo $title_for_layout; ?> &raquo; <?php echo Configure::read('Site.title'); ?></title>
	<style type="text/css">
		/* Local Styles Here */
		html, body {
			margin: 0;
			padding: 0;
			min-height: 100%;
			font: normal 14px/18px Helvetica, Sans-serif;
		}
		#content  {
			display: block;
			position: absolute;
			top: 45px;
			left: 0;
			right: 0;
			bottom: 45px;
			overflow-y: auto;
			background: #cbd2d8;
			background-image: 
				-webkit-gradient(linear, left top, right top, 
					from(#c5ccd4), 
					color-stop(0.75, #c5ccd4), 
					color-stop(0.75, transparent), 
					to(transparent)); 
			-webkit-background-size: 5px 100%;
			background-size: 5px 100%;
			-webkit-text-size-adjust: 100%;
		}
		#scroller {
			height: auto;
			overflow: visible;
			padding-bottom: 20px;
		}
		.navbar, .toolbar {
			position: relative;
			width: 100%;
			display: -webkit-box;
			-webkit-box-pack: justify;
			-webkit-box-align: center;
			-webkit-box-orient: horizontal;
			-webkit-box-sizing: border-box;
			height: 45px;
			padding: 0px 10px;
			background-image: 
				-webkit-gradient(linear, left top, left bottom, 
					from(#b2bbca), 
					color-stop(0.25, #a7b0c3),
					color-stop(0.5, #909cb3), 
					color-stop(0.5, #8593ac), 
					color-stop(0.75, #7c8ba5),
					to(#73839f)); 
			border-top: 1px solid #cdd5df;
			border-bottom: 1px solid #2d3642; 
		}
		.toolbar.placement-bottom {
			position: absolute;
			right: 0;
			bottom: 0;
			left: 0;
		}
		.navbar h1 {
			-webkit-box-flex: 1;
			text-align: center;
			margin: 0px;
			font: bold 20px/32px Helvetica, Sans-serif;
			letter-spacing: -1px;
			text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.5);
			color: #fff;
		}
		ul.table-view, ul.table-view > li {
			list-style: none;
			padding: 0;
			margin: 0;
		}
		ul.table-view > li {
			background-color: #fff;
			-webkit-user-select: none;
			-webkit-tap-highlight-color: transparent;
			cursor: pointer;
			padding: 8px;
			border-left:  1px solid #a8abad;
			border-right: 1px solid #a8abad;
			border-bottom: 1px solid #a8abad;
			-webkit-box-sizing: border-box;
			min-height: 44px;
			overflow: hidden;
			font-size: 20px;
			font-weight: bold;
		}
		ul.table-view > li:hover {
			background-image: 
				-moz-linear-gradient(top, 
					#4286f5, 
					#194fdb);
			background-image: 
				-webkit-gradient(linear, left top, left bottom, 
					from(#4286f5), 
					to(#194fdb));
			color: #fff;
		}
		ul.table-view > li:hover > span {
			color: #fff;
		}		
		ul.grouped {
			margin: 17px 9px;
		}
		ul.grouped > li:first-of-type {
			border-top: 1px solid #acacac;
			-webkit-border-top-right-radius: 10px;
			-webkit-border-top-left-radius: 10px;
		}
		ul.grouped > li:last-of-type {
			-webkit-border-bottom-left-radius: 10px;
			-webkit-border-bottom-right-radius: 10px;
		}
		.button {
			display: block;
			cursor: pointer;
			border: solid 1px #54617d;
			border-color: #484e59 #54617d #4c5c7a #54617d; 
			-webkit-box-shadow: 0 1px 1px #9aa5bb, 0 -1px 1px #8e96a5; 
			padding: 0px 10px;
			font-size: 12px;
			line-height: 28px;
			height: 30px;
			-webkit-box-sizing: border-box;
			-webkit-border-radius: 5px;
			background-image: 
				-webkit-gradient(linear, left top, left bottom, 
					from(#92a1bf), 
					color-stop(0.25, #798aad),
					color-stop(0.5, #6276a0), 
					color-stop(0.5, #556a97), 
					color-stop(0.75, #566c98),
					to(#546993)); 
			color: #fff;
			-webkit-tap-highlight-color: transparent;
			-webkit-user-select: none;
			margin: 0px 10px;
			position: relative;
		}
		.button:hover, .button.touched {
			background-image: 
				-webkit-gradient(linear, left top, left bottom, 
					from(#7d88a5), 
					color-stop(0.25, #58698c),
					color-stop(0.5, #3a4e78), 
					color-stop(0.5, #253c6a), 
					color-stop(0.75, #273f6d),
					to(#273f6d));
			-webkit-tap-highlight-color: transparent;
		}
	</style>
	<?php echo $this->Html->script(array('iscroll')); ?>
          
	<script type="text/javascript">
		/* Local JavaScript Here */
			var initScrolling = function() {
			var scroller = new iScroll('scroller', { bounceLock:true, desktopCompatibility: true});
			var buttons = document.getElementsByClassName("button");
			for (var i = 0, len = buttons.length; i < len; i++) {
				buttons[i].addEventListener("touchstart", function() {
					this.className = "button touched";
				});
				buttons[i].addEventListener("touchend", function() {
					this.className = "button";
				});
			}
		};
		document.addEventListener('DOMContentLoaded', initScrolling, false);
	</script>
        
</head>
<body>
	
	<app>
     <?php echo $content_for_layout; ?>
    </app>
	
</body>
</html>