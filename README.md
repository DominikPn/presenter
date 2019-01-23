<h1>Model presenter for Laravel</h1> 

<p>Laravel model presenter with fluent decorator<p>

<h2>Installation</h2>
Add the service provider to the providers array in `config/app.php`:

```php
    'providers' => [
        ...
        dominikpn\Presenter\ModelPresenterServiceProvider::class
    ];
```

<h2>Usage</h2>

a) Create presenter class

```php
    namespace App\Presenters;
    
    use dominikpn\Presenter\ModelPresenter;
    use App\User;
    
    class UserPresenter extends ModelPresenter
    {
        public function name():string{
            return strtoupper($this->model->name);    
        }
        
        protected function modelType():string {
            return User::class;
        }
    }
```

b) Attach presenter to model

```php
    namespace App;
    
    use Illuminate\Database\Eloquent\Model;
    use dominikpn\Presenter\Traits\Presentable;
    
    class User extends Model
    {
        use Presentable;
        
        protected $presenter = '\App\Presenters\UserPresenter';
    }
```  

 c) Now you can use your presenter
 
```php
    {{ $user->presentable()->name() }};
```  
<h2>Presenter decorator</h2>
  
  How to use presenter decorator:
  
```php
    $presenterDecorator = new \dominikpn\Presenter\Decorators\PresenterDecorator();
    $userPresenter = $user->presenter();
    $decoratedPresenter = $presenterDecorator->decorate($userPresenter)
                            ->whenCall('displayHello')->give('Hello World!')
                               ->whenGet('surname')->give(function (){
                                    return 'Kowalski';
                                })->get();
      
    echo $decoratedPresenter->displayHello(); //Print "Hello World!";
    echo $decoratedPresenter->surname; //Print "Kowalski";
```

<h2> Default presenter factory </h2>
<p>Update default presenter factory for single model</p>

```php
    namespace App;
    
    use Illuminate\Database\Eloquent\Model;
    use dominikpn\Presenter\Traits\Presentable;
    use dominikpn\Presenter\Factories\ModelPresenterFactory;
    
    class User extends Model
    {
        use Presentable;
        
        protected $presenter = '\App\Presenters\UserPresenter';
        
        protected function presenterFactory():ModelPresenterFactory
        {
            return new YOURFACTORY();
        }
    }
```

<p>Update default presenter factory for all models</p>

a) Publish config:
`php artisan vendor:publish --tag=config`

```php
    namespace App;
    
    class YourFactory implements dominikpn\Presenter\Factories\ModelPresenterFactory
    {
            public function create(string $class,$model, array $data = [])
            {
                return new SomeModelPresenter($model);
            }
    }
```

b) Modify defaultFactorty key value.

```php
    <?php
    return [
    'defaultFactory' => App\YourFactory::class
    ];
```
