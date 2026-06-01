
```
codeigniter4-framework-v4.7.0-0-ge7753bc
└─ codeigniter4-framework-e7753bc
   ├─ .env
   ├─ app
   │  ├─ .htaccess
   │  ├─ Common.php
   │  ├─ Config
   │  │  ├─ App.php
   │  │  ├─ Autoload.php
   │  │  ├─ Boot
   │  │  │  ├─ development.php
   │  │  │  ├─ production.php
   │  │  │  └─ testing.php
   │  │  ├─ Cache.php
   │  │  ├─ Constants.php
   │  │  ├─ ContentSecurityPolicy.php
   │  │  ├─ Cookie.php
   │  │  ├─ Cors.php
   │  │  ├─ CURLRequest.php
   │  │  ├─ Database.php
   │  │  ├─ DocTypes.php
   │  │  ├─ Email.php
   │  │  ├─ Encryption.php
   │  │  ├─ Events.php
   │  │  ├─ Exceptions.php
   │  │  ├─ Feature.php
   │  │  ├─ Filters.php
   │  │  ├─ ForeignCharacters.php
   │  │  ├─ Format.php
   │  │  ├─ Generators.php
   │  │  ├─ Honeypot.php
   │  │  ├─ Hostnames.php
   │  │  ├─ Images.php
   │  │  ├─ Kint.php
   │  │  ├─ Logger.php
   │  │  ├─ Migrations.php
   │  │  ├─ Mimes.php
   │  │  ├─ Modules.php
   │  │  ├─ Optimize.php
   │  │  ├─ Pager.php
   │  │  ├─ Paths.php
   │  │  ├─ Publisher.php
   │  │  ├─ Routes.php
   │  │  ├─ Routing.php
   │  │  ├─ Security.php
   │  │  ├─ Services.php
   │  │  ├─ Session.php
   │  │  ├─ Toolbar.php
   │  │  ├─ UserAgents.php
   │  │  ├─ Validation.php
   │  │  ├─ View.php
   │  │  └─ WorkerMode.php
   │  ├─ Controllers
   │  │  ├─ AuthController.php
   │  │  ├─ BaseController.php
   │  │  ├─ Home.php
   │  │  ├─ TaskController.php
   │  │  └─ Trackwise
   │  │     ├─ Analytics.php
   │  │     ├─ Auth.php
   │  │     ├─ BaseTrackwiseController.php
   │  │     ├─ Dashboard.php
   │  │     ├─ Goals.php
   │  │     ├─ Notifications.php
   │  │     ├─ Planner.php
   │  │     ├─ Profile.php
   │  │     ├─ Security.php
   │  │     ├─ StudyLog.php
   │  │     ├─ Techniques.php
   │  │     ├─ Uploads.php
   │  │     └─ Welcome.php
   │  ├─ Database
   │  │  ├─ Migrations
   │  │  │  ├─ 2026-05-31-100000_CreateStudySessionsTable.php
   │  │  │  ├─ 2026-05-31-100001_AddEmailToUsers.php
   │  │  │  └─ 2026-05-31-120000_CreateGoalsTable.php
   │  │  ├─ Seeds
   │  │  └─ trackwise_setup.sql
   │  ├─ Filters
   │  ├─ Helpers
   │  ├─ index.html
   │  ├─ Language
   │  │  └─ en
   │  │     └─ Validation.php
   │  ├─ Libraries
   │  ├─ Models
   │  │  ├─ TaskModel.php
   │  │  ├─ Trackwise
   │  │  │  ├─ GoalModel.php
   │  │  │  ├─ NotificationModel.php
   │  │  │  ├─ PlannerModel.php
   │  │  │  ├─ ProfileModel.php
   │  │  │  ├─ StudySessionModel.php
   │  │  │  └─ TechniqueModel.php
   │  │  └─ UserModel.php
   │  ├─ ThirdParty
   │  └─ Views
   │     ├─ edit_task_view.php
   │     ├─ errors
   │     │  ├─ cli
   │     │  │  ├─ error_404.php
   │     │  │  ├─ error_exception.php
   │     │  │  └─ production.php
   │     │  └─ html
   │     │     ├─ debug.css
   │     │     ├─ debug.js
   │     │     ├─ error_400.php
   │     │     ├─ error_404.php
   │     │     ├─ error_exception.php
   │     │     └─ production.php
   │     ├─ login_view.php
   │     ├─ register_view.php
   │     ├─ tasks_view.php
   │     ├─ trackwise
   │     │  ├─ analytics
   │     │  │  └─ index.php
   │     │  ├─ auth
   │     │  │  ├─ forgot_password.php
   │     │  │  ├─ login.php
   │     │  │  └─ register.php
   │     │  ├─ dashboard
   │     │  │  └─ index.php
   │     │  ├─ goals
   │     │  │  ├─ create.php
   │     │  │  └─ index.php
   │     │  ├─ layouts
   │     │  │  ├─ app.php
   │     │  │  └─ auth.php
   │     │  ├─ notifications
   │     │  │  └─ index.php
   │     │  ├─ partials
   │     │  │  ├─ bottom_nav.php
   │     │  │  ├─ clouds.php
   │     │  │  ├─ logo.php
   │     │  │  └─ sidebar.php
   │     │  ├─ planner
   │     │  │  └─ index.php
   │     │  ├─ profile
   │     │  │  └─ index.php
   │     │  ├─ security
   │     │  │  └─ index.php
   │     │  ├─ studylog
   │     │  │  └─ index.php
   │     │  ├─ techniques
   │     │  │  └─ index.php
   │     │  └─ welcome
   │     │     └─ index.php
   │     └─ welcome_message.php
   ├─ composer.json
   ├─ docs
   │  ├─ DEPLOYMENT_LOG.md
   │  ├─ env.production.example
   │  ├─ PRESENTATION_SCRIPT.md
   │  └─ SECURITY_REPORT.md
   ├─ LICENSE
   ├─ phpunit.xml.dist
   ├─ preload.php
   ├─ public
   │  ├─ .htaccess
   │  ├─ favicon.ico
   │  ├─ index.php
   │  ├─ robots.txt
   │  └─ trackwise
   │     ├─ css
   │     │  └─ trackwise.css
   │     └─ js
   │        ├─ studylog.js
   │        └─ timer.js
   ├─ README.md
   ├─ spark
   ├─ start-server.bat
   ├─ system
   │  ├─ .htaccess
   │  ├─ API
   │  │  ├─ ApiException.php
   │  │  ├─ BaseTransformer.php
   │  │  ├─ ResponseTrait.php
   │  │  └─ TransformerInterface.php
   │  ├─ Autoloader
   │  │  ├─ Autoloader.php
   │  │  ├─ FileLocator.php
   │  │  ├─ FileLocatorCached.php
   │  │  └─ FileLocatorInterface.php
   │  ├─ BaseModel.php
   │  ├─ Boot.php
   │  ├─ bootstrap.php
   │  ├─ Cache
   │  │  ├─ CacheFactory.php
   │  │  ├─ CacheInterface.php
   │  │  ├─ Exceptions
   │  │  │  └─ CacheException.php
   │  │  ├─ FactoriesCache
   │  │  │  └─ FileVarExportHandler.php
   │  │  ├─ FactoriesCache.php
   │  │  ├─ Handlers
   │  │  │  ├─ ApcuHandler.php
   │  │  │  ├─ BaseHandler.php
   │  │  │  ├─ DummyHandler.php
   │  │  │  ├─ FileHandler.php
   │  │  │  ├─ MemcachedHandler.php
   │  │  │  ├─ PredisHandler.php
   │  │  │  ├─ RedisHandler.php
   │  │  │  └─ WincacheHandler.php
   │  │  └─ ResponseCache.php
   │  ├─ CLI
   │  │  ├─ BaseCommand.php
   │  │  ├─ CLI.php
   │  │  ├─ Commands.php
   │  │  ├─ Console.php
   │  │  ├─ Exceptions
   │  │  │  └─ CLIException.php
   │  │  ├─ GeneratorTrait.php
   │  │  ├─ InputOutput.php
   │  │  └─ SignalTrait.php
   │  ├─ CodeIgniter.php
   │  ├─ Commands
   │  │  ├─ Cache
   │  │  │  ├─ ClearCache.php
   │  │  │  └─ InfoCache.php
   │  │  ├─ Database
   │  │  │  ├─ CreateDatabase.php
   │  │  │  ├─ Migrate.php
   │  │  │  ├─ MigrateRefresh.php
   │  │  │  ├─ MigrateRollback.php
   │  │  │  ├─ MigrateStatus.php
   │  │  │  ├─ Seed.php
   │  │  │  └─ ShowTableInfo.php
   │  │  ├─ Encryption
   │  │  │  └─ GenerateKey.php
   │  │  ├─ Generators
   │  │  │  ├─ CellGenerator.php
   │  │  │  ├─ CommandGenerator.php
   │  │  │  ├─ ConfigGenerator.php
   │  │  │  ├─ ControllerGenerator.php
   │  │  │  ├─ EntityGenerator.php
   │  │  │  ├─ FilterGenerator.php
   │  │  │  ├─ MigrationGenerator.php
   │  │  │  ├─ ModelGenerator.php
   │  │  │  ├─ ScaffoldGenerator.php
   │  │  │  ├─ SeederGenerator.php
   │  │  │  ├─ TestGenerator.php
   │  │  │  ├─ TransformerGenerator.php
   │  │  │  ├─ ValidationGenerator.php
   │  │  │  └─ Views
   │  │  │     ├─ cell.tpl.php
   │  │  │     ├─ cell_view.tpl.php
   │  │  │     ├─ command.tpl.php
   │  │  │     ├─ config.tpl.php
   │  │  │     ├─ controller.tpl.php
   │  │  │     ├─ entity.tpl.php
   │  │  │     ├─ filter.tpl.php
   │  │  │     ├─ migration.tpl.php
   │  │  │     ├─ model.tpl.php
   │  │  │     ├─ seeder.tpl.php
   │  │  │     ├─ test.tpl.php
   │  │  │     ├─ transformer.tpl.php
   │  │  │     └─ validation.tpl.php
   │  │  ├─ Help.php
   │  │  ├─ Housekeeping
   │  │  │  ├─ ClearDebugbar.php
   │  │  │  └─ ClearLogs.php
   │  │  ├─ ListCommands.php
   │  │  ├─ Server
   │  │  │  └─ Serve.php
   │  │  ├─ Translation
   │  │  │  ├─ LocalizationFinder.php
   │  │  │  └─ LocalizationSync.php
   │  │  ├─ Utilities
   │  │  │  ├─ ConfigCheck.php
   │  │  │  ├─ Environment.php
   │  │  │  ├─ FilterCheck.php
   │  │  │  ├─ Namespaces.php
   │  │  │  ├─ Optimize.php
   │  │  │  ├─ PhpIniCheck.php
   │  │  │  ├─ Publish.php
   │  │  │  ├─ Routes
   │  │  │  │  ├─ AutoRouteCollector.php
   │  │  │  │  ├─ AutoRouterImproved
   │  │  │  │  │  ├─ AutoRouteCollector.php
   │  │  │  │  │  └─ ControllerMethodReader.php
   │  │  │  │  ├─ ControllerFinder.php
   │  │  │  │  ├─ ControllerMethodReader.php
   │  │  │  │  ├─ FilterCollector.php
   │  │  │  │  ├─ FilterFinder.php
   │  │  │  │  └─ SampleURIGenerator.php
   │  │  │  └─ Routes.php
   │  │  └─ Worker
   │  │     ├─ Views
   │  │     │  ├─ Caddyfile.tpl
   │  │     │  └─ frankenphp-worker.php.tpl
   │  │     ├─ WorkerInstall.php
   │  │     └─ WorkerUninstall.php
   │  ├─ Common.php
   │  ├─ ComposerScripts.php
   │  ├─ Config
   │  │  ├─ AutoloadConfig.php
   │  │  ├─ BaseConfig.php
   │  │  ├─ BaseService.php
   │  │  ├─ DotEnv.php
   │  │  ├─ Factories.php
   │  │  ├─ Factory.php
   │  │  ├─ Filters.php
   │  │  ├─ ForeignCharacters.php
   │  │  ├─ Publisher.php
   │  │  ├─ Routing.php
   │  │  ├─ Services.php
   │  │  └─ View.php
   │  ├─ Controller.php
   │  ├─ Cookie
   │  │  ├─ CloneableCookieInterface.php
   │  │  ├─ Cookie.php
   │  │  ├─ CookieInterface.php
   │  │  ├─ CookieStore.php
   │  │  └─ Exceptions
   │  │     └─ CookieException.php
   │  ├─ Database
   │  │  ├─ BaseBuilder.php
   │  │  ├─ BaseConnection.php
   │  │  ├─ BasePreparedQuery.php
   │  │  ├─ BaseResult.php
   │  │  ├─ BaseUtils.php
   │  │  ├─ Config.php
   │  │  ├─ ConnectionInterface.php
   │  │  ├─ Database.php
   │  │  ├─ Exceptions
   │  │  │  ├─ DatabaseException.php
   │  │  │  ├─ DataException.php
   │  │  │  └─ ExceptionInterface.php
   │  │  ├─ Forge.php
   │  │  ├─ Migration.php
   │  │  ├─ MigrationRunner.php
   │  │  ├─ MySQLi
   │  │  │  ├─ Builder.php
   │  │  │  ├─ Connection.php
   │  │  │  ├─ Forge.php
   │  │  │  ├─ PreparedQuery.php
   │  │  │  ├─ Result.php
   │  │  │  └─ Utils.php
   │  │  ├─ OCI8
   │  │  │  ├─ Builder.php
   │  │  │  ├─ Connection.php
   │  │  │  ├─ Forge.php
   │  │  │  ├─ PreparedQuery.php
   │  │  │  ├─ Result.php
   │  │  │  └─ Utils.php
   │  │  ├─ Postgre
   │  │  │  ├─ Builder.php
   │  │  │  ├─ Connection.php
   │  │  │  ├─ Forge.php
   │  │  │  ├─ PreparedQuery.php
   │  │  │  ├─ Result.php
   │  │  │  └─ Utils.php
   │  │  ├─ PreparedQueryInterface.php
   │  │  ├─ Query.php
   │  │  ├─ QueryInterface.php
   │  │  ├─ RawSql.php
   │  │  ├─ ResultInterface.php
   │  │  ├─ Seeder.php
   │  │  ├─ SQLite3
   │  │  │  ├─ Builder.php
   │  │  │  ├─ Connection.php
   │  │  │  ├─ Forge.php
   │  │  │  ├─ PreparedQuery.php
   │  │  │  ├─ Result.php
   │  │  │  ├─ Table.php
   │  │  │  └─ Utils.php
   │  │  ├─ SQLSRV
   │  │  │  ├─ Builder.php
   │  │  │  ├─ Connection.php
   │  │  │  ├─ Forge.php
   │  │  │  ├─ PreparedQuery.php
   │  │  │  ├─ Result.php
   │  │  │  └─ Utils.php
   │  │  └─ TableName.php
   │  ├─ DataCaster
   │  │  ├─ Cast
   │  │  │  ├─ ArrayCast.php
   │  │  │  ├─ BaseCast.php
   │  │  │  ├─ BooleanCast.php
   │  │  │  ├─ CastInterface.php
   │  │  │  ├─ CSVCast.php
   │  │  │  ├─ DatetimeCast.php
   │  │  │  ├─ EnumCast.php
   │  │  │  ├─ FloatCast.php
   │  │  │  ├─ IntBoolCast.php
   │  │  │  ├─ IntegerCast.php
   │  │  │  ├─ JsonCast.php
   │  │  │  ├─ TimestampCast.php
   │  │  │  └─ URICast.php
   │  │  ├─ DataCaster.php
   │  │  └─ Exceptions
   │  │     └─ CastException.php
   │  ├─ DataConverter
   │  │  └─ DataConverter.php
   │  ├─ Debug
   │  │  ├─ BaseExceptionHandler.php
   │  │  ├─ ExceptionHandler.php
   │  │  ├─ ExceptionHandlerInterface.php
   │  │  ├─ Exceptions.php
   │  │  ├─ Iterator.php
   │  │  ├─ Timer.php
   │  │  ├─ Toolbar
   │  │  │  ├─ Collectors
   │  │  │  │  ├─ BaseCollector.php
   │  │  │  │  ├─ Config.php
   │  │  │  │  ├─ Database.php
   │  │  │  │  ├─ Events.php
   │  │  │  │  ├─ Files.php
   │  │  │  │  ├─ History.php
   │  │  │  │  ├─ Logs.php
   │  │  │  │  ├─ Routes.php
   │  │  │  │  ├─ Timers.php
   │  │  │  │  └─ Views.php
   │  │  │  └─ Views
   │  │  │     ├─ toolbar.css
   │  │  │     ├─ toolbar.js
   │  │  │     ├─ toolbar.tpl.php
   │  │  │     ├─ toolbarloader.js
   │  │  │     ├─ _config.tpl
   │  │  │     ├─ _database.tpl
   │  │  │     ├─ _events.tpl
   │  │  │     ├─ _files.tpl
   │  │  │     ├─ _history.tpl
   │  │  │     ├─ _logs.tpl
   │  │  │     └─ _routes.tpl
   │  │  └─ Toolbar.php
   │  ├─ Email
   │  │  └─ Email.php
   │  ├─ Encryption
   │  │  ├─ EncrypterInterface.php
   │  │  ├─ Encryption.php
   │  │  ├─ Exceptions
   │  │  │  └─ EncryptionException.php
   │  │  ├─ Handlers
   │  │  │  ├─ BaseHandler.php
   │  │  │  ├─ OpenSSLHandler.php
   │  │  │  └─ SodiumHandler.php
   │  │  └─ KeyRotationDecorator.php
   │  ├─ Entity
   │  │  ├─ Cast
   │  │  │  ├─ ArrayCast.php
   │  │  │  ├─ BaseCast.php
   │  │  │  ├─ BooleanCast.php
   │  │  │  ├─ CastInterface.php
   │  │  │  ├─ CSVCast.php
   │  │  │  ├─ DatetimeCast.php
   │  │  │  ├─ EnumCast.php
   │  │  │  ├─ FloatCast.php
   │  │  │  ├─ IntBoolCast.php
   │  │  │  ├─ IntegerCast.php
   │  │  │  ├─ JsonCast.php
   │  │  │  ├─ ObjectCast.php
   │  │  │  ├─ StringCast.php
   │  │  │  ├─ TimestampCast.php
   │  │  │  └─ URICast.php
   │  │  ├─ Entity.php
   │  │  └─ Exceptions
   │  │     └─ CastException.php
   │  ├─ Events
   │  │  └─ Events.php
   │  ├─ Exceptions
   │  │  ├─ BadFunctionCallException.php
   │  │  ├─ BadMethodCallException.php
   │  │  ├─ ConfigException.php
   │  │  ├─ CriticalError.php
   │  │  ├─ DebugTraceableTrait.php
   │  │  ├─ DownloadException.php
   │  │  ├─ ExceptionInterface.php
   │  │  ├─ FrameworkException.php
   │  │  ├─ HasExitCodeInterface.php
   │  │  ├─ HTTPExceptionInterface.php
   │  │  ├─ InvalidArgumentException.php
   │  │  ├─ LogicException.php
   │  │  ├─ ModelException.php
   │  │  ├─ PageNotFoundException.php
   │  │  ├─ RuntimeException.php
   │  │  └─ TestException.php
   │  ├─ Files
   │  │  ├─ Exceptions
   │  │  │  ├─ ExceptionInterface.php
   │  │  │  ├─ FileException.php
   │  │  │  └─ FileNotFoundException.php
   │  │  ├─ File.php
   │  │  ├─ FileCollection.php
   │  │  └─ FileSizeUnit.php
   │  ├─ Filters
   │  │  ├─ Cors.php
   │  │  ├─ CSRF.php
   │  │  ├─ DebugToolbar.php
   │  │  ├─ Exceptions
   │  │  │  └─ FilterException.php
   │  │  ├─ FilterInterface.php
   │  │  ├─ Filters.php
   │  │  ├─ ForceHTTPS.php
   │  │  ├─ Honeypot.php
   │  │  ├─ InvalidChars.php
   │  │  ├─ PageCache.php
   │  │  ├─ PerformanceMetrics.php
   │  │  └─ SecureHeaders.php
   │  ├─ Format
   │  │  ├─ Exceptions
   │  │  │  └─ FormatException.php
   │  │  ├─ Format.php
   │  │  ├─ FormatterInterface.php
   │  │  ├─ JSONFormatter.php
   │  │  └─ XMLFormatter.php
   │  ├─ Helpers
   │  │  ├─ Array
   │  │  │  └─ ArrayHelper.php
   │  │  ├─ array_helper.php
   │  │  ├─ cookie_helper.php
   │  │  ├─ date_helper.php
   │  │  ├─ filesystem_helper.php
   │  │  ├─ form_helper.php
   │  │  ├─ html_helper.php
   │  │  ├─ inflector_helper.php
   │  │  ├─ kint_helper.php
   │  │  ├─ number_helper.php
   │  │  ├─ security_helper.php
   │  │  ├─ test_helper.php
   │  │  ├─ text_helper.php
   │  │  ├─ url_helper.php
   │  │  └─ xml_helper.php
   │  ├─ Honeypot
   │  │  ├─ Exceptions
   │  │  │  └─ HoneypotException.php
   │  │  └─ Honeypot.php
   │  ├─ HotReloader
   │  │  ├─ DirectoryHasher.php
   │  │  ├─ HotReloader.php
   │  │  └─ IteratorFilter.php
   │  ├─ HTTP
   │  │  ├─ CLIRequest.php
   │  │  ├─ ContentSecurityPolicy.php
   │  │  ├─ Cors.php
   │  │  ├─ CURLRequest.php
   │  │  ├─ DownloadResponse.php
   │  │  ├─ Exceptions
   │  │  │  ├─ BadRequestException.php
   │  │  │  ├─ ExceptionInterface.php
   │  │  │  ├─ HTTPException.php
   │  │  │  └─ RedirectException.php
   │  │  ├─ Files
   │  │  │  ├─ FileCollection.php
   │  │  │  ├─ UploadedFile.php
   │  │  │  └─ UploadedFileInterface.php
   │  │  ├─ Header.php
   │  │  ├─ IncomingRequest.php
   │  │  ├─ Message.php
   │  │  ├─ MessageInterface.php
   │  │  ├─ MessageTrait.php
   │  │  ├─ Method.php
   │  │  ├─ Negotiate.php
   │  │  ├─ OutgoingRequest.php
   │  │  ├─ OutgoingRequestInterface.php
   │  │  ├─ RedirectResponse.php
   │  │  ├─ Request.php
   │  │  ├─ RequestInterface.php
   │  │  ├─ RequestTrait.php
   │  │  ├─ ResponsableInterface.php
   │  │  ├─ Response.php
   │  │  ├─ ResponseInterface.php
   │  │  ├─ ResponseTrait.php
   │  │  ├─ SiteURI.php
   │  │  ├─ SiteURIFactory.php
   │  │  ├─ URI.php
   │  │  └─ UserAgent.php
   │  ├─ I18n
   │  │  ├─ Exceptions
   │  │  │  └─ I18nException.php
   │  │  ├─ Time.php
   │  │  ├─ TimeDifference.php
   │  │  ├─ TimeLegacy.php
   │  │  └─ TimeTrait.php
   │  ├─ Images
   │  │  ├─ Exceptions
   │  │  │  └─ ImageException.php
   │  │  ├─ Handlers
   │  │  │  ├─ BaseHandler.php
   │  │  │  ├─ GDHandler.php
   │  │  │  └─ ImageMagickHandler.php
   │  │  ├─ Image.php
   │  │  └─ ImageHandlerInterface.php
   │  ├─ index.html
   │  ├─ Language
   │  │  ├─ en
   │  │  │  ├─ Api.php
   │  │  │  ├─ Cache.php
   │  │  │  ├─ Cast.php
   │  │  │  ├─ CLI.php
   │  │  │  ├─ Cookie.php
   │  │  │  ├─ Core.php
   │  │  │  ├─ Database.php
   │  │  │  ├─ Email.php
   │  │  │  ├─ Encryption.php
   │  │  │  ├─ Errors.php
   │  │  │  ├─ Fabricator.php
   │  │  │  ├─ Files.php
   │  │  │  ├─ Filters.php
   │  │  │  ├─ Format.php
   │  │  │  ├─ Honeypot.php
   │  │  │  ├─ HTTP.php
   │  │  │  ├─ Images.php
   │  │  │  ├─ Language.php
   │  │  │  ├─ Log.php
   │  │  │  ├─ Migrations.php
   │  │  │  ├─ Number.php
   │  │  │  ├─ Pager.php
   │  │  │  ├─ Publisher.php
   │  │  │  ├─ RESTful.php
   │  │  │  ├─ Router.php
   │  │  │  ├─ Security.php
   │  │  │  ├─ Session.php
   │  │  │  ├─ Test.php
   │  │  │  ├─ Time.php
   │  │  │  ├─ Validation.php
   │  │  │  └─ View.php
   │  │  └─ Language.php
   │  ├─ Log
   │  │  ├─ Exceptions
   │  │  │  └─ LogException.php
   │  │  ├─ Handlers
   │  │  │  ├─ BaseHandler.php
   │  │  │  ├─ ChromeLoggerHandler.php
   │  │  │  ├─ ErrorlogHandler.php
   │  │  │  ├─ FileHandler.php
   │  │  │  └─ HandlerInterface.php
   │  │  └─ Logger.php
   │  ├─ Model.php
   │  ├─ Modules
   │  │  └─ Modules.php
   │  ├─ Pager
   │  │  ├─ Exceptions
   │  │  │  └─ PagerException.php
   │  │  ├─ Pager.php
   │  │  ├─ PagerInterface.php
   │  │  ├─ PagerRenderer.php
   │  │  └─ Views
   │  │     ├─ default_full.php
   │  │     ├─ default_head.php
   │  │     └─ default_simple.php
   │  ├─ Publisher
   │  │  ├─ ContentReplacer.php
   │  │  ├─ Exceptions
   │  │  │  └─ PublisherException.php
   │  │  └─ Publisher.php
   │  ├─ RESTful
   │  │  ├─ BaseResource.php
   │  │  ├─ ResourceController.php
   │  │  └─ ResourcePresenter.php
   │  ├─ rewrite.php
   │  ├─ Router
   │  │  ├─ Attributes
   │  │  │  ├─ Cache.php
   │  │  │  ├─ Filter.php
   │  │  │  ├─ Restrict.php
   │  │  │  └─ RouteAttributeInterface.php
   │  │  ├─ AutoRouter.php
   │  │  ├─ AutoRouterImproved.php
   │  │  ├─ AutoRouterInterface.php
   │  │  ├─ DefinedRouteCollector.php
   │  │  ├─ Exceptions
   │  │  │  ├─ ExceptionInterface.php
   │  │  │  ├─ MethodNotFoundException.php
   │  │  │  └─ RouterException.php
   │  │  ├─ RouteCollection.php
   │  │  ├─ RouteCollectionInterface.php
   │  │  ├─ Router.php
   │  │  └─ RouterInterface.php
   │  ├─ Security
   │  │  ├─ CheckPhpIni.php
   │  │  ├─ Exceptions
   │  │  │  └─ SecurityException.php
   │  │  ├─ Security.php
   │  │  └─ SecurityInterface.php
   │  ├─ Session
   │  │  ├─ Exceptions
   │  │  │  └─ SessionException.php
   │  │  ├─ Handlers
   │  │  │  ├─ ArrayHandler.php
   │  │  │  ├─ BaseHandler.php
   │  │  │  ├─ Database
   │  │  │  │  ├─ MySQLiHandler.php
   │  │  │  │  └─ PostgreHandler.php
   │  │  │  ├─ DatabaseHandler.php
   │  │  │  ├─ FileHandler.php
   │  │  │  ├─ MemcachedHandler.php
   │  │  │  └─ RedisHandler.php
   │  │  ├─ PersistsConnection.php
   │  │  ├─ Session.php
   │  │  └─ SessionInterface.php
   │  ├─ Superglobals.php
   │  ├─ Test
   │  │  ├─ bootstrap.php
   │  │  ├─ CIUnitTestCase.php
   │  │  ├─ ConfigFromArrayTrait.php
   │  │  ├─ Constraints
   │  │  │  └─ SeeInDatabase.php
   │  │  ├─ ControllerTestTrait.php
   │  │  ├─ DatabaseTestTrait.php
   │  │  ├─ DOMParser.php
   │  │  ├─ Fabricator.php
   │  │  ├─ FeatureTestTrait.php
   │  │  ├─ Filters
   │  │  │  └─ CITestStreamFilter.php
   │  │  ├─ FilterTestTrait.php
   │  │  ├─ IniTestTrait.php
   │  │  ├─ Interfaces
   │  │  │  └─ FabricatorModel.php
   │  │  ├─ Mock
   │  │  │  ├─ MockAppConfig.php
   │  │  │  ├─ MockAutoload.php
   │  │  │  ├─ MockBuilder.php
   │  │  │  ├─ MockCache.php
   │  │  │  ├─ MockCLIConfig.php
   │  │  │  ├─ MockCodeIgniter.php
   │  │  │  ├─ MockCommon.php
   │  │  │  ├─ MockConnection.php
   │  │  │  ├─ MockCURLRequest.php
   │  │  │  ├─ MockEmail.php
   │  │  │  ├─ MockEvents.php
   │  │  │  ├─ MockFileLogger.php
   │  │  │  ├─ MockIncomingRequest.php
   │  │  │  ├─ MockInputOutput.php
   │  │  │  ├─ MockLanguage.php
   │  │  │  ├─ MockLogger.php
   │  │  │  ├─ MockQuery.php
   │  │  │  ├─ MockResourceController.php
   │  │  │  ├─ MockResourcePresenter.php
   │  │  │  ├─ MockResponse.php
   │  │  │  ├─ MockResult.php
   │  │  │  ├─ MockSecurity.php
   │  │  │  ├─ MockServices.php
   │  │  │  ├─ MockSession.php
   │  │  │  └─ MockTable.php
   │  │  ├─ PhpStreamWrapper.php
   │  │  ├─ ReflectionHelper.php
   │  │  ├─ StreamFilterTrait.php
   │  │  ├─ TestLogger.php
   │  │  ├─ TestResponse.php
   │  │  └─ Utilities
   │  │     └─ NativeHeadersStack.php
   │  ├─ ThirdParty
   │  │  ├─ Escaper
   │  │  │  ├─ Escaper.php
   │  │  │  ├─ EscaperInterface.php
   │  │  │  ├─ Exception
   │  │  │  │  ├─ ExceptionInterface.php
   │  │  │  │  ├─ InvalidArgumentException.php
   │  │  │  │  └─ RuntimeException.php
   │  │  │  └─ LICENSE.md
   │  │  ├─ Kint
   │  │  │  ├─ CallFinder.php
   │  │  │  ├─ FacadeInterface.php
   │  │  │  ├─ init.php
   │  │  │  ├─ init_helpers.php
   │  │  │  ├─ Kint.php
   │  │  │  ├─ LICENSE
   │  │  │  ├─ Parser
   │  │  │  │  ├─ AbstractPlugin.php
   │  │  │  │  ├─ ArrayLimitPlugin.php
   │  │  │  │  ├─ ArrayObjectPlugin.php
   │  │  │  │  ├─ Base64Plugin.php
   │  │  │  │  ├─ BinaryPlugin.php
   │  │  │  │  ├─ BlacklistPlugin.php
   │  │  │  │  ├─ ClassHooksPlugin.php
   │  │  │  │  ├─ ClassMethodsPlugin.php
   │  │  │  │  ├─ ClassStaticsPlugin.php
   │  │  │  │  ├─ ClassStringsPlugin.php
   │  │  │  │  ├─ ClosurePlugin.php
   │  │  │  │  ├─ ColorPlugin.php
   │  │  │  │  ├─ ConstructablePluginInterface.php
   │  │  │  │  ├─ DateTimePlugin.php
   │  │  │  │  ├─ DomPlugin.php
   │  │  │  │  ├─ EnumPlugin.php
   │  │  │  │  ├─ FsPathPlugin.php
   │  │  │  │  ├─ HtmlPlugin.php
   │  │  │  │  ├─ IteratorPlugin.php
   │  │  │  │  ├─ JsonPlugin.php
   │  │  │  │  ├─ MicrotimePlugin.php
   │  │  │  │  ├─ MysqliPlugin.php
   │  │  │  │  ├─ Parser.php
   │  │  │  │  ├─ PluginBeginInterface.php
   │  │  │  │  ├─ PluginCompleteInterface.php
   │  │  │  │  ├─ PluginInterface.php
   │  │  │  │  ├─ ProfilePlugin.php
   │  │  │  │  ├─ ProxyPlugin.php
   │  │  │  │  ├─ SerializePlugin.php
   │  │  │  │  ├─ SimpleXMLElementPlugin.php
   │  │  │  │  ├─ SplFileInfoPlugin.php
   │  │  │  │  ├─ StreamPlugin.php
   │  │  │  │  ├─ TablePlugin.php
   │  │  │  │  ├─ ThrowablePlugin.php
   │  │  │  │  ├─ TimestampPlugin.php
   │  │  │  │  ├─ ToStringPlugin.php
   │  │  │  │  ├─ TracePlugin.php
   │  │  │  │  └─ XmlPlugin.php
   │  │  │  ├─ Renderer
   │  │  │  │  ├─ AbstractRenderer.php
   │  │  │  │  ├─ AssetRendererTrait.php
   │  │  │  │  ├─ CliRenderer.php
   │  │  │  │  ├─ ConstructableRendererInterface.php
   │  │  │  │  ├─ PlainRenderer.php
   │  │  │  │  ├─ RendererInterface.php
   │  │  │  │  ├─ Rich
   │  │  │  │  │  ├─ AbstractPlugin.php
   │  │  │  │  │  ├─ BinaryPlugin.php
   │  │  │  │  │  ├─ CallableDefinitionPlugin.php
   │  │  │  │  │  ├─ CallablePlugin.php
   │  │  │  │  │  ├─ ColorPlugin.php
   │  │  │  │  │  ├─ LockPlugin.php
   │  │  │  │  │  ├─ MicrotimePlugin.php
   │  │  │  │  │  ├─ PluginInterface.php
   │  │  │  │  │  ├─ ProfilePlugin.php
   │  │  │  │  │  ├─ SourcePlugin.php
   │  │  │  │  │  ├─ TablePlugin.php
   │  │  │  │  │  ├─ TabPluginInterface.php
   │  │  │  │  │  ├─ TraceFramePlugin.php
   │  │  │  │  │  └─ ValuePluginInterface.php
   │  │  │  │  ├─ RichRenderer.php
   │  │  │  │  ├─ Text
   │  │  │  │  │  ├─ AbstractPlugin.php
   │  │  │  │  │  ├─ LockPlugin.php
   │  │  │  │  │  ├─ MicrotimePlugin.php
   │  │  │  │  │  ├─ PluginInterface.php
   │  │  │  │  │  ├─ SplFileInfoPlugin.php
   │  │  │  │  │  └─ TracePlugin.php
   │  │  │  │  └─ TextRenderer.php
   │  │  │  ├─ resources
   │  │  │  │  └─ compiled
   │  │  │  │     ├─ aante-dark.css
   │  │  │  │     ├─ aante-light.css
   │  │  │  │     ├─ main.js
   │  │  │  │     ├─ original.css
   │  │  │  │     ├─ plain.css
   │  │  │  │     ├─ solarized-dark.css
   │  │  │  │     └─ solarized.css
   │  │  │  ├─ Utils.php
   │  │  │  └─ Value
   │  │  │     ├─ AbstractValue.php
   │  │  │     ├─ ArrayValue.php
   │  │  │     ├─ ClosedResourceValue.php
   │  │  │     ├─ ClosureValue.php
   │  │  │     ├─ ColorValue.php
   │  │  │     ├─ Context
   │  │  │     │  ├─ ArrayContext.php
   │  │  │     │  ├─ BaseContext.php
   │  │  │     │  ├─ ClassConstContext.php
   │  │  │     │  ├─ ClassDeclaredContext.php
   │  │  │     │  ├─ ClassOwnedContext.php
   │  │  │     │  ├─ ContextInterface.php
   │  │  │     │  ├─ DoubleAccessMemberContext.php
   │  │  │     │  ├─ MethodContext.php
   │  │  │     │  ├─ PropertyContext.php
   │  │  │     │  └─ StaticPropertyContext.php
   │  │  │     ├─ DateTimeValue.php
   │  │  │     ├─ DeclaredCallableBag.php
   │  │  │     ├─ DomNodeListValue.php
   │  │  │     ├─ DomNodeValue.php
   │  │  │     ├─ EnumValue.php
   │  │  │     ├─ FixedWidthValue.php
   │  │  │     ├─ FunctionValue.php
   │  │  │     ├─ InstanceValue.php
   │  │  │     ├─ MethodValue.php
   │  │  │     ├─ MicrotimeValue.php
   │  │  │     ├─ ParameterBag.php
   │  │  │     ├─ ParameterHoldingTrait.php
   │  │  │     ├─ Representation
   │  │  │     │  ├─ AbstractRepresentation.php
   │  │  │     │  ├─ BinaryRepresentation.php
   │  │  │     │  ├─ CallableDefinitionRepresentation.php
   │  │  │     │  ├─ ColorRepresentation.php
   │  │  │     │  ├─ ContainerRepresentation.php
   │  │  │     │  ├─ MicrotimeRepresentation.php
   │  │  │     │  ├─ ProfileRepresentation.php
   │  │  │     │  ├─ RepresentationInterface.php
   │  │  │     │  ├─ SourceRepresentation.php
   │  │  │     │  ├─ SplFileInfoRepresentation.php
   │  │  │     │  ├─ StringRepresentation.php
   │  │  │     │  ├─ TableRepresentation.php
   │  │  │     │  └─ ValueRepresentation.php
   │  │  │     ├─ ResourceValue.php
   │  │  │     ├─ SimpleXMLElementValue.php
   │  │  │     ├─ SplFileInfoValue.php
   │  │  │     ├─ StreamValue.php
   │  │  │     ├─ StringValue.php
   │  │  │     ├─ ThrowableValue.php
   │  │  │     ├─ TraceFrameValue.php
   │  │  │     ├─ TraceValue.php
   │  │  │     ├─ UninitializedValue.php
   │  │  │     ├─ UnknownValue.php
   │  │  │     └─ VirtualValue.php
   │  │  └─ PSR
   │  │     └─ Log
   │  │        ├─ AbstractLogger.php
   │  │        ├─ InvalidArgumentException.php
   │  │        ├─ LICENSE
   │  │        ├─ LoggerAwareInterface.php
   │  │        ├─ LoggerAwareTrait.php
   │  │        ├─ LoggerInterface.php
   │  │        ├─ LoggerTrait.php
   │  │        ├─ LogLevel.php
   │  │        └─ NullLogger.php
   │  ├─ Throttle
   │  │  ├─ Throttler.php
   │  │  └─ ThrottlerInterface.php
   │  ├─ Traits
   │  │  ├─ ConditionalTrait.php
   │  │  └─ PropertiesTrait.php
   │  ├─ Typography
   │  │  └─ Typography.php
   │  ├─ util_bootstrap.php
   │  ├─ Validation
   │  │  ├─ CreditCardRules.php
   │  │  ├─ DotArrayFilter.php
   │  │  ├─ Exceptions
   │  │  │  └─ ValidationException.php
   │  │  ├─ FileRules.php
   │  │  ├─ FormatRules.php
   │  │  ├─ Rules.php
   │  │  ├─ StrictRules
   │  │  │  ├─ CreditCardRules.php
   │  │  │  ├─ FileRules.php
   │  │  │  ├─ FormatRules.php
   │  │  │  └─ Rules.php
   │  │  ├─ Validation.php
   │  │  ├─ ValidationInterface.php
   │  │  └─ Views
   │  │     ├─ list.php
   │  │     └─ single.php
   │  └─ View
   │     ├─ Cell.php
   │     ├─ Cells
   │     │  └─ Cell.php
   │     ├─ Exceptions
   │     │  └─ ViewException.php
   │     ├─ Filters.php
   │     ├─ Parser.php
   │     ├─ Plugins.php
   │     ├─ RendererInterface.php
   │     ├─ Table.php
   │     ├─ View.php
   │     ├─ ViewDecoratorInterface.php
   │     └─ ViewDecoratorTrait.php
   ├─ tests
   │  ├─ .htaccess
   │  ├─ app
   │  │  ├─ StudySessionModelTest.php
   │  │  ├─ ValidationRulesTest.php
   │  │  └─ WelcomePageTest.php
   │  ├─ database
   │  │  └─ ExampleDatabaseTest.php
   │  ├─ index.html
   │  ├─ README.md
   │  ├─ session
   │  │  └─ ExampleSessionTest.php
   │  ├─ unit
   │  │  └─ HealthTest.php
   │  └─ _support
   │     ├─ Database
   │     │  ├─ Migrations
   │     │  │  └─ 2020-02-22-222222_example_migration.php
   │     │  └─ Seeds
   │     │     └─ ExampleSeeder.php
   │     ├─ Libraries
   │     │  └─ ConfigReader.php
   │     └─ Models
   │        └─ ExampleModel.php
   └─ writable
      ├─ .htaccess
      ├─ cache
      │  ├─ 0b640468cc19a66d24dc10634dcf92b5
      │  ├─ 7b27c6033aab0eda2e493b1e345d97f2
      │  └─ index.html
      ├─ debugbar
      │  ├─ debugbar_1780233270.114540.json
      │  ├─ debugbar_1780233270.362942.json
      │  ├─ debugbar_1780233270.668501.json
      │  ├─ debugbar_1780233270.880918.json
      │  ├─ debugbar_1780233271.121619.json
      │  ├─ debugbar_1780233271.359994.json
      │  ├─ debugbar_1780233271.605789.json
      │  ├─ debugbar_1780233271.937318.json
      │  ├─ debugbar_1780233272.685450.json
      │  ├─ debugbar_1780233273.005875.json
      │  ├─ debugbar_1780233274.613659.json
      │  ├─ debugbar_1780233280.089627.json
      │  ├─ debugbar_1780233281.634402.json
      │  ├─ debugbar_1780233300.898437.json
      │  ├─ debugbar_1780233301.279699.json
      │  ├─ debugbar_1780233304.404044.json
      │  ├─ debugbar_1780233311.632744.json
      │  ├─ debugbar_1780233316.179811.json
      │  ├─ debugbar_1780234737.623808.json
      │  ├─ debugbar_1780234747.127374.json
      │  └─ index.html
      ├─ index.html
      ├─ logs
      │  ├─ email.log
      │  ├─ index.html
      │  ├─ log-2026-04-14.log
      │  ├─ log-2026-04-15.log
      │  ├─ log-2026-04-16.log
      │  └─ log-2026-05-31.log
      ├─ session
      │  ├─ ci_session031cab0431a267e92f43ee6f1d787991
      │  ├─ ci_session06bb3d56bd5e7f17b0d8a448d836aefb
      │  ├─ ci_session083a16aa7f27172386801c7c34e28cfa
      │  ├─ ci_session0f425c0ae47959605379003e77e5ace9
      │  ├─ ci_session18c25aabade438ca1f7f0a7c1a4cf302
      │  ├─ ci_session3bfd43ab81f714535887cc2436d4d116
      │  ├─ ci_session45d27c35d444e8e1b2ac531a000452ff
      │  ├─ ci_session4655420df184cda0cf3daed0d59d7492
      │  ├─ ci_session49a1dc63b5022b724f2386b97aa38696
      │  ├─ ci_session5529fdc3b43e5d0422ec8ecc407eccf5
      │  ├─ ci_session56e75f98ca47957fef66d7da5176483d
      │  ├─ ci_session5e6565f8f21695fffa31ec27177e19b1
      │  ├─ ci_session6699cbc348898b0fc5b8d233bf170db0
      │  ├─ ci_session74fc79a06373d9143b87af6e0357ecc2
      │  ├─ ci_session843f90da3077c908be1d80312b81bae5
      │  ├─ ci_session8651f81d77626e33c99d44c42d347c35
      │  ├─ ci_session8f6b9248740b0b16ed11fbcdd2df82a5
      │  ├─ ci_sessionbf4a31af97624dc8e9269eca3bffd68b
      │  ├─ ci_sessione746d3dac9cb0e7f8536cc2e71e835e5
      │  ├─ ci_sessione81b621949d3f4ef7865d726efbb8b7a
      │  ├─ ci_sessionea5eeae63968faea8821cdb4028cf136
      │  ├─ ci_sessionecf17e94603592ec6593558b7df16658
      │  ├─ ci_sessionef9787749b1df1509b4540125e2d461f
      │  ├─ ci_sessionefc50ef66224f73e557b126ff55489aa
      │  ├─ ci_sessionf34e2172e3dd23cf657875c5268ae358
      │  ├─ ci_sessionf422e7de31cc5649f9d3bb679b8b5705
      │  ├─ ci_sessionfdd2f53a4de9fd59009fd99aaee774a2
      │  └─ index.html
      └─ uploads
         ├─ 1780197868_e8be22f9afa8df44d5a7.jpg
         ├─ 1780233234_91d81e57a9dddf34e1f3.jpg
         └─ index.html

```