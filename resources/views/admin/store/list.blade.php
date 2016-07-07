<div class="section" ng-controller="StoreListCtrl">
  <div id="table-datatables">
        <div class="row">
            <div class="col s12">
                <table datatable="ng" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Loja</th>
                            <th>Usuário</th>
                            <th>Ativo</th>
                            <th>Data Criação</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr ng-repeat="store in stores">
                            <td>{{ store.id }}</td>
                            <td>{{ store.name }}</td>
                            <td>{{ store.user_name }}</td>
                            <td>{{ store.active ? "Sim" : "Não" }}</td>
                            <td>{{ store.created_at | date:"dd/MM/yyyy" }}</td>
                        </tr>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div></div>
