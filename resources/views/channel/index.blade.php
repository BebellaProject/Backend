<!DOCTYPE html>
<html lang="en" ng-app="Bebella">

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
        <meta name="description" content="Aplicativo Bebella para compartilhar dicas e truques para transformarmos nosso redor ">
        <meta name="keywords" content="">
        <title>Bebella | Nome do Canal</title>

        <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
        <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
        <meta name="msapplication-TileColor" content="#00bcd4">
        <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">


        <link href="<% $STATIC_URL %>/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="<% $STATIC_URL %>/css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="<% $STATIC_URL %>/css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">

        <link href="<% $STATIC_URL %>/js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="<% $STATIC_URL %>/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="<% $STATIC_URL %>/js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    </head>

    <body class="white">
        <div id="loader-wrapper">
            <div id="loader"></div>        
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>

        <input type="hidden" id="APP_URL" value="<% $APP_URL %>" />
        <input type="hidden" id="API_TOKEN" value="<% $API_TOKEN %>" />
        
        <div id="main" style="padding-left: 0px !important;">
            <div class="wrapper">

                <section id="content ">

                    <div class="container ">
                        <div class="section ">

                            <div class="row">

                                <div class="col l8 m10 offset-l2 offset-m1">

                                    <div class="row">

                                        <div class="col s2 hide-on-small-only">
                                            <a href="index.html" class="brand-logo darken-1">
                                                <img src="<% $STATIC_URL %>/images/icon.png" style="margin-left: 15px;" height="60">
                                            </a>    
                                        </div>

                                        <div class="col s7">
                                            <ul class="bebella-header-menu" ng-init="route_idx = 0">
                                                <li>
                                                    <a ui-sref="dashboard.profile" ng-click="route_idx = 0" ng-class="{ active: (route_idx == 0) }">Dashboard</a>
                                                    <a ui-sref="recipes" ng-click="route_idx = 1" ng-class="{ active: (route_idx == 1) }">Receitas</a>
                                                    <a ng-click="route_idx = 2" ng-class="{ active: (route_idx == 2) }">Mensagens</a>
                                                </li>
                                            </ul>
                                        </div>
                                        
                                        <div class="col s3 hide-on-small-only">
                                            <a ui-sref="new_recipe" class="waves-effect waves-light btn bebella-color-1 right" ng-click="route_idx = -1">Nova Receita</a>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col s12 m12 l12">                        
                                            <h4 class="card-title grey-text text-darken-4"><% $CHANNEL->name %></h4>
                                            <p class="medium-small grey-text"><% $CHANNEL->desc %></p>                        
                                        </div>

                                    </div>                                
                                

                                    <div class="row" ui-view="Content">
                                    </div>                                

                                </div>

                            </div>

                        </div>

                    </div>
                </section>

            </div>
        </div>

        <script type="text/javascript" src="<% $STATIC_URL %>/js/plugins/jquery-1.11.2.min.js"></script>    
        <script type="text/javascript" src="<% $STATIC_URL %>/bower_components/underscore/underscore-min.js"></script>
        <script type="text/javascript" src="<% $STATIC_URL %>/js/materialize.min.js"></script>
        <script type="text/javascript" src="<% $STATIC_URL %>/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script type="text/javascript" src="<% $STATIC_URL %>/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script type="text/javascript" src="<% $STATIC_URL %>/js/plugins/flot-chart/jquery.flot.min.js"></script>
        <script type="text/javascript" src="<% $STATIC_URL %>/js/plugins/flot-chart/jquery.flot.pie.js"></script>
        <script type="text/javascript" src="<% $STATIC_URL %>/js/plugins/flot-chart/jquery.flot.stack.js"></script>
        <script type="text/javascript" src="<% $STATIC_URL %>/js/plugins/flot-chart/jquery.flot.time.js"></script>
        <script type="text/javascript" src="<% $STATIC_URL %>/js/plugins/chartist-js/chartist.min.js"></script>   

        <script type="text/javascript" src="<% $STATIC_URL %>/js/plugins/data-tables/js/jquery.dataTables.min.js"></script>

        <script type="text/javascript" src="<% $STATIC_URL %>/js/plugins.min.js"></script>
        <script type="text/javascript" src="<% $STATIC_URL %>/js/custom-script.js"></script>

        <script type="text/javascript" src="<% $STATIC_URL %>/bower_components/angular/angular.min.js"></script>
        <script type="text/javascript" src="<% $STATIC_URL %>/bower_components/angular-ui-router/release/angular-ui-router.min.js"></script>
        <script type="text/javascript" src="<% $STATIC_URL %>/bower_components/angular-datatables/dist/angular-datatables.min.js"></script>
        <script type="text/javascript" src="<% $STATIC_URL %>/bower_components/angular-flot/angular-flot.js"></script>
        <script type="text/javascript" src="<% $STATIC_URL %>/bower_components/ngstorage/ngStorage.min.js"></script>
        
        <script type="text/javascript" src="<% $STATIC_URL %>/dist/0.0.4/bebella.js"></script>
    </body>

</html>