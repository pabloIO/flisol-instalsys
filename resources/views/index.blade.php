<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>FLISOL 2018</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <base href="/">
    <link href="/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  </head>
  <body ng-app="flisolApp">
    <div class="container-fluid">
        <div ui-view="header"></div>
        <div ui-view="content"></div>
        <div ui-view="footer"></div>
        <div ui-view="user-header"></div>
        <div ui-view="user-content"></div>
        <div ui-view="user-footer"></div>
    </div>
        <script src="/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="/bower_components/angular/angular.min.js"></script>
        <script src="/bower_components/angular-ui-router/release/angular-ui-router.min.js"></script>
        <!-- <script src="/bower_components/angular-touch/angular-touch.min.js"></script> -->
        <script src="/bower_components/angular-local-storage/dist/angular-local-storage.min.js"></script>
        <script src="/app/scripts/app.js"></script>
        <script src="/app/scripts/services/Auth.js"></script>
        <script src="/app/scripts/services/Computer.js"></script>
        <script src="/app/scripts/controllers/public/LoginCtrl.js"></script>
        <script src="/app/scripts/controllers/user/DashboardUserCtrl.js"></script>
        <script src="/app/scripts/controllers/user/LogoutCtrl.js"></script>
        <!-- endbuild -->
</body>
</html>
