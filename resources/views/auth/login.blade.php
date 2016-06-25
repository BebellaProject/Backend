<!DOCTYPE html>
<html lang="en">

<!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 3.1
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <title>Bebella Login</title>

  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  
  <link href="<% $STATIC_URL %>/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<% $STATIC_URL %>/css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<% $STATIC_URL %>/css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<% $STATIC_URL %>/css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<% $STATIC_URL %>/js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<% $STATIC_URL %>/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  
</head>

<body class="cyan">
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>


  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form" action="<% $APP_URL %>/auth/login" method="POST">
        <div class="row">
          <div class="input-field col s12 center">
            <p class="center login-form-text">Bem Vindo ao Bebella</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="username" name="email" type="text">
            <label for="username" class="center-align">Email</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" name="password" type="password">
            <label for="password">Senha</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button type="submit" class="btn waves-effect waves-light col s12">LOGAR-SE</button>
          </div>
        </div>
       
        <%% csrf_field() %%>
       
      </form>
    </div>
  </div>

  <script type="text/javascript" src="<% $STATIC_URL %>/js/plugins/jquery-1.11.2.min.js"></script>
  <script type="text/javascript" src="<% $STATIC_URL %>/js/materialize.min.js"></script>
  <script type="text/javascript" src="<% $STATIC_URL %>/js/plugins/prism/prism.js"></script>
  <script type="text/javascript" src="<% $STATIC_URL %>/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

  <script type="text/javascript" src="<% $STATIC_URL %>/js/plugins.min.js"></script>
  <script type="text/javascript" src="<% $STATIC_URL %>/js/custom-script.js"></script>

</body>

</html>