<div class="section" ng-controller="ProductOptionListCtrl">
    <div id="table-datatables">
        <div class="row">
            <div class="col s12">
                <table datatable="ng" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Opção</th>
                            <th>Produto</th>
                            <th>Loja</th>
                            <th>Ativo</th>
                            <th>Data Criação</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr ng-repeat="option in product_options">
                            <td>{{ option.id }}</td>
                            <td><a ui-sref="product_option_detail({productOptionId: {{ option.id }}})">{{ option.name }}</a></td>
                            <td><a ui-sref="product_edit({productId: {{ option.product_id}}})">{{ option.product_name}}</a></td>
                            <td><a ui-sref="store_edit({storeId: {{ option.store_id}}})">{{ option.store_name}}</a></td>
                            <td>{{ option.active ? "Sim" : "Não" }}</td>
                            <td>{{ option.created_at | date:"dd/MM/yyyy" }}</td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
