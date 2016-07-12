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

</div>