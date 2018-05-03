Opal.modules["Guid"] = function(Opal) {
  Opal.dynamic_require_severity = "warning";
  var OPAL_CONFIG = { method_missing: true, arity_check: false, freezing: true, tainting: true };
  function $rb_gt(lhs, rhs) {
    return (typeof(lhs) === 'number' && typeof(rhs) === 'number') ? lhs > rhs : lhs['$>'](rhs);
  }
  function $rb_plus(lhs, rhs) {
    return (typeof(lhs) === 'number' && typeof(rhs) === 'number') ? lhs + rhs : lhs['$+'](rhs);
  }
  function $rb_minus(lhs, rhs) {
    return (typeof(lhs) === 'number' && typeof(rhs) === 'number') ? lhs - rhs : lhs['$-'](rhs);
  }
  var self = Opal.top, $scope = Opal, nil = Opal.nil, $breaker = Opal.breaker, $slice = Opal.slice, $klass = Opal.klass;

  Opal.add_stubs(['$include', '$<=>', '$nonzero?', '$d', '$zero?', '$new', '$class', '$to_s']);
  return (function($base, $super) {
    function $Guid(){};
    var self = $Guid = $klass($base, $super, 'Guid', $Guid);

    var def = self.$$proto, $scope = self.$$scope;

    def.guid = nil;

    (function(self) {
      var $scope = self.$$scope, def = self.$$proto;

	    
	  Opal.defn(self, '$Parse', function(string) {
        var self = this;
		
        return string;
      });
	  	  
      return (Opal.defn(self, '$NewGuid', function() {
        var self = this;

        return window.Guid.create();
      }), nil) && '$NewGuid'; 
	  
    })(Opal.get_singleton_class(self));
  
  })($scope.base, null)
};