Bebella.controller('ProductOptionDetailCtrl', ['$scope', '$stateParams', 'Breadcumb', 'ProductOptionRepository', 'ReportRepository',
    function ($scope, $stateParams, Breadcumb, ProductOptionRepository, ReportRepository) {

        Breadcumb.items = [
            {url: 'home', text: 'Dashboard'},
            {url: 'product_option_list', text: 'Lista'},
            {text: 'Opção de Produto'}
        ];
        
        $scope.viewClickDataset = [
            {
                color: "#fb2b67",
                label: "visualizações",
                shadowSize: 1,
                data: []
            },
            {
                color: "#ff6511",
                label: "cliques",
                shadowSize: 1,
                data: []
            }
        ];

        $scope.redirectOptions = {
            legend: {
                show: true,
                container: "#chart-legends1"
            },
            series: {
                lines: {
                    lineWidth: 2
                }
            },
            xaxis: {
                mode: "time",
                timezone: "browser",
                position: "bottom",
                timeFormat: "%d/%m/%y"
            }
        };

        $scope.viewClickOptions = {
            legend: {
                show: true,
                container: "#chart-legends2"
            },
            series: {
                lines: {
                    lineWidth: 2
                }
            },
            xaxis: {
                mode: "time",
                timezone: "browser",
                position: "bottom",
                timeFormat: "%d/%m/%y"
            }
        };

        ProductOptionRepository.find($stateParams.productOptionId).then(
                function onSuccess(productOption) {
                    $scope.productOption = productOption;

                    Breadcumb.title = productOption.name;
                },
                function onError(res) {
                    alert("Houve um erro na obtenção da lista de produtos");
                }
        );

        ReportRepository.redirectsByProductOption($stateParams.productOptionId).then(
                function onSuccess(results) {
                    $scope.redirectDataset = [
                        {
                            color: "#fb2b67",
                            label: "redirecionamentos",
                            shadowSize: 1,
                            data: _.map(results, function (e) {
                                return [new Date(e.date), e.count];
                            })
                        }
                    ];
                },
                function onError(res) {
                    alert("Houve um erro na obtenção da lista de redirecionamentos");
                }
        );

        ReportRepository.clicksByProductOption($stateParams.productOptionId).then(
                function onSuccess(results) {

                },
                function onError(res) {
                    alert("Houve um erro na obtenção da lista de cliques");
                }
        );

        ReportRepository.viewsByProductOption($stateParams.productOptionId).then(
                function onSuccess(results) {
                    $scope.viewClickDataset[0].data = _.map(results, function (e) {
                        return [new Date(e.date), e.count];
                    });
                },
                function onError(res) {
                    alert("Houve um erro na obtenção da lista de visualizações");
                }
        );



    }
]);
