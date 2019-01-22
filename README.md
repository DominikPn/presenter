#Presenter
<h1>Model presenter for Laravel</h1> 

<p>Laravel model presenter with fluent decorator<p>

<h2>Example usage</h2>
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

