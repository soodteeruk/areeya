<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title_for_layout; ?></title>

    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/docs.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/freeow/freeow.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/datepicker.css'); ?>" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">
    <!--[if IE 7]>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome-ie7.min.css'); ?>">
    <![endif]-->

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url('assets/ico/apple-touch-icon-144-precomposed.png'); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('assets/ico/apple-touch-icon-114-precomposed.png'); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('assets/ico/apple-touch-icon-72-precomposed.png'); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url('assets/ico/apple-touch-icon-57-precomposed.png'); ?>">
    <link rel="shortcut icon" href="<?php echo base_url('assets/ico/favicon.png'); ?>">

    <script src="<?php echo base_url('assets/js/jquery-1.10.2.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/underscore.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.freeow.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-datepicker.th.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.blockUI.js'); ?>"></script>

    <script type="text/javascript">
        var csrf_token = '<?php echo $this->security->get_csrf_hash(); ?>';
        var base_url = '<?php echo base_url(); ?>';
    </script>
    <script src="<?php echo base_url('assets/apps/js/apps.js'); ?>"></script>

</head>
<body>
<div id="freeow" class="freeow freeow-bottom-right"></div>
<div class="navbar navbar-static-top bs-docs-nav" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo base_url(); ?>">Areeya Parkvill</a>
    </div>

    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            <li><a href="#"><i class="icon-wrench"></i> ควบคุมต้นทุน</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-list"></i> บริษัท <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#">บริษัทที่ 1</a> </li>
                    <li><a href="#">บริษัทที่ 2</a> </li>
                </ul>
            </li>
        </ul>

        <ul class="nav navbar-nav pull-right">
            <li>
                <a href="<?php echo base_url('compeny'); ?>"><i class="icon-cog"></i> ตั้งค่า</a>
            </li>
        </ul>
    </div>
</div>
</div>

<div class="container">
    <?php echo $content_for_layout; ?>
</div> <!-- /container -->

</body>
</html>