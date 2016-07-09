<div class="section" ng-controller="UserListCtrl">
  <div id="table-datatables">
        <div class="row">
            <div class="col s12">
                <table datatable="ng" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuário</th>
                            <th>Email</th>
                            <th>Tipo</th>
                            <th>Ativo</th>
                            <th>Data Criação</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr ng-repeat="user in users">
                            <td>{{ user.id }}</td>
                            <td><a ui-sref="user_detail({userId: {{user.id}}})">{{ user.name }}</a></td>
                            <td><a href="mailto:{{user.email}}">{{ user.email }}</a></td>
                            <td>{{ user.type }}</td>
                            <td>{{ user.active ? "Sim" : "Não" }}</td>
                            <td>{{ user.created_at | date:"dd/MM/yyyy" }}</td>
                        </tr>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div></div>
