<div class="section" ng-controller="ProductOptionNewCtrl">

    <p class="caption">Formulário para cadastro de novas opções de produto</p>
    <div class="divider"></div>

    <div id="input-fields">
        <h4 class="header">Informações Gerais</h4>
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <form class="col s12">

                        <div class="row">
                            <div class="input-field col s12 m6 l6">
                                <select ng-model="product_option.store_id" id="input1" class="browser-default"
                                        ng-options="store.id as store.name for store in ::stores">
                                    <option value=""></option>
                                </select>
                                <label for="input1"  ng-class="{active: product_option.store_id}">Loja</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <select ng-model="product_option.product_id" id="input1" class="browser-default"
                                        ng-options="product.id as product.name for product in ::products">
                                    <option value=""></option>
                                </select>
                                <label for="input2" ng-class="{active: product_option.product_id}">Produto</label>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <input ng-model="product_option.name" id="input3" type="text" class="validate">
                                <label for="input3" ng-class="{active: product_option.name}">Nome</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m12 l3">
                                <input ng-model="product_option.price" id="input5" type="number" class="validate">
                                <label for="input5" ng-class="{active: product_option.price}">Preço</label>
                            </div>
                            <div class="input-field col s12 m12 l9">
                                <input ng-model="product_option.store_url" id="input6" type="text" class="validate">
                                <label for="input6" ng-class="{active: product_option.store_url}">Link para Loja</label>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="input4" ng-model="product_option.desc" class="materialize-textarea"></textarea>
                                <label for="input4" ng-class="{active: product_option.desc}">Descrição</label>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col s12 m12 l12">
                                <form action="#">
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <span>Imagem Principal</span>
                                            <input type="file" accept="image/*" fileread="product_option.image">
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
