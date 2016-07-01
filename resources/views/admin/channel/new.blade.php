<div class="section" ng-controller="ChannelNewCtrl">

    <p class="caption">Formulário para cadastro de novos canais</p>
    <div class="divider"></div>

    <!--Input fields-->
    <div id="input-fields">
        <h4 class="header">Usuário</h4>
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <form class="col s12">

                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <input ng-model="channel.user_name" id="input1" type="text" class="validate">
                                <label for="input1" ng-class="{active: channel.user_name}">Nome</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <input ng-model="channel.user_email" id="input2" type="text" class="validate">
                                <label for="input2" ng-class="{active: channel.user_email}">Email</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <input ng-model="channel.user_password" id="input3" type="text" class="validate">
                                <label for="input3" ng-class="{active: channel.user_password}">Senha</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12">
                                <form action="#">
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <span>Imagem Perfil</span>
                                            <input type="file" accept="image/*" fileread="channel.profile_image">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="input-fields">
        <h4 class="header">CANAL</h4>
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <form class="col s12">

                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <input ng-model="channel.name" id="input4" type="text" class="validate">
                                <label for="input4" ng-class="{active: channel.name}">Nome</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <input ng-model="channel.short_desc" maxlength="35" id="input5" type="text" class="validate">
                                <label for="input5" ng-class="{active: channel.short_desc}">Breve Descrição (max. 35)</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="input6" ng-model="channel.desc" class="materialize-textarea"></textarea>
                                <label for="input6" ng-class="{active: channel.desc}">Descrição</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12">
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>Thumbnail</span>
                                        <input type="file" accept="image/*" fileread="channel.image">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="input-fields">
        <h4 class="header">Ligações Externas</h4>
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <form class="col s12">

                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <input ng-model="channel.youtube_user" id="input7" type="text" class="validate">
                                <label for="input7" ng-class="{active: channel.youtube_user}">Canal YouTube</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <input ng-model="channel.facebook_page" id="input8" type="text" class="validate">
                                <label for="input8" ng-class="{active: channel.facebook_page}">Página Facebook</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <input ng-model="channel.website" id="input9" type="text" class="validate">
                                <label for="input9" ng-class="{active: channel.website}">Website</label>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <div id="submit-button" class="section">
        <div class="row">
            <div class="col s12 m12 l12 right-align">
                <button class="btn waves-effect waves-light blue" type="button" ng-click="clear()" name="action">Limpar
                    <i class="mdi-av-replay right"></i>
                </button>
                <button class="btn waves-effect waves-light green" type="button" ng-click="create()" name="action">Criar
                    <i class="mdi-content-send right"></i>
                </button>
            </div>
        </div>
    </div>
</div>
