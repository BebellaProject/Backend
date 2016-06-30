<div class="section" ng-controller="ProductEditCtrl">

    <p class="caption">Formulário de cadastro</p>
    <div class="divider"></div>

    <!--Input fields-->
    <div id="input-fields">
        <h4 class="header">Informações Gerais</h4>
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <form class="col s12">

                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <input ng-model="product.name" id="input1" type="text" class="validate">
                                <label for="input1" ng-class="{active: product.name}">Nome</label>
                            </div>
                        </div>

                         <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <select ng-model="product.category_id" id="input04" class="browser-default"
                                        ng-options="category.id as category.name for category in ::categories">
                                    <option value=""></option>
                                </select>
                                <label for="input04"  ng-class="{active: product.category_id}">Categoria</label>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <input ng-model="product.short_desc" id="input3" type="text" maxlength="40" class="validate">
                                <label for="input3" ng-class="{active: product.short_desc}">Breve Descrição (40 max.)</label>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="input2" ng-model="product.desc" class="materialize-textarea"></textarea>
                                <label for="input2" ng-class="{active: product.desc}">Descrição Completa</label>
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
                <button class="btn waves-effect waves-light green" type="button" ng-click="edit()" name="action">Editar
                    <i class="mdi-content-send right"></i>
                </button>
            </div>
        </div>
    </div>

</div>

