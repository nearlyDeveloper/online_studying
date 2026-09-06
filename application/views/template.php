<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Онлайн курсы - <?=$title;?></title> <!-- Изменение до - Онлайн курсы -->
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="/assets/dist/css/skins/skin-blue.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- selectize -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" />
  <style>.selectize-dropdown [data-selectable].option {cursor: pointer;}</style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <a href="/" class="logo">
      <span class="logo-mini"><b>T</b> </span> <!-- В класс можно просто добавить ещё один fa fa-home, он добавит иконку её чутка бы подкорректировать по расположению -->
      <span class="logo-lg">Меню</span> <!-- Исправил "Курсы React.JS" на Меню, проверь что бы отображалось корректно -->
    </a>


    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

    </nav>
  </header>
  <aside class="main-sidebar">

    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
          <? if (!$user) { ?>
              <li class="header">Привет, гость!</li>
              <li><a href="/user/auth/login"><i class="fa fa-circle-o text-red"></i> <span>Авторизация</span></a></li>  <!--Исправил авторизацию, проверь что бы отображалось корректно -->
              <li><a href="/user/auth/register"><i class="fa fa-circle-o text-aqua"></i> <span>Регистрация</span></a></li>  <!--Исправил регистрацию, проверь что бы отображалось корректно -->
          <? } else { ?>
              <li class="header">Привет, <?=$user->login;?>!</li>
              <li><a href="/user/me"><i class="fa fa-address-card"></i> <span>Мой профиль</span></a></li>
              <? if ($user->group == 2) { ?>
                  <li><a href="/admin"><i class="fa fa-tachometer"></i> <span>Админ панель</span></a></li>
              <? } ?>
              <li><a href="/main/signout"><i class="fa fa-circle-o text-aqua"></i> <span>Выход</span></a></li>
          <? } ?>
        <li class="header">НАВИГАЦИЯ</li>
        <li><a href="/"><i class="fa fa-home"></i> <span>Главная страница</span></a></li>
          <? foreach ($cources as $cource) { ?>
              <li><a href="/cources/view/index/<?=$cource->id;?>"><i class="fa fa fa-graduation-cap"></i> <span><?=$cource->name;?></span></a></li>
         <?  } ?>
          <li><a href="/about"><i class="fa fa-info"></i> <span>О сайте</span></a></li>
      </ul>
    </section>
  </aside>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        <?=$title;?>
      </h1>
    </section>

    <section class="content container-fluid">
	 <?$this->load->view($content);?>
    </section>
  </div>

  <footer class="main-footer">
    <strong><?=$title;?></strong>
  </footer>
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- jQuery 3 -->
<script src="/assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/assets/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>

<script>
  $(function () {
    $('#table').DataTable({
		"language": { "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Russian.json" }
	})
	$('select[selectize=true]').selectize({
		delimiter: ',',
		maxItems: null,
	});
  })
</script>

</body>
</html>