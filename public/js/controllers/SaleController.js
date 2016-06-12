app.controller('SaleController', ['$scope', 'product','$http', function($scope, product,$http) {
    product.getAll().success(function(data) {
        $scope.products = data;
    });
    $scope.saletemp = [];
    $scope.isiCart = function () {
        $http.get('/api/saletemp').success(function(data) {
            $scope.saletemp = data;
            console.log(data);
        });
    };
    $scope.addSaleTemp = function(product, newsaletemp) {
        $http.post('/api/saletemp', { id: product.id,name: product.name, price: product.price,quantity: 1}).
        success(function(data, status, headers, config) {
            $scope.isiCart();
        });
    };
    $scope.sum = function(list) {
        var total=0;
        angular.forEach(list , function(newsaletemp){
            total+= parseFloat(newsaletemp.price * newsaletemp.quantity);
        });
        return total;
    };
    $scope.updateSaleTemp = function(newsaletemp) {

        $http.put('api/saletemp/' + newsaletemp.id, { quantity: newsaletemp.quantity}).
        success(function(data, status, headers, config) {

        });
    }
    $scope.removeSaleTemp = function(id) {
        $http.delete('api/saletemp/' + id).
        success(function(data, status, headers, config) {
            $http.get('api/saletemp').success(function(data) {
                $scope.saletemp = data;
            });
        });
    }
    $scope.isiCart();
}]);
