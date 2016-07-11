<div class="section" ng-controller="RecipeListCtrl">
  <div id="table-datatables">
        <div class="row">
            <div class="col s12">
                <table datatable="ng" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Receita</th>
                            <th>Canal</th>
                            <th>Ativo</th>
                            <th>Data Criação</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr ng-repeat="recipe in recipes">
                            <td>{{ recipe.id }}</td>
                            <td><a ui-sref="recipe_edit({recipeId: {{recipe.id}}})">{{ recipe.name }}</a></td>
                            <td><a ui-sref="channel_detail({channel_id: {{ recipe.channel_id }}})">{{ recipe.channel_name }}</a></td>
                            <td>{{ recipe.active ? "Sim" : "Não" }}</td>
                            <td>{{ recipe.created_at | date:"dd/MM/yyyy" }}</td>
                        </tr>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div></div>
