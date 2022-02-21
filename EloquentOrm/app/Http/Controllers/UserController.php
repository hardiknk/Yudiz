<?php

namespace App\Http\Controllers;

use App\Models\Scopes\NotVerifiedUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //
    public function getUser()
    {
        // $flight = User::find(1);
        // dd($flight->get());
        // $freshFlight = $flight->fresh();
        // $freshFlight =  $flight->refresh();
        // dd($freshFlight);

        //retrive all data but it first fetch 5000 then fetch the another 5000
        // User::orderBy('id')->chunk(200, function ($users) {
        //     foreach ($users as $user) {
        //         echo $user->email . "<br>";
        //     }
        // });

        // User::orderBy('id')->chunkById(200, function ($users) {
        //     foreach ($users as $user) {
        //         echo $user->email . "<br>";
        //     }
        // });

        //using the lazy mehotd
        // User::orderBy('id')->lazyById(200, $column = 'id', function ($users) {
        //     foreach ($users as $user) {
        //         echo $user->email . "<br>";
        //     }
        // });

        //using the lazy method 
        // foreach (User::lazy() as $flight) {
        //     //
        //     echo $flight->email . "</br>";
        // }

        // User::chunk(200, function ($data) {
        //     foreach ($data as $flight) {
        //         echo $flight->name;
        //     }
        // });

        //using the cursor example 

        // foreach (User::cursor() as $flight) {
        //     echo $flight->email."<br>";
        // }

        //use of the first where 
        // $model = User::where('email', '=', 'belle75@example.com')->firstOr(function () {
        //     // ...
        //     echo "if no result in the where so this call the closure function";
        // });

        // $user_data = User::where('email', '=', 'belle75@exampsle.com')->first();
        // $user_data = User::where('email', '=', 'belle75@example.com')->firstOrFail();
        //here first() method the records is not fount then null return
        //firstOrFail method the records is not found then return the 404 not found 
        // dd($user_data);


        //
        // $user_data = User::findOrFail(666666);
        // //if not result found then find return null 
        // //findOrFail return the 404 not found 
        // // dd($user_data);



        //here first argument is checking the the records and if exists then return this records and if not exists then insert into the database
        // $user_created = User::firstOrCreate(
        //     ['name' => 'Cali Quitzon', "email" => "harddikk@yudiz.com"], //check the db 
        //     ['password' => 'hardik', 'email_verified_at' => '2022-02-18 06:58:48', 'remember_token' => 'hsYNGzsOKk']
        // );
        // echo "done";
        // dd($user_created);


        //aggrigate 
        // $user_data = User::count();
        // $user_data = User::max('email');
        // $user_data = User::min('id');
        // dd($user_data);

        //examine the attributes
        // $user = User::create([
        //     'name' => 'Taylor',
        //     'email' => 'Otwellsddd1',
        //     'password' => 'Developer',
        //     'email_verified_at' => 'Developer',
        //     'remember_token' => 'Developer',
        // ]);
        // $user->name = 'Taylor';
        // dd($user->isDirty()); // true if change name when user is created then true 
        // $user->isDirty('title'); // true
        // $user->isDirty('first_name'); // false
        // isClean(); this method is opposite of the isDirty() methoyd 
        //wasChanged() pending 
        // echo "done count";



        //getOriginal() take orignal name if change
        // $user = User::create([
        //     'name' => 'Taylor',
        //     'email' => 'Otwellsddd1',
        //     'password' => 'Developer',
        //     'email_verified_at' => 'Developer',
        //     'remember_token' => 'Developer',
        // ]);
        // $user->name = 'Tayloraachange';
        // dd($user->getOriginal('name'));



        //delete the records
        // $user = User::find(2);
        // $user->delete(); //here user id is 2 record is delete 

        // User::truncate();
        //here using the truncate all records of users data is deleted


        // destroy() method  passing the arguments like destroy(3) 
        // $user_data = User::find(3);
        // dd($user_data);
        // $user_data->destroy(3);



        //softdelete recordes 
        //so deleted_at column entry timestamp create
        // $user = User::find(4)->delete();
        //some method use with softdelete 
        // withTrashed(); all recoreds deleted+not_deleted
        // onlyTrashed();  only deleted records
        //restore(); //to restore the soft_delete data 
        //forceDelete(); //delete records from the database a

        // $user_data = User::onlyTrashed()->get();
        // dd($user_data);

        //here if we implent the softdelete so it genrate the query in the global scope 

        //after create NotVerifiedUser Scope 
        // $user_data = User::find(6);
        //like this query is exicustes 
        // select * from `users` where `users`.`id` = 6 and `users`.`deleted_at` is null and `email_verified_at` is not null limit 1
        // echo "user datea recireve";


        //remove the global scope 
        // User::withoutGlobalScope(NotVerifiedUser::class)->get();
        // echo "without global scope";



        //localscope use write in the model 
        // $user_data = User::IsEamilVerified()->get();
        // echo "local scope data is find ";




        //collection topic start 
        //Illuminate\Database\Eloquent\Collection
        // $user_data = User::get();
        // dd($user_data);




        // //================ collection all method start ============

        // // 1) all method 
        // $user_all_method = User::all(); //getting the 
        // dd($user_all_method);


        // // 2) average method 
        // $user_data = User::average('id'); //getting the 
        // dd($user_data);


        // // 3)  avg
        // $user_data = User::avg('id'); //getting the 
        // dd($user_data);


        // // 4)  chunk
        // $user_data = User::avg('id'); //getting the 
        // dd($user_data);
        // $collection = collect([1, 2, 3, 4, 5, 6, 7]);
        // $chunks = $collection->chunk(4);
        // dd($chunks->all());


        // // 5) chunkWhile
        // $collection = collect(str_split('AABBCCCD'));
        // $chunks = $collection->chunkWhile(function ($value, $key, $chunk) {
        //     // echo '<pre>'; print_r($value); exit; 
        //     return $value === $chunk->last();
        // });
        // return $chunks->all();

        // //6) collapse method  array into single flat array 
        // $collection = collect([ [1, 2, 3], [4, 5, 6], [7, 8, 9],]);
        // $collapsed = $collection->collapse();
        // $collapsed->all();

        // 7) collect 
        // $collectionA = collect([1, 2, 3]);
        // dd($collectionA); here Illuminate\Support\Collection
        // $collectionB = $collectionA->collect();
        // dd($collectionB->all()); //here only simple array 


        // // 8) combine 
        // $collection = collect(['name', 'age']);
        // $combined = $collection->combine(['George', 29]);
        // dd($combined->all()); //['name' => 'George', 'age' => 29]

        // 9) concat //combine the value 
        // $collection = collect(['John Doe']);
        // $concatenated = $collection->concat(['Jane Doe'])->concat(['name' => 'Johnny Doe']);
        // dd($concatenated->all()); //  ['John Doe', 'Jane Doe', 'Johnny Doe']

        // 10)contains() //check the value is exists or not 
        // $collection = collect(['name' => 'Desk', 'price' => 100]);
        // $collection->contains('Desk'); // true
        // $collection->contains('New York'); // false
        //also we use the key and pair also like 
        // $collection = collect([['name' => 'Desk', 'price' => 100], ['name' => 'hardik', 'price' => 100]]);
        // dd($collection->contains('name', 'Desk')); // TRUE if both key and value are same 
        // dd($collection->contains('name', 'desk')); // false Here Desk Is small desk so flase
        // dd($collection->contains('name', 'Desk')); // true 
        // dd($collection->contains('price','500')); // false


        // 11) containsStrict() //::pending 

        // 12) count()
        // $collection = collect([1, 2, 3, 4]);
        // dd($collection->count());

        // 13)CountBy() //here 2 is in three time so 2 => 3 //we can pass the function also
        // $collection = collect([1, 2, 2, 2, 4]);
        // $counted = $collection->countBy();
        // dd($counted->all()); 

        // 14)crossjoin //:::pending 


        // 15)dd  //dd()
        // $collection = collect(['John Doe', 'Jane Doe']);
        // $collection->dd();


        // 16)diff() //take the diffrent value frm the collection like here 1,3,5 note not take second arrray value 6,8
        // $collection = collect([1, 2, 3, 4, 5]);
        // $diff = $collection->diff([2, 4, 6, 8]);
        // dd($diff->all());

        // 17)diffAssoc() for diffrent value take from the collection associative array
        // $collection = collect([
        //     'color' => 'orange',
        //     'type' => 'fruit',
        //     'remain' => 6,
        // ]);
        // $diff = $collection->diffAssoc([
        //     'color' => 'yellow',
        //     'type' => 'fruit',
        //     'remain' => 3,
        //     'used' => 6,
        // ]);
        // dd($diff->all());

        // 18) diffkeys() //diffkeys same as first but key not found then return diffrent


        // 19)doesntContain() //here we are passing the arguments for the not contain the 
        // $collection = collect(['name' => 'Desk', 'price' => 100]);
        // $collection->doesntContain('Table'); // true
        // $collection->doesntContain('Desk'); // false

        //
        // $collection = collect([10, 20, 30, 40, 50]);
        // $collection->doesntContain(function ($value, $key) {
        //     // dd($value); //first 10
        //     echo '<pre>';
        //     print_r($value > 5);
        // });
        // exit;

        // 20) dump //not stop the exicution 
        // $collection = collect(['John Doe', 'Jane Doe']);
        // $collection->dump();
        // dd($collection);
        // dump($collection); //not stop the exicution and dd() stop the exicution
        // echo "hii hardik";//



        // 21)duplicates() if values are dumplicate then display
        // $collection = collect(['a', 'b', 'a', 'c', 'b']);
        // dd($collection->duplicates());


        // 22)each() //take the each records form the collectonin
        // $user = User::all();
        // $user->each(function ($item, $key) {
        //     if ($key == "50") {
        //         exit;
        //     }
        //     dump($item);
        // });


        // 23) eachSpread example ::pending 
        // $user = User::all();
        // $user->eachSpread(function ($item, $key) {
        //     if ($key == "50") {
        //         exit;
        //     }
        //     dump($item);
        // });


        // 24) every()  //:::pending 
        // collect([1, 2, 3, 4])->every(function ($value, $key) {
        //     dump($value > 4);
        // });


        // 25)except //not take the vlaue 
        // $collection = collect(['product_id' => 1, 'price' => 100, 'discount' => false]);
        // $filtered = $collection->except(['price', 'discount']);
        // dd($filtered->all()); // ['product_id' => 1]

        // 26) filter //this method 
        // $collection = collect([1, 2, 3, 4]);
        // $filtered = $collection->filter(function ($value, $key) {
        //     return $value > 2;
        // });
        // dd($filtered->all()); //return the value greater then two //so [3,4]


        // 26)first()  //takintg the first records also we use the closure function and conditon based
        // $user = User::first();
        // dd($user);


        // 27) firstWhere() // first+where conditon match
        // $user = User::firstWhere('id',7);
        // dd($user);

        // 28)flatmap //::pending multi dimention array to the single array convert 
        // $collection = collect([
        //     ['name' => 'Sally'],
        //     ['school' => 'Arkansas'],
        //     ['age' => 28]
        // ]);
        // $flattened = $collection->flatMap(function ($values) {
        //     return array_map('strtoupper', $values);
        // });
        // dd($flattened->all());

        // 29) flip swamp value to key 
        // $collection = collect(['name' => 'taylor', 'framework' => 'laravel']);
        // $flipped = $collection->flip();
        // dd($flipped->all()); // ['taylor' => 'name', 'laravel' => 'framework']


        // 30)forget() //remove item form the collection usign the keys 
        // $collection = collect(['name' => 'taylor', 'framework' => 'laravel']);
        // $collection->forget('name');
        // dd($collection->all()); // ['framework' => 'laravel']


        // 31) forpage method //
        // $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9,10,11]);
        // $chunk = $collection->forPage(4, 3); //first arg  page number second arg records display per page 
        // dd($chunk->all()); // [4,5,6]

        // 32)get()

        // 33)groupBy()


        // 34) has($key) ::find the value return true or false 
        // $collection = collect(['account_id' => 1, 'product' => 'Desk', 'amount' => 5]);
        // $collection->has('product'); //true 

        // 35) implode() //

        // $collection = collect([
        //     ['account_id' => 1, 'product' => 'Desk'],
        //     ['account_id' => 2, 'product' => 'Chair'],
        // ]);
        // dd($collection->implode('product', ', ')); // Desk, Chair


        // 36)intersect() //both array matched values are return 
        // $collection = collect(['Desk', 'Sofa', 'Chair']);
        // $intersect = $collection->intersect(['Desk', 'Chair', 'Bookcase']);
        // dd($intersect->all()); //[0 => 'Desk', 2 => 'Chair']


        // 37)intersectByKeys() //both array matched values take 
        // $collection = collect([
        //     'serial' => 'UX301', 'type' => 'screen', 'year' => 2009,
        // ]);
        // $intersect = $collection->intersectByKeys([
        //     'reference' => 'UX404', 'type' => 'tab', 'year' => 2011,
        // ]);
        // dd($intersect->all()); //take the first array keys values 


        // 38) isEmpty() 
        //39) isNotEmpty()

        // 40)join()

        // 41)  //keyBy ::pending 
        // 42) keys //return the keys from the collection
        // $collection = collect([
        //     'prod-100' => ['product_id' => 'prod-100', 'name' => 'Desk'],
        //     'prod-200' => ['product_id' => 'prod-200', 'name' => 'Chair'],
        // ]);
        // $keys = $collection->keys();
        // dd($keys->all()); 

        // 43)last() get the last element of the collectoin
        // dd(collect([1, 2, 3, 4])->last());


        // 44) macro //allow to run time method add //here toUpperCustom funcion add to collectoion
        // Collection::macro('toUpperCustom', function () {
        //     return $this->map(function ($value) {
        //         return Str::upper($value);
        //     });
        // });

        // $collection = collect(['first', 'second']);

        // $upper = $collection->toUpperCustom();
        // dd($upper);

        // 45)make() //use to create the new collection instance 
        // Validator::make();


        // 46) map() //each value loop and after it multiply the $item
        // $collection = collect([2, 4, 5, 6, 7, 8]);
        // $multification = $collection->map(function($item,$key){
        //     return $item*3;
        // });
        // dd($multification->all());


        // 47)mapinto() pending 


        // 48)mapSpread() //diffrent between mapSpread and map function
        // $collection = collect([0, 1, 2, 3, 4, 5, 6, 7, 8, 9]);
        // $chunks = $collection->chunk(2);
        // $sequence = $chunks->mapSpread(function ($even, $odd) {
        //     return $even + $odd;
        // });
        // dd($sequence->all());


        // 48) mapToGroups() //this is must be an associtive array 

        // $collection = collect([
        //     ['name' => 'John Doe', 'department' => 'Sales',],
        //     ['name' => 'Hardik', 'department' => 'Sales',],
        //     ['name' => 'Johnny Doe', 'department' => 'Marketing',]
        // ]);

        // $grouped = $collection->mapToGroups(function ($item, $key) {
        //     return [$item['department'] => $item['name']];
        // });

        // $grouped->all();
        // /*
        //     [
        //         'Sales' => ['John Doe', 'Jane Hardik'],
        //         'Marketing' => ['Johnny Doe'],
        //     ]
        // */
        // // dd($grouped->get('Sales')->all());
        // dd($grouped->get('Sales')->all());
        // // ['John Doe', 'Jane Doe']


        // 49) mapWithKeys() //this method match the keys in associative array 
        // $collection = collect([
        //     ['name' => 'John Doe', 'department' => 'Sales',],
        //     ['name' => 'Hardik', 'department' => 'Sales',],
        //     ['name' => 'akshay', 'department' => 'abc',],
        //     ['name' => 'Johnny Doe', 'department' => 'Marketing',]
        // ]);

        // $grouped = $collection->mapWithKeys(function ($item, $key) {
        //     return [$item['department'] => $item['name']];
        //     //here two times sales department but take last hardik name and departmenet
        // });

        // dd($grouped->all()); // ["Sales" => "Hardik" "Marketing" => "Johnny Doe"];



        // 50) max() //find the maximum value from the collection
        // dd(User::max('id'));

        // 51)median() take the middle array value ::pending
        // $median = collect([90, 40, 60, 30, 180]);
        // dd($median->median());


        //  //52)merge() //this function is used to merge the value and if key same so  last array price=>200 marge
        // $collection = collect(['product_id' => 1, 'price' => 100]);
        // $merged = $collection->merge(['price' => 200, 'discount' => false]);
        // dd($merged->all());


        // 53) mergeRecursive() //it merge the value into [value1,value2] if the key has found 
        // $collection = collect(['product_id' => 1, 'price' => 100]);
        // $merged = $collection->mergeRecursive([
        //     // 'product_id_a' => 2,
        //     'product_id' => 2,
        //     'price_a' => 200,
        //     'discount' => false
        // ]); //if key match then an then only create this merge othervise not merge and create with the single array

        // dd($merged->all()); // ['product_id' => [1, 2], 'price' => [100, 200], 'discount' => false]



        // // 54)min() //find them min value from the collection
        // dd(User::min('id')); //here min id user display
        // dd(User::min('name')); //here min id user display



        // 55)mode() most frequant value from the collection 
        // $mode = collect([1, 1, 2, 4])->mode(); //here 1 because 1 is two times 
        // dd($mode); //1 repeat two times so 1 

        // 56) nth() //
        // $collection = collect(['a', 'b', 'c', 'd', 'e', 'f']);
        // dd($collection->nth(4)); // [a,e] start with 0 and after e is 4 four 
        // dd($collection->nth(4,1)); // [b,f] nth(key,offset))


        //  57) only() take only this keys from array 
        // $collection = collect([
        //     'product_id' => 1,
        //     'name' => 'Desk',
        //     'price' => 100,
        //     'discount' => false
        // ]);
        // $filtered = $collection->only(['product_id', 'name']);
        // dd($filtered->all()); //// ['product_id' => 1, 'name' => 'Desk']


        // // 58) pad() this function add value if the records not in array 
        // $collection = collect(['A', 'B', 'C']);
        // $filtered = $collection->pad(10, 0);
        // dd($filtered->all());


        //  //59)partition() this method is used for the condtion false so return array conditon true so return araay 
        // $collection = collect([1, 2, 3, 4, 5, 6]);
        // [$underThree, $equalOrAboveThree] = $collection->partition(function ($i) {
        //     return $i < 3;
        // });
        // $underThree->all(); // [1, 2]
        // $equalOrAboveThree->all(); //[3,4,5,6]


        // // 60) pipeInto() :::pending 

        //  //61) pipeThrough() //one calling function exicuted after re exicute 

        $collection = collect([1, 2, 3]);

        $result = $collection->pipeThrough([
            //first time exicute then [1,2,3,4,5]
            function ($collection) {
                return $collection->merge([4, 5]);
            },

            //this collection exicute the second time 
            function ($collection) {
                return $collection->sum();
            },
        ]);

        // dd($result); //outlput 15 


        //  // 62) pluck() this method is pass the key and fetch the values and convert to the array
        // $collection = collect([
        //     ['product_id' => 'prod-100', 'name' => 'Desk'],
        //     ['product_id' => 'prod-200', 'name' => 'Chair'],
        // ]);
        // // $plucked = $collection->pluck('name');
        // $plucked = $collection->pluck('name', 'product_id'); //here passing the keys so it genrate the array keys ($value,$key)
        // dd($plucked->all());



        // // //63) pop() method remove the last item form the arr
        // $collection = collect([1, 2, 3, 4, 5]);
        // $collection->pop(); // 5 
        // $collection->all(); // [1, 2, 3, 4]

        //if passs pop(2) so last two remove and output is the [1,2,3]


        // // //64) prepend() add array in the first 
        // $collection = collect([1, 2, 3, 4, 5]);
        // $collection->prepend(6);
        // dd($collection->all()); // [6,1, 2, 3, 4, 5]
        //if associative arr so second arg is the keys
        // $collection = collect(['one' => 1, 'two' => 2]);
        // $collection->prepend(0, 'zero');
        // $collection->all();


        // // 65) pull() //this method is remove the array based on the kays
        // $collection = collect(['product_id' => 'prod-100', 'name' => 'Desk','name' => 'hardik']);
        // $collection->pull('name'); // 'Desk'
        // dd($collection->all());


        // // 66) push() apped the element form the last 
        // $collection = collect([1, 2, 3, 4]);
        // $collection->push(5);
        // dd($collection->all()); // [1, 2, 3, 4, 5]


        // 67) put() //array insert last of elemnt 
        // $collection = collect(['product_id' => 1, 'name' => 'Desk']);
        // $collection->put('price', 100);
        // dd($collection->all()); //['product_id' => 1, 'name' => 'Desk', 'price' => 100]


        // // 68)random()  //take the random value form the collection 
        // dd(User::get()->random());
        // dd(User::get()->random(2));


        // // // 69) range() given integer between and include the parameter 
        // $collection = collect()->range(3, 6);
        // dd($collection->all()); // [3,4,5,6] outuput aave 


        // //70)  reduce() //it genrate the collection into the signle value 
        // $collection = collect([1, 2, 3]);
        // $total = $collection->reduce(function ($carry, $item) {
        //     return $carry + $item;
        //     // echo '<pre>'; print_r($carry + $item);
        // });
        // dd($total); //6 

        // //71) reduceMany()  :::pending
        // 72)reduceSpread() :::penidng



        // // //73) reject 
        // $collection = collect([1, 2, 3, 4]);
        // $filtered = $collection->reject(function ($value, $key) {
        //     return $value > 2;
        // });
        // dd($filtered->all()); //condition true then not display 

        // // 74) replace() same as merge but replace and if not found then add into the array 
        // $collection = collect(['Taylor', 'Abigail', 'James']);
        // $replaced = $collection->replace([1 => 'Victoria', 3 => 'Test']);
        // dd($replaced->all());


        // // 75) replaceRecursive() 
        // $collection = collect(['Taylor', 'Abigail', ['James', 'Victoria', 'Finn']]);
        // $replaced = $collection->replaceRecursive([
        //     'Charlie', 2 => [1 => 'King']
        // ]);
        // dd($replaced->all()); //// ['Charlie', 'Abigail', ['James', 'King', 'Finn']]


        //  // 76) reverse() //reverse the array 
        // $collection = collect(['a', 'b', 'c', 'd', 'e']);
        // $reversed = $collection->reverse();
        // dd($reversed->all());


        // //77) search() //this function is return the keys 
        // $collection = collect([2, 4, 6, 8]);
        // $collection->search(4); //here 4 is the second position means key is 1 

        // $collection = $collection->search(function ($item, $key) {
        //     return $item > 6;
        // });
        // dd($collection); //output is 3 because here 8 is the 3 keys postion 


        //  // //78) shift() //remove the first item from the collection
        // $collection = collect([1, 2, 3, 4, 5]);
        // $collection->shift();
        // dd($collection->all()); //remove the 1 from the arr
        // $collection->shift(3); //output is the [4,5]


        // //79) shuffle() //randomly shuffles the items in the collection
        // $collection = collect([1, 2, 3, 4, 5]);
        // $shuffled = $collection->shuffle();
        // dd($shuffled->all());


        //  // 80) sliding() //
        // $collection = collect([1, 2, 3, 4, 5,6,7,8]);
        // // $chunks = $collection->sliding(2);
        // $chunks = $collection->sliding(3);
        // dd($chunks->toArray());


        //  //81)  skip() 
        // dd(User::get()->skip(4)->take(10));


        // 82) skipuntil() //skip the records until contition is true 
        // $user_data =  User::get()->skipUntil(function ($item) {
        //     return $item->id > 100;
        // })->take(10);
        // dd($user_data);


        // // 83)skipWhile() this methods return skip the conditon if the true 
        // $user_data =  User::get()->skipWhile(function ($item) {
        //     return $item->id > 12; //means when 12 found then it not display the records 
        // })->take(10);
        // dd($user_data);


        // // 84) slice($key, $limit = opt ) //start it form the 4 th key 
        // $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        // $slice = $collection->slice(4);
        // $slice = $collection->slice(4,2);
        // dd($slice->all()); // [5, 6, 7, 8, 9, 10] // if pass 2 second arg so [5,6] only return 


        // //86) sole() mehtod  if value match then retun the value from arr and not match ItemNotFoundException
        // $collect_method  =  collect([1, 2, 3, 4])->sole(function ($value, $key) {
        //     return $value === 3;
        // });
        // dd($collect_method);

        //
        // $collection = collect([
        //     ['product' => 'Desk', 'price' => 200],
        //     ['product' => 'Chair', 'price' => 100],
        //     // ['product' => 'Chair', 'price' => 6000],
        // ]);
        // dd($collection->sole('product', 'Chair')); //ek karta vadhare match thata records male to MultipleItemsFoundException exception aave //output ['product' => 'Chair', 'price' => 100]

        // $collection = collect([
        //     ['product' => 'Desk', 'price' => 200],
        //     // ['productOne' => 'Hardik', 'priceOne' => 200],
        //     // ['productTwo' => 'akshay', 'priceTwo' => 200],
        // ]);
        // dd($collection->sole()); //return only one array as first if multiple then error 


        // // 87)sort() method 
        // $collection = collect([5, 3, 1, 2, 4]);
        // $sorted = $collection->sort();
        // dd($sorted->values()->all());


        // //89) sortBy()
        // $collection = collect([
        //     ['name' => 'Taylor Otwell', 'age' => 34],
        //     ['name' => 'Abigail Otwell', 'age' => 30],
        //     ['name' => 'Taylor Otwell', 'age' => 36],
        //     ['name' => 'Abigail Otwell', 'age' => 32],
        // ]);
        // $sorted = $collection->sortBy([
        //     ['name', 'asc'],
        //     ['age', 'desc'],
        // ]);
        // dd($sorted->values()->all());


        // // 89) sortByDesc() same as sortBy but inverse 

        // // 90) sortDesc() not use the closure simple desc order to the column
        // $collection = collect([5, 3, 1, 2, 4]);
        // $sorted = $collection->sortDesc();
        // dd($sorted->values()->all());

        // // 91) sortKeys() associative array 
        // $collection = collect([
        //     'id' => 22345,
        //     'first' => 'John',
        //     'last' => 'Doe',
        // ]);
        // $sorted = $collection->sortKeys();
        // dd($sorted->all()); // [ 'first' => 'John', 'id' => 22345, 'last' => 'Doe',];


        // // 92)sortKeysDesc() // same as sortKeys but reverse order 


        // // 93) sortKeysUsing() :::pending 


        // //94) splice means bhag padva + kadhi nakhvu particular part j array no rakhvano 
        // $collection = collect([1, 2, 3, 4, 5]);
        // $chunk = $collection->splice(2);
        // dd($chunk->all()); // [3,4,5]
        // dd($collection->all()); // [1,2]
        // splice(start,limit,replace );

        // //95) split() //sarkha bhag padva badha na 
        // $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]);
        // $groups = $collection->splitIn(3); //here keys are increment every time  not start again 0 
        // // $groups = $collection->split(3); //here keys is start evry time 0 when new group is call
        // dd($groups->all());  //  [[1, 2], [3, 4], [5]]


        // 96) splitIn() group always become three and devide according 
        // $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]);
        // $groups = $collection->splitIn(3);
        // dd($groups->all());


        // // 97) sum()
        // dd(User::sum('id'));

        // //98) take() //this method take the first array vlaue like take(3) so only three value take from arr
        // dd(User::take(3)->get());


        //// 99)takeUntil() same as take but jya sudhi condition sachi pade tya sudhi closor funcdtion ma levanu 

        // // 100) jya sudhi condtion khoti pade tya sudhi le 
        // $collection = collect([1, 2, 2, 3, 4, 5]);
        // $subset = $collection->takeWhile(function ($item) {
        //     return $item < 3;
        // });
        // dd($subset->all()); // [1,2,2]



        // //101) times() //taking the 20 times records in the repeat 
        // $collection = Collection::times(20, function ($number) {
        //     return $number * 9;
        // });
        // dd($collection->all());
        // [9, 18, 27, 36, 45, 54, 63, 72, 81, 90]


        // // 102) toArray() //collection convert to the toArray() method 
        // $collection = collect(['name' => 'Desk', 'price' => 200]);
        // dd($collection->toArray());


        // // 103) toJson()
        // $collection = User::take(10)->get();
        // dd($collection->toJson());
        //convert collection to the json format 


        //  //104) transform() //badha element ma jay and multificatio kare 
        // $collection = collect([1, 2, 3, 4, 5]);
        // // $data =  $collection->map(function ($item, $key) { //map is not replace the value old collection value is same 
        // $collection->transform(function ($item, $key) { //in transform replace the value original value and create a new instance 
        //     return $item * 2;
        // });
        // dd($collection);



        // // 105) undot()  signle dimention to mlutli dimention using the keys 
        // $person = collect([
        //     'name.first_name' => 'Marie',
        //     'name.last_name' => 'Valentine',
        //     'address.line_1' => '2992 Eagle Drive',
        //     'address.line_2' => '',
        //     'address.suburb' => 'Detroit',
        //     'address.state' => 'MI',
        //     'address.postcode' => '48219'
        // ]);
        // $person = $person->undot();
        // dd($person->toArray());
        //here out put is 
        //         [
        //   "name" => array:2 [
        //     "first_name" => "Marie"
        //     "last_name" => "Valentine"
        //   ]
        //   "address" => array:5 [
        //     "line_1" => "2992 Eagle Drive"
        //     "line_2" => ""
        //     "suburb" => "Detroit"
        //     "state" => "MI"
        //     "postcode" => "48219"
        //   ]
        // ]




        // 106) union() //array ne add kare pan jo key already hoy to pela pela array ni keys le 
        // $collection = collect([1 => ['a'], 2 => ['b']]);
        // $union = $collection->union([3 => ['c'], 1 => ['d']]);
        // dd($union->all());



        // // 107) unique() take only unique records 
        //jo multidimention ma keys union('brand') laki hoy and tema duplicate thata hoy to pelo records le 
        // $collection = collect([1, 1, 2, 2, 3, 4, 2]);
        // $unique = $collection->unique();
        // dd($unique->values()->all());


        // // 108) uniqueStrict() only diffrence is the "strict" comparisons. 



        // // 109) unless() jo true karyu hoy to push nai thay 
        // $collection = collect([1, 2, 3]);

        // $collection->unless(false, function ($collection) { //unless flase then push last to array 4 
        //     return $collection->push(4);
        // });
        // dd($collection);


        // 110) unlessEmpty ==> whenNotEmpty()  alias

        // 111) unlessNotEmpty() ==>whenEmpty() alias


        // //112)  unwrap() :::penidng 


        // // 113) values()     //take the vlaues from the collection 
        // $collection = collect([
        //     10 => ['product' => 'Desk', 'price' => 200],
        //     11 => ['product' => 'Desk', 'price' => 200],
        // ]);
        // $values = $collection->values();
        //dd($values->all());

        //  //114) whenEmpty() //when the collection is empety then call otherwise not call
        // $collection = collect();
        // $collection->whenEmpty(function ($collection) {
        //     return $collection->push('Adam');
        // });
        // dd($collection->all());  //  ['Adam'] push to the collecition 


        // // 114) whenNotEmpty() //inverse of the whenEmpty() 



        // // 115) where() //already know 

        // 116) whereStrict() //only strict mode apply the condition like "200" === 200 return false 


        // // 117) whereBetween('price', [100, 200]);  //whereBetween('column',[first,second]) 
        // dd(User::whereBetween('id', [5, 30])->get());


        // 118) whereIn('column',[first,second]) //jyare male tyarej records display thay 
        // dd(User::whereIn('id', [6, 7, 8, 9, 10])->get()); //


        //119) whereInStrict() //strict mode accept only 


        //120 ) whereInstanceOf() :::pending 


        // 121) whereNotBetween('column',[first,second]) //same as WhereBetween() but here outside records display 


        // 122) whereNotIn() 


        // 123) whereNotInStrict() //only strict mode 

        // 124)whereNull('columna_name') //here only take the null records 
        // dd(User::whereNull('deleted_at')->take(10)->get());

        // 125) wrap ::: pending 


        // // 126) zip() // add the values and create one array 
        // $collection = collect(['Chair', 'Desk']);
        // $zipped = $collection->zip([100, 200, 300]);
        // dd($zipped->all()); //[['Chair', 100], ['Desk', 200],[null,300]]


        //  ========= colleciton end  ==========



        //
    }
}
