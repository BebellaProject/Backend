<div class="section" ng-controller="ChannelListCtrl">
  <div id="table-datatables">
        <div class="row">
            <div class="col s12">
                <table datatable="ng" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Canal</th>
                            <th>Usuário</th>
                            <th>Ativo</th>
                            <th>Data Criação</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr ng-repeat="channel in channels">
                            <td>{{ channel.id }}</td>
                            <td>{{ channel.name }}</td>
                            <td>{{ channel.user_name }}</td>
                            <td>{{ channel.active ? "Sim" : "Não" }}</td>
                            <td>{{ channel.created_at | date:"dd/MM/yyyy" }}</td>
                        </tr>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>
