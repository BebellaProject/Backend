<div class="section" ng-controller="RecipeEditCtrl">

    <div id="input-fields">
        <h4 class="header">Informações Gerais</h4>
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <form class="col s12">

                        <div class="row">
                            <div class="input-field col s12 m6 l6">
                                <select ng-model="recipe" id="input1" class="browser-default"
                                        ng-options="channel.id as channel.name for channel in ::channels track by channel.id">
                                    <option value=""></option>
                                </select>
                                <label for="input1"  ng-class="{active: recipe.channel_id}">Canal</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <select ng-model="recipe.type" id="input1" class="browser-default"
                                    <option value=""></option>
                                    <option value="beauty">Beleza</option>
                                    <option value="decoration">Decoração</option>
                                    <option value="clothing">Vestimenta</option>
                                    <option value="food">Culinária</option>
                                    <option value="health">Saúde</option>
                                </select>
                                <label for="input2" ng-class="{active: recipe.type}">Tipo</label>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <input ng-model="recipe.name" id="input3" type="text" class="validate">
                                <label for="input3" ng-class="{active: recipe.name}">Nome</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="input4" ng-model="recipe.desc" class="materialize-textarea"></textarea>
                                <label for="input4" ng-class="{active: recipe.desc}">Descrição</label>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col s12 m12 l12">
                                <form action="#">
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <span>Imagem Principal</span>
                                            <input type="file" accept="image/*" fileread="recipe.main_image">
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
        <h4 class="header">Tags</h4>
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <form class="col s12">


                        <div class="row" ng-repeat="tag in recipe.tags">
                            <div class="input-field col s12 m12 l12">
                                <input ng-model="tag.name" id="tag{{$index}}" type="text" class="validate">
                                <label for="tag{{$index}}" ng-class="{active: tag.name}">Tag {{$index + 1}}</label>
                            </div>
                        </div>


                        <div class="col s12 m12 l12">
                            <button class="btn waves-effect waves-light blue" type="button" ng-click="newTag()" name="action">
                                <i class="mdi-content-add "></i>
                            </button>
                            <button class="btn waves-effect waves-light red" type="button" ng-click="removeTag()" name="action">
                                <i class="mdi-content-remove "></i>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="input-fields">
        <h4 class="header">Procedimentos</h4>
        <div class="row">
            <div class="col s12">
                <div style="margin-left: 0px;" class="row">
                    <form class="col s12">

                        <div class="row" ng-repeat="step in recipe.steps">
                            <div class="col s4 m2 l2">
                                <form action="#">
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <span>Imagem</span>
                                            <input type="file" accept="image/*" fileread="step.image">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="input-field col s8 m10 l10">
                                <textarea id="step{{$index}}" ng-model="step.desc" class="materialize-textarea"></textarea>
                                <label for="step{{$index}}" ng-class="{active: step.desc}">Passo {{$index + 1}}</label>
                            </div>
                        </div>

                        <div class="col s12 m12 l12">
                            <button class="btn waves-effect waves-light blue" type="button" ng-click="newStep()" name="action">
                                <i class="mdi-content-add"></i>
                            </button>
                            <button class="btn waves-effect waves-light red" type="button" ng-click="removeStep()" name="action">
                                <i class="mdi-content-remove "></i>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="input-fields">
        <h4 class="header">Produtos</h4>
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <form class="col s12">


                        <div style="margin-bottom: 5px;" class="row" ng-repeat="product in recipe.products">
                            <div class="input-field col s12 m12 l12">
                                <select ng-model="product" id="product{{$index}}" class="browser-default"
                                        ng-options="product.id as product.name for product in ::products track by product.id">
                                    <option value=""></option>
                                </select>
                                <label for="product{{$index}}"  ng-class="{active: product.product_id}">Produto {{$index + 1}}</label>
                            </div>
                        </div>

                        <div class="col s12 m12 l12">
                            <button class="btn waves-effect waves-light blue" type="button" ng-click="newProduct()" name="action">
                                <i class="mdi-content-add "></i>
                            </button>
                            <button class="btn waves-effect waves-light red" type="button" ng-click="removeProduct()" name="action">
                                <i class="mdi-content-remove "></i>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <br>

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

