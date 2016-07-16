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
        <title>Bebella | Rede social para compartilhar dicas e truques para transformarmos nosso redor</title>

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

    <body class="bebella-color-1-lighten-4">
        <div id="loader-wrapper">
            <div id="loader"></div>        
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>

        <nav class="bebella-color-1" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" href="<% $APP_URL %>" class="brand-logo">
                    <img src="<% $STATIC_URL %>/images/text-logo.png" height="60px" />
                </a>
                <ul class="right">
                    <li><a href="<% $APP_URL %>/auth/login">Logar-se</a></li>
                </ul>
                
            </div>
        </nav>
        <div class="section no-pad-bot" id="index-banner">
            <div class="container">
                <br><br>
                <h1 class="header center bebella-text-2">
                    <a target="_blank" href="https://play.google.com/store/apps/details?id=com.ionicframework.mobile321050&hl=pt_BR">
                        <img src="<% $STATIC_URL %>/images/icon.png" height="150">
                    </a>
                </h1>
                <div class="row center">
                    <h5 class="header col s12 light">
                        Uma Rede Social para compartilhar dicas e truques para nos <br>
                        ensinarmos a deixar nosso encanto em cada canto
                    </h5>
                </div>
                <br><br>

            </div>
        </div>


        <div class="container">
            <div class="section">

                <!--   Icon Section   -->
                <div class="row">
                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center bebella-text-2"><i class="mdi-social-person large"></i></h2>
                            <h5 class="center">Produtores de Conteúdo</h5>

                            <p class="light">
                                Para produtores de conteúdo, uma área exclusiva onde você poderá administrar suas receitas e visualizar estatísticas de acesso e divulgação. Além de prover uma plataforma para aproximação dos lojistas e marcas que fornecem os materiais para suas receitas. 
                            </p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center bebella-text-2"><i class="mdi-action-store large"></i></h2>
                            <h5 class="center">Lojistas e Marcas</h5>

                            <p class="light">
                                Estamos à procura de marcas e lojas que vendam produtos de qualidade que possam elevar a qualidade das receitas em nosso aplicativo. Para tornar-se um parceiro basta preencher o formulário no seguinte link.
                            </p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center bebella-text-2"><i class="mdi-social-group large"></i></h2>
                            <h5 class="center">Comunidade</h5>

                            <p class="light">
                                Permitimos que nossos usuários acessem diversas ofertas dos produtos necessários para fazer aquela receita que vá resolver seus problemas e transformar seu dia. Assim, você não tem só acesso à um conteúdo de qualidade, mas também à produtos de marcas e lojas selecionadas de acordo com sua qualidade e compromisso.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <br><br>

            <div class="section">

            </div>
        </div>

        <footer class="page-footer bebella-color-1">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Bebella</h5>
                        <p class="grey-text text-lighten-4">
                            We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.
                        </p>


                    </div>
                    <div class="col l3 s12">
                        <h5 class="white-text">Mapa do Site</h5>
                        <ul>
                            <li><a class="white-text" href="#!">Blog</a></li>
                            <li><a class="white-text" href="#!">Parceiros</a></li>
                        </ul>
                    </div>
                    <div class="col l3 s12">
                        <h5 class="white-text">Social</h5>
                        <ul>
                            <li><a class="white-text" href="#!">Facebook</a></li>
                            <li><a class="white-text" href="#!">Youtube</a></li>
                            <li><a class="white-text" href="#!">Entre em Contato</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright bebella-color-1">
                <div class="container">
                    Copyright <a class="orange-text text-lighten-3" href="mailto:diego.mrodrigues@outlook.om">Diego Rodrigues</a> 2016
                </div>
            </div>
        </footer>

        <script type="text/javascript" src="<% $STATIC_URL %>/js/plugins/jquery-1.11.2.min.js"></script>    
        <script type="text/javascript" src="<% $STATIC_URL %>/js/materialize.min.js"></script>
        <!--prism
        <script type="text/javascript" src="<% $STATIC_URL %>/js/prism/prism.js"></script>-->
        <script type="text/javascript" src="<% $STATIC_URL %>/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script type="text/javascript" src="<% $STATIC_URL %>/js/plugins/chartist-js/chartist.min.js"></script>   
        <script type="text/javascript" src="<% $STATIC_URL %>/js/plugins.min.js"></script>
        <script type="text/javascript" src="<% $STATIC_URL %>/js/custom-script.js"></script>

    </body>

</html>