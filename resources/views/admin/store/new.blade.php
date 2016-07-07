<div class="section" ng-controller="StoreNewCtrl">

    <p class="caption">Formulário para cadastro de novas lojas</p>
    <div class="divider"></div>

    
    <div id="input-fields">
        <h4 class="header">Usuário</h4>
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <form class="col s12">

                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <input ng-model="store.user_name" id="input1" type="text" class="validate">
                                <label for="input1" ng-class="{active: store.user_name}">Nome</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <input ng-model="store.user_email" id="input2" type="text" class="validate">
                                <label for="input2" ng-class="{active: store.user_email}">Email</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <input ng-model="store.user_password" id="input3" type="text" class="validate">
                                <label for="input3" ng-class="{active: store.user_password}">Senha</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12">
                                <form action="#">
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <span>Imagem Perfil</span>
                                            <input type="file" accept="image/*" fileread="store.profile_image">
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
        <h4 class="header">Detalhes da Loja</h4>
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <form class="col s12">

                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <input ng-model="store.name" id="input1" type="text" class="validate">
                                <label for="input4" ng-class="{active: store.name}">Nome</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <input ng-model="store.short_desc" maxlength="35" id="input5" type="text" class="validate">
                                <label for="input5" ng-class="{active: store.short_desc}">Breve Descrição (max. 35)</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="input6" ng-model="store.desc" class="materialize-textarea"></textarea>
                                <label for="input6" ng-class="{active: store.desc}">Descrição</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12">
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>Thumbnail</span>
                                        <input type="file" accept="image/*" fileread="store.image">
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
                                <input ng-model="store.website" id="input9" type="text" class="validate">
                                <label for="input9" ng-class="{active: store.website}">Website</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <input ng-model="store.facebook_page" id="input8" type="text" class="validate">
                                <label for="input8" ng-class="{active: store.facebook_page}">Página Facebook</label>
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
