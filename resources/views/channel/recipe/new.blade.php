<div class="col s12">

    <p class="title">Nova Receita</p>
    <p class="caption">
        Formulário para criação de novas receitas. Importante resaltar que a 
        receita passará por um breve processo de aprovação antes de serem 
        publicadas. Para maiores informações <a class="bebella-text-2">clique aqui</a>.
    </p>

    <div class="row">
        <div class="col s12 m4 l3">
            <p >
                Tente manter o nome e descrição a da receita o mais sucinto e breve possivel. 
                É interessante resaltar as finalidades da receita, pois assim você 
                chama atenção dos usuários mais objetivos.
            </p>
        </div>

        <div class="input-field col s12 m8 l9">
            <input ng-model="recipe.name" id="input1" type="text" class="validate">
            <label for="input1" ng-class="{active: recipe.name}">Nome da Receita</label>
        </div>

        <div class="input-field col s12 m8 l9">
            <textarea id="input2" ng-model="recipe.desc" class="materialize-textarea"></textarea>
            <label for="input2" ng-class="{active: recipe.desc}">Descrição</label>
        </div>

    </div>

    <div class="row">

        <div class="col s12 m4 l3">
            <p >
                O tipo da receita será usado nos filtros do usuário.
            </p>
        </div>

        <div class="input-field col s12 m8 l9">
            <select ng-model="recipe.type" id="input3" class="browser-default">
                <option value=""></option>
                <option value="beauty">Beleza</option>
                <option value="decoration">Decoração</option>
                <option value="clothing">Vestimenta</option>
                <option value="food">Culinária</option>
                <option value="health">Saúde</option>
            </select>
            <label for="input3" ng-class="{active: recipe.type}">Tipo</label>
        </div>

    </div>

    <div class="row">

        <div class="col s12 m4 l3">
            <p >
                Marque essa opção caso a receita seja demonstrada em vídeo hospedado no youtube.
            </p>
        </div>

        <div class="col s12 m8 l9">

            <div class="switch" style="margin-top: 10px;">
                <label style="margin-left: 10px;">
                    Somente Imagens e Texto
                    <input ng-model="recipe.has_video" type="checkbox">
                    <span class="lever"></span> Vídeo Acompanha
                </label>
            </div>

            <div class="input-field col s12 m12 l12" ng-show="recipe.has_video">
                <input ng-model="videoUrl" id="input5" type="text" class="validate">
                <label for="input5" ng-class="{active: videoUrl}">Link do Vídeo no Youtube</label>
            </div>

        </div>

    </div>

    <div class="row">

        <div class="col s12 m4 l3">
            <p >
                Esta imagem será exibida no feed do usuário. Tente mantê-la o mais
                chamativa e objetiva possivel. <strong>(Porporção recomendada: 500x500)</strong>
            </p>
        </div>

        <div class="col s12 m8 l9">
            <input type="file" id="input-file-now" class="dropify-main" 
                   accept="image/*" fileread="recipe.main_image"/>
        </div>

    </div>

    <div class="row">
        <p class="title">Procedimentos</p>
        <p class="caption">
            Tente ser mais 
            breve e objetivo, visando sempre quebrar procedimentos complexos em
            etapas menores.
        </p>

    </div>

    <div ng-repeat="step in recipe.steps">
        <div class="row" ng-if="step.type == 'image'">
            <p class="caption">Etapa {{ $index + 1 }}</p>

            <div class="col s12 m4 l3">
                <input type="file" id="input-file-now" class="dropify-step" 
                       accept="image/*" fileread="step.image_path" />
            </div>

            <div class="input-field col s10 m7 l8">
                <textarea id="stepn" ng-model="step.desc" style="height: 40px;" class="materialize-textarea"></textarea>
                <label for="stepn" ng-class="{active: step.desc}">Descrição</label>
            </div>

            <div class="col s2 m1 l1">
                <a class="btn-floating btn-flat waves-effect waves-light bebella-color-3 white-text" ng-if="$index != 0" ng-click="moveStep($index, $index - 1)" style="margin-top: 10px;"><i class="mdi-navigation-expand-less"></i></a>
                <a class="btn-floating btn-flat waves-effect waves-light bebella-color-3 white-text" ng-click="removeStep($index)" style="margin-top: 10px;"><i class="mdi-action-delete"></i></a>
            </div>
        </div>

        <div class="row" ng-if="step.type == 'moment'">
            <p class="caption">Etapa {{ $index + 1 }}</p>

            <div class="input-field col s12 m4 l3">
                <input id="time1" type="text" class="time-picker" ng-model="step.moment" style="margin-top: 48px;">
                <label for="time1" style="margin-top: 48px;">Momento</label>
            </div>

            <div class="input-field col s10 m7 l8">
                <textarea id="stepn" ng-model="step.desc" style="height: 40px;" class="materialize-textarea"></textarea>
                <label for="stepn" ng-class="{active: step.desc}">Descrição</label>
            </div>

            <div class="col s2 m1 l1">
                <a class="btn-floating btn-flat waves-effect waves-light bebella-color-3 white-text" ng-if="$index != 0" ng-click="moveStep($index, $index - 1)" style="margin-top: 10px;"><i class="mdi-navigation-expand-less"></i></a>
                <a class="btn-floating btn-flat waves-effect waves-light bebella-color-3 white-text" ng-click="removeStep($index)" style="margin-top: 10px;"><i class="mdi-action-delete"></i></a>
            </div>

            <script type="text/javascript">
                $('.dropify-step').dropify({
                    tpl: {
                        wrap: '<div class="dropify-wrapper" style="max-height:110px;"></div>',
                        filename: ''
                    }
                });

                $('.time-picker').formatter({
                    'pattern': '{{99}}:{{99}}',
                });
            </script>
        </div>

    </div>
        
    <div class="row" >
        <a class="btn btn-flat waves-effect waves-light bebella-color-2 white-text" ng-click="insertImageStep()" style="margin-left: 10px;">
            <i class="mdi-image-photo"></i>
        </a>
        <a class="btn btn-flat waves-effect waves-light bebella-color-2 white-text" ng-click="insertMomentStep()" style="margin-left: 10px;" ng-show="recipe.has_video">
            <i class="mdi-action-theaters"></i>
        </a>
    </div>

    <div class="row">

        <p class="title">Produtos</p>
        <p class="caption">
            Insira todos produtos utilizados nesta receita, por favor, verifique a existência do produto
            em nosso catálogo antes de insirir um produto inexistente. Lembre-se de que receitas com produtos
            formatados atrairá uma maior visibilidade de nossos parceiros logistas.
        </p>

    </div>

    <div class="row" style="margin-top: -40px;">

        <div class="col s12 m12 l3">
            <p>
                Não adicione um novo produto antes de procurá-lo em nosso catálogo.
            </p>
        </div>

        <div class="input-field col s12 m9 l7">
            <select id="select_product" ng-model="selectedProduct">
                <option value="-1">Novo Produto</option>

                <optgroup ng-repeat="category in categories" label="{{ category[0].category_name }}">
                    <option ng-repeat="product in category" value="{{ product.id }}">{{ product.name }}</option>
                </optgroup>
  
            </select>
        </div>

        <div class="col s2 m3 l2 right-align">
            <a class="btn waves-effect waves-light bebella-color-2 white-text"
               title="Adicionar novo produto"
               style=" margin-top: 10px;"
               ng-click="addProduct()">
                <i class="mdi-content-add"></i>
            </a>
        </div>

    </div>

    <div class="row" ng-repeat="product in recipe.products">
        <div class="col m3 l2 hide-on-small-only">
            <img style="width: 100%; max-width: 125px; max-height: 125px;" src="<% $APP_URL %>/{{ product.image_path }}">
        </div>

        <div class="col s10 m7 l8">
            <p class="title" style="margin-top: 0px; margin-bottom: 2px;">{{ product.name }}</p>
            <p class="caption" style="margin-top: 0px; margin-bottom: 0px;">{{ product.short_desc }}</p>
        </div>

        <div class="col s2 m2 l2">
            <a class="btn-floating btn-flat waves-effect waves-light bebella-color-3 white-text" style="margin-left: 65px; margin-top: 10px;"><i class="mdi-action-delete"></i></a>
        </div>

    </div>

    <div class="row">

        <p class="title">Tags</p>
        <p class="caption">
            As Tags serão usadas para filtrar e recomendar suas receitas, por favor, sempre procure ser o mais objetivo
            possivel na escolha das tags.
        </p>

    </div>

    <div class="row" style="margin-top: -40px;">

        <div class="col s12 m4 l3">
            <p>
                Escreva no máximo 10 tags separadas por vírgula.
            </p>
        </div>

        <div class="input-field col s12 m8 l9">
            <textarea id="tags" ng-model="tags"  class="materialize-textarea"></textarea>
            <label for="tags" ng-class="{active: tags}">Tags</label>
        </div>

    </div>

    <div class="row">

        <div class="col s12 m12 l12 right-align">
            <button class="btn waves-effect waves-light bebella-color-4" type="button" ng-click="clear()" name="action">Limpar
                <i class="mdi-av-replay right"></i>
            </button>
            <button class="btn waves-effect waves-light bebella-color-1" type="button" ng-click="create()" name="action">Criar
                <i class="mdi-content-send right"></i>
            </button>
        </div>

    </div>

</div>

<script>

    $('.dropify-main').dropify();

    $('#select_product').select2();

</script>