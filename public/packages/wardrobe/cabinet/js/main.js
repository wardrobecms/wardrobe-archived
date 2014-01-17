function PostsController($scope, $http) {

  $http.get('/api/post').success(function(posts) {
    $scope.posts = posts;
  });

}

