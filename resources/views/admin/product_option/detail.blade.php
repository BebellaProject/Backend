<div class="section" ng-controller="ProductOptionDetailCtrl">

    <div class="row">

        <div class="col s12 m12 l8">

            <p>Redirecionamentos</p>
            
            <div class="flotchart-placeholder" >
                <flot dataset="redirectDataset" options="redirectOptions" ></flot>
            </div>
            
             <div>
                <div id="chart-legends1" style="width: 150px; float: right;"></div>
            </div>
            
            <p>Visualização / Cliques</p>
            
            <div class="flotchart-placeholder" >
                <flot dataset="viewClickDataset" options="viewClickOptions" ></flot>
            </div>        

             <div>
                <div id="chart-legends2" style="width: 150px; float: right;"></div>
            </div>
            
        </div>

        <div class="col s12 m12 l4">
            
            <p>Informações</p>
            
            <a ui-sref="product_option_edit({productOptionId: {{productOption.id}}})">Formulário de Cadastro</a>
            
            
        </div>

    </div>

</div>

