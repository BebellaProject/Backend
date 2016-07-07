<div class="section" ng-controller="CategoryNewCtrl">

    <!--Input fields-->
    <div id="input-fields">
        <h4 class="header">Informações Gerais</h4>
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <form class="col s12">

                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <input ng-model="category.name" id="input1" type="text" class="validate">
                                <label for="input1" ng-class="{active: category.name}">Nome</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="input74" ng-model="category.desc" class="materialize-textarea"></textarea>
                                <label for="input74" ng-class="{active: category.desc}">Descrição</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12">
                                <form action="#">
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <span>Imagem</span>
                                            <input type="file" accept="image/*" fileread="category.image">
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
