app.factory('product', ['$http', function($http) {
    return {
        getAll : function () {
            return $http.get('/api/product')
                .success(function(data) {
                    return data;
                })
                .error(function(err) {
                    return err;
                });
        },
    }
}]);
