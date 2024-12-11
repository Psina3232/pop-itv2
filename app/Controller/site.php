<?php

namespace Controller;

use Model\Post;
use Src\View;
use Src\Request;
use Src\Auth\Auth;
use Model\User;
use Model\Role;
// use Model\Department;
use Model\Employees;
use Model\Subunit;
use Src\Validator\Validator;

class Site
{
    public function index(Request $request): string
    {
       $posts = Post::where('id', $request->id)->get();
       return (new View())->render('site.post', ['posts' => $posts]);
    }
    
   public function hello(): string
   {
       return new View('site.hello', ['message' => 'hello working']);
   }
   
   public function signup(Request $request): string
    {
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'login' => ['required', 'unique:users,login'],
                'password' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);
     
            if($validator->fails()){
                return new View('site.signup',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
     
            if (User::create($request->all())) {
                app()->route->redirect('/login');
            }
        }
        return new View('site.signup');
     
        $roles = role::all();
        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/hello');
        }

        return new View('site.signup', ['roles' => $roles]);
    }

    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/hello');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }

    public function employees(Request $request): string
    {
        if ($request->method === 'POST') {
            $properties = [
                "login" => $request->all()["login"],
                "password" => password_hash($request->all()["password"], PASSWORD_BCRYPT), // Хэшируем пароль
                "role" => 2
            ];
    
            try {
                // Попытка создать пользователя
                if (User::create($properties)) {
                    app()->route->redirect('/employees');
                }
            } catch (\Illuminate\Database\QueryException $e) {
                if ($e->getCode() === '23000') {
                    $errorMessage = 'Такой логин уже существует. Пожалуйста, выберите другой.';
                } else {
                    throw $e;
                }
            }
        }
    
        $users = User::all();
        $roles = Role::all();
        $subunits = Subunit::all();
    
        return new View('site.employees', [
            'subunits' => $subunits,
            'users' => $users,
            'roles' => $roles,
            'errorMessage' => $errorMessage ?? null, 
        ]);
    }
    

    public function emp(Request $request): string
    {
        if($request->method === 'POST'){
            $empData = $request->all();
            
            $dateOfBirth = $empData['Date_of_Birth'];
            $birthDate = new \DateTime($dateOfBirth);
            $currentDate = new \DateTime();
            $age = $currentDate->diff($birthDate)->y;

            $empData['Age'] = $age;
            if (Employees::create($empData)) {
                app()->route->redirect('/hello');
            }
        }
        
        $users = User::all();
        $roles = role::all();
        $subunits = Subunit::all();



        return new View('site.emp', [
            'subunits' => $subunits, 
            'users' => $users, 
            'roles' => $roles
        ]);
    }


    public function subunit(Request $request): string
    {
        $subunits = Subunit::all();
        if ($request->method === 'POST' && Subunit::create($request->all())) {
            app()->route->redirect('/hello');
        }

        return new View('site.subunit', ['subunits' => $subunits]);
    }

    public function calculate(Request $request): string
    {
        $subunits = Subunit::all();

        function __calculateAge($employees){
            $srvozrast = 0;
            $i = 0;
            foreach ($employees as $employee) {
                $dateOfBirth = $employee->Date_of_Birth;
                $birthDate = new \DateTime($dateOfBirth);
                $currentDate = new \DateTime();
                $age = $currentDate->diff($birthDate)->y;
                $srvozrast += $age;
                $i += 1;
            }
            if($i === 0){
                return 0;
            }
            $srvozrast = $srvozrast / $i;
            return $srvozrast;
        }
        
        if($request->method === 'POST'){
            $filter = $request->all()['Subunit_ID'];
            if($filter){
                $allemps = Employees::where('Subunit_ID', $filter)->get();
            }
            else {
                $allemps = Employees::all();

            }
            $srvozrast = __calculateAge($allemps);

            return new View('site.calculate', ['message' => 'hello working', 'subunits' => $subunits , 'srvozrast' => $srvozrast]);
        }

        return new View('site.calculate', [
            'message' => 'hello working',
            'subunits' => $subunits,
            'srvozrast' => ''
        ]);
    }
    public function subunit_sel(Request $request): string
    {
        $subunits = Subunit::all();

        if (isset($request->all()["subdivision"])) {
            $employees = Employees::where("Subunit_ID", $request->all()["subdivision"])->get();

            return new View('site.subunit_sel', [
                'message' => 'hello working',
                "subdivisions" => $subunits,
                "employees" => $employees
            ]);
        }

        return new View('site.subunit_sel', [
            'message' => 'hello working',
            "subdivisions" => $subunits,
        ]);
    }

//     public function department(Request $request): string
// {
//     $departments = Department::all();
//     $errorMessage = null;

//     if ($request->method === 'POST') {
//         $name = $request->all()["name"];

//         if (Department::where('name', $name)->exists()) {
//             $errorMessage = 'Отдел с таким названием уже существует.';
//         } else {
            
//             if (Department::create(['name' => $name])) {
//                 app()->route->redirect('/hello');
//             }
//         }
//     }

//     return new View('site.department', [
//         'departments' => $departments,
//         'errorMessage' => $errorMessage,
//     ]);
// }


}