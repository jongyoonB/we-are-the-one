var App = angular.module('ChatRoom',['ngResource','ngRoute','ngStorage','socket.io','ngFileUpload','Controllers','Services'])
.run(["$rootScope", function ($rootScope){
	$rootScope.baseUrl = 'http://jycom.asuscomm.com:3000'; //Application URL
}]);

App.config(function ($routeProvider, $socketProvider){
	$socketProvider.setConnectionUrl('http://jycom.asuscomm.com:3000'); // Socket URL

	$routeProvider	// AngularJS Routes
	.when('/v1/:room', {
		templateUrl: 'app/views/login.html',
		controller: 'loginCtrl'
	})
	.when('/v1/ChatRoom/:room', {
		templateUrl: 'app/views/chatRoom.html',
		controller: 'chatRoomCtrl'
	})
	.otherwise({		
        redirectTo: '/v1/:room'	// Default Route
    });
});
