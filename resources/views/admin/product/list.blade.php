<div class="section" ng-controller="ProductListCtrl">
  <div id="table-datatables">
        <div class="row">
            <div class="col s12">
                <table datatable="ng" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Produto</th>
                            <th>Categoria</th>
                            <th>Ativo</th>
                            <th>Data Criação</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr ng-repeat="product in products">
                            <td>{{ product.id }}</td>
                            <td><a ui-sref="product_edit({productId: {{ product.id }}})">{{ product.name }}</td>
                            <td><a ui-sref="category_edit({categoryId: {{ product.category_id }}})">{{ product.category_name }}</a></td>
                            <td>{{ product.active ? "Sim" : "Não" }}</td>
                            <td>{{ product.created_at | date:"dd/MM/yyyy" }}</td>
                        </tr>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>
