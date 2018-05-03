
Opal.modules["ArrayExt"] = function (Opal) {
	var self = Opal.top, $scope = Opal, nil = Opal.nil, $breaker = Opal.breaker, $slice = Opal.slice, $klass = Opal.klass, $module = Opal.module;
	return (function($base) {
		var Array, self = Array = $scope.get('Array');
		
		Opal.defn(self, "$Count", function () {
			var self = this;
			return self.length;
		});
	})($scope.base, null);
}