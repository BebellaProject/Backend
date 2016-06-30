<div class="section" ng-controller="CategoryListCtrl">
  <div id="table-datatables">
        <div class="row">
            <div class="col s12">
                <table datatable="ng" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Categoria</th>
                            <th>Ativo</th>
                            <th>Data Criação</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr ng-repeat="category in categories">
                            <td>{{ category.id }}</td>
                            <td><a ui-sref="category_edit({categoryId: {{ category.id }}})">{{ category.name }}</a></td>
                            <td>{{ category.active ? "Sim" : "Não" }}</td>
                            <td>{{ category.created_at | date:"dd/MM/yyyy" }}</td>
                        </tr>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>
