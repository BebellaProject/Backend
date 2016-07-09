<div class="section" ng-controller="UserNewCtrl">

    <div id="input-fields">
        <h4 class="header">Usuário</h4>
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <form class="col s12">

                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <input ng-model="user.name" id="input1" type="text" class="validate">
                                <label for="input1" ng-class="{active: user.name}">Nome</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <input ng-model="user.email" id="input2" type="text" class="validate">
                                <label for="input2" ng-class="{active: user.email}">Email</label>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <input ng-model="user.password" id="input3" type="text" class="validate">
                                <label for="input3" ng-class="{active: user.password}">Senha</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <select ng-model="user.type" id="input4" class="validate browser-default">
                                    <option value="user">Usuário Comum</option>
                                    <option value="admin">Administrador</option>
                                </select>
                                <label for="input4" ng-class="{active: user.type}">Tipo</label>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <form action="#">
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <span>Imagem Perfil</span>
                                            <input type="file" accept="image/*" fileread="user.profile_image">
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
