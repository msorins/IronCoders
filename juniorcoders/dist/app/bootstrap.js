System.register(['angular2/platform/browser', 'angular2/core', 'angular2/common', 'angular2/router', './components/app/AppComponent'], function(exports_1) {
    var browser_1, core_1, common_1, router_1, AppComponent_1;
    return {
        setters:[
            function (browser_1_1) {
                browser_1 = browser_1_1;
            },
            function (core_1_1) {
                core_1 = core_1_1;
            },
            function (common_1_1) {
                common_1 = common_1_1;
            },
            function (router_1_1) {
                router_1 = router_1_1;
            },
            function (AppComponent_1_1) {
                AppComponent_1 = AppComponent_1_1;
            }],
        execute: function() {
            browser_1.bootstrap(AppComponent_1.AppComponent, [
                router_1.ROUTER_PROVIDERS,
                common_1.CORE_DIRECTIVES,
                core_1.provide(router_1.LocationStrategy, { useClass: router_1.PathLocationStrategy })
            ]);
        }
    }
});

//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFwcC9ib290c3RyYXAudHMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7WUFNQSxtQkFBUyxDQUFDLDJCQUFZLEVBQUU7Z0JBQ3BCLHlCQUFnQjtnQkFDaEIsd0JBQWU7Z0JBQ2YsY0FBTyxDQUFDLHlCQUFnQixFQUFFLEVBQUMsUUFBUSxFQUFFLDZCQUFvQixFQUFDLENBQUM7YUFDOUQsQ0FBQyxDQUFDIiwiZmlsZSI6ImFwcC9ib290c3RyYXAuanMiLCJzb3VyY2VzQ29udGVudCI6WyJpbXBvcnQge2Jvb3RzdHJhcH0gICAgZnJvbSAnYW5ndWxhcjIvcGxhdGZvcm0vYnJvd3NlcidcbmltcG9ydCB7cHJvdmlkZX0gICAgZnJvbSAnYW5ndWxhcjIvY29yZSdcbmltcG9ydCB7Q09SRV9ESVJFQ1RJVkVTfSBmcm9tICdhbmd1bGFyMi9jb21tb24nXG5pbXBvcnQge1JPVVRFUl9CSU5ESU5HUywgUk9VVEVSX1BST1ZJREVSUywgTG9jYXRpb25TdHJhdGVneSwgUGF0aExvY2F0aW9uU3RyYXRlZ3l9IGZyb20gJ2FuZ3VsYXIyL3JvdXRlcidcblxuaW1wb3J0IHtBcHBDb21wb25lbnR9IGZyb20gJy4vY29tcG9uZW50cy9hcHAvQXBwQ29tcG9uZW50J1xuYm9vdHN0cmFwKEFwcENvbXBvbmVudCwgW1xuICAgIFJPVVRFUl9QUk9WSURFUlMsXG4gICAgQ09SRV9ESVJFQ1RJVkVTLFxuICAgIHByb3ZpZGUoTG9jYXRpb25TdHJhdGVneSwge3VzZUNsYXNzOiBQYXRoTG9jYXRpb25TdHJhdGVneX0pXG5dKTtcblxuIl0sInNvdXJjZVJvb3QiOiIvc291cmNlLyJ9
