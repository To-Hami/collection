<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return "write route of colliction function like /combine ";
});
/****************************************** Collections ***********************************/


Route::get('/collection', function () {

   $array = [1,2,3,4,5];

   $collection = collect($array)->all();

   return $collection;
});

/****************************************** combine ***********************************/


Route::get('/combine', function () {
 // كيف تلحق او تضيف او تسند  داتا او فاليو علي الكي بتاعت الاري
    $array = ['name','age','gender'];

    $collection = collect($array)->combine(['Tohami' , '28' , 'male']);

    return $collection;

    /*
     * return
     * {
        "name": "Tohami",
        "age": "28",
        "gender": "male"
        }
     */
});


/****************************************** contains ***********************************/


Route::get('/contains', function () {
//   بترجع واحد او زيرو  //بتحفحص الكوليكشن هل القيمة دي موجودة فيهو ولا
    $array = ['name' => 'tohami','age' => 28,'gender' => 'male'];

//    $collection = collect($array)->contains('tohami');

    $collection = collect($array)->contains(function($value ,$key){
        dd($value == 'tohami');
    });

//    dd($collection) ;

    /*
     * return 1 true
     * string(6) "tohami" int(28) string(4) "male"
     * true
     */
});


/****************************************** count ***********************************/


Route::get('/count', function () {

    // بتعد عدد العناصر
    $array = ['name' ,'ali' ,'mosa'];

    $collection = collect($array)->count();

    dd($collection) ;

    /*
     * return 3

     */
});

/****************************************** diff ***********************************/


Route::get('/diff', function () {

    // بتعمل مقارة بين 2 ارري وتجيب ليك اختلاف الاولي عن التانية
    $array1 = ['ahmed' ,'ali' ,'mosa'];
    $array2 = ['ahmed' ,'ali' ,'sami'];

    $collection = collect($array1)->diff($array2);


    dd($collection) ;

    /*
     * return  2 => "mosa"

     */
});


/****************************************** diffKeys ***********************************/


Route::get('/diffKeys', function () {

    // بتعمل مقارة بين 2 ارري وتجيب ليك اختلاف الاولي عن التانية
    $array1 = ['name' =>'ahmed' ,'age' =>  22];
    $array2 = ['name' =>'ali'   ,'age' => 22];

    $collection = collect($array1)->diff($array2);


    dd($collection) ;

    /*
     * return
    "name" => "ahmed"
     */
});

/****************************************** each ***********************************/


Route::get('/each', function () {

   //بتعمل لووب علي كل عناصر الاري وبتباصيهم ليك كي وفاليو
    $array = [1 , 3 , 5 ,7];
    $collection = collect($array)->each(function($value , $key){
       if($value == 7){
           return false;
       };
        var_dump($value * 2);
    });

    /*
     * return  2 6 10
     */
});

/****************************************** every ***********************************/


Route::get('/every', function () {

    //بتعمل لووب علي كل عناصر الاري ولابد كلهم كلهم  يحققو الشرط حتي ترجع true
    $array = [1 , 3 , 5 ,7];
    $collection = collect($array)->every(function($value , $key){
        return $value < 7;
    });
    dd($collection);

    /*
     * return  false
     */
});

/****************************************** filter ***********************************/
Route::get('/filter', function () {
    //بتعمل لووب علي كل عناصر الاري وبيرجع ليك العناصر اللي حققت الشرط بس
    $array = [1 , 3 , 5 ,7];
    $collection = collect($array)->filter(function($value , $key){
        return $value < 5;
    });
    dd($collection);

    /*
     * return
     *   0 => 1
         1 => 3
     */
});

/****************************************** except ***********************************/
Route::get('/except', function () {
    //بتعمل لووب علي كل عناصر الاري وبيرجع ليك العناصر كلها ماعدي اللي  استثناء بتاعك
    $array = ['one' => 1 ,'tow' => 3 ,'three' => 5 ,'four' =>7];
    $collection = collect($array)->except('three');
    dd($collection);

    /*
     * return
     *
           "one" => 1
            "tow" => 3
            "four" => 7
     */
});


/****************************************** only ***********************************/
Route::get('/only', function () {
    //بتعمل لووب علي كل عناصر الاري وبيرجع ليك العنصر اللي انت حدتوو بس
    $array = ['one' => 1 ,'tow' => 3 ,'three' => 5 ,'four' =>7];
    $collection = collect($array)->only('three');
    dd($collection);

    /*
     * return
     *
            "three" => 5
     */
});

/****************************************** flatmap ***********************************/
Route::get('/flatmap', function () {
    //بتعمل لووب علي كل عناصر الاري وبيرجع ليك الفاليو بس
    $array = ['one' => 1 ,'tow' => 3 ,'three' => 5 ,'four' =>7];
    $collection = collect($array)->flatMap(function ($value){
      var_dump($value * 3);
    });
  dd($collection);

    /*
     * return
     *
           int(3) int(9) int(15) int(21)
     */
});

/****************************************** flatten ***********************************/
Route::get('/flatten', function () {
 //بتعمل  الاري متعددة الليفل في ليفل ,وممكن تحدد العمق
    $array = [
        'one' => 1 ,
        'tow' => 3 ,
        'three' => [
            'there_one' => 31 ,
            'threetow' => 32 ,
            'three three' => [
                'trhee trhee one ' => 331,
                'trhee trhee tow ' => 332,
            ]
        ] ,
    ];
    $collection = collect($array)->flatten();
    dd($collection);

    /*
     * return
     *
     0 => 1
     1 => 3
     2 => 31
     3 => 32
     4 => 331
     5 => 332

     */
});

/****************************************** flip ***********************************/
Route::get('/flip', function () {
//بتعكس الاري الكي ببقا فاليو  و الفاليو كي
    $array = [
        'one' => 1 ,
        'tow' => 2 ,
        'three' =>3
    ];
    $collection = collect($array)->flip();
    dd($collection);

    /*
     * return

    1 => "one"
    2 => "tow"
    3 => "three"

     */
});

/****************************************** forget ***********************************/
Route::get('/forget', function () {
//بيتجاهل عنص معين بناء علي الانديكس بتاعوو من الاري
    $array = [
        'one' => 1 ,
        'tow' => 2 ,
        'three' =>3
    ];
    $collection = collect($array)->forget('one');
    dd($collection);

    /*
     * return

       "tow" => 2
       "three" => 3

     */
});


/****************************************** forPage ***********************************/
Route::get('/forPage', function () {
//بيجيب ليك العناصر ابتداء من ما بعد الانديكس الانت حددتوو بجيب عدد العناصر الانت حددتها
    $array = [
        'one' => 1 ,
        'tow' => 2 ,
        'four' =>3 ,
        'fife' =>4 ,
        'sex' =>5,
        'seven' =>6 ,
        'eight' =>7 ,
        'ninth' =>8 ,
    ];
    $collection = collect($array)->forPage(2 , 3 );
    dd($collection);

    /*
     * return

        "fife" => 4
        "sex" => 5
        "seven" => 6

     */
});


/****************************************** groupBy ***********************************/
Route::get('/groupBy', function () {
//بترجع ليك علي حسب الشرط وبتقسم الاري الكبيرة ل اريهاات صعيرة كل قرووب متشابهه لحالو
    $array = [
        [
            'name' => 'ahmed',
            'age' => 20
        ], [
            'name' => 'ali',
            'age' => 20
        ], [
            'name' => 'ahmed',
            'age' => 22
        ], [
            'name' => 'ali',
            'age' => 22
        ], [
            'name' => 'sami',
            'age' => 23
        ], [
            'name' => 'naeem',
            'age' => 23
        ],

    ];
    $collection = collect($array)->groupBy('age' );
    dd($collection);

/*
 *    20 => Illuminate\Support\Collection {#1303 ▶}
     22 => Illuminate\Support\Collection {#1304 ▶}
     23 => Illuminate\Support\Collection {#1305 ▶}
 */


});

/****************************************** has ***********************************/
Route::get('/has', function () {
    //بتشييك هل الكولييكشن فيهو الكي الانت زكرتو ولا لا
    $array = ['one' => 1 ,'tow' => 3 ,'three' => 5 ,'four' =>7];
    $collection = collect($array)->has('three');
    dd($collection);

    /*
     * return true
     */
});

/****************************************** implode ***********************************/
Route::get('/implode', function () {
//بتحول الاري ل استرينق
    $array = ['one' => 1 ,'tow' => 3 ,'three' => 5 ,'four' =>7];
    $collection = collect($array)->implode('=>');
    dd($collection);

    /*
     * return "1=>3=>5=>7"
     */
});

/****************************************** explode ***********************************/
Route::get('/explode', function () {
//بتحول الاري ل استرينق
    $array = 'one  => toe => three => foure' ;
    $collection = explode( '=>' ,$array);
    dd($collection);

    /*
     * return
     * array:4 [▼ // routes\web.php:397
          0 => "one  "
          1 => " toe "
          2 => " three "
          3 => " foure"
]
     */
});


/****************************************** intersect ***********************************/


Route::get('/intersect', function () {

    // بتعمل مقارة بين 2 ارري وتجيب ليك تشابهه الاولي مع التانية
    $array1 = ['ahmed' ,'ali' ,'mosa'];
    $array2 = ['ahmed' ,'ali' ,'sami'];

    $collection = collect($array1)->intersect($array2);


    dd($collection) ;

    /*
     * return
     0 => "ahmed"
    1 => "ali"

     */
});

/****************************************** isEmpty ***********************************/


Route::get('/isEmpty', function () {

    // بتعمل مقارة بين 2 ارري وتجيب ليك تشابهه الاولي مع التانية
    $array1 = [];

    $collection = collect($array1)->isEmpty();


    dd($collection) ;

    /*
     * return true
     */
});

/****************************************** max and min ***********************************/


Route::get('/max', function () {
//بترجع ليك اكبر قيمة عندك في الاري
    $array = [
           [
           'name' => 'ali',
           'salary' => 20,
           ],
        [
            'name' => 'sami',
            'salary' => 40,
        ],
        [
            'name' => 'ahmed',
            'salary' => 60,
        ],

    ];

    $collection = collect($array)->max('salary');

    return $collection;

    /*
     * return 60
     */

});

/****************************************** merge ***********************************/


Route::get('/merge', function () {

    //ال ميرج بتستبدل في عملية الدمح الفاليو بتاع الكي القديم وبتخت محلو الفاليو الجديد في الاسوشييت ارري

//    $array1 = [
//        'name'=>'ali',
//        'age'=>20
//    ];
//
//    $collection = collect($array1)->merge(['name'=>'same']);
//
//
//    dd($collection) ;

    /*
     * return
     *   "name" => "same"
          "age" => 20
     */

    $array3 = [1,2,3,4,5];
    $collection = collect($array3)->merge([6,7,8,9,10]);

    dd($collection) ;
    /*
    0 => 1
    1 => 2
    2 => 3
    3 => 4
    4 => 5
    5 => 6
    6 => 7
    7 => 8
    8 => 9
    9 => 10
     */

});

/****************************************** map ***********************************/


Route::get('/map', function () {
//بتعمل المااب لووب علي الاري

    $array1 = [1,2,3,4,5];

    $collection = collect($array1)->map(function ($value , $key){
       return ($value  * 2);
    });


    dd($collection) ;

    /*
    0 => 2
    1 => 4
    2 => 6
    3 => 8
    4 => 10
     * return true
     */
});

/****************************************** pull ***********************************/


Route::get('/pull', function () {

//ال pull بحذف العنصر من الكوليكشن بناء علي الانديكس بتاعوو
    $array = [1 => 'name',2 => 'age', 3 =>'gender'];

    $collection = collect($array);
    $collection->pull(2);

    dd( $collection->all()) ;
    /*
       1 => "name"
       3 => "gender"

      */
});


/****************************************** pop ***********************************/


Route::get('/pop', function () {

//ال pull بحذف العنصر من الكوليكشن بناء علي الانديكس بتاعوو
    $array = [1 => 'name',2 => 'age', 3 =>'gender'];

    $collection = collect($array);
    $collection->pop();

    dd( $collection->all()) ;
    /*
        1 => "name"
        2 => "age"

      */
});

/****************************************** push ***********************************/


Route::get('/push', function () {

//ال push بيضيف عنصر في اخر الكوليكشن
//
    $array = [1 => 'name',2 => 'age', 3 =>'gender'];

    $collection = collect($array);
    $collection->push('sami');

    dd( $collection) ;
    /*
          1 => "name"
          2 => "age"
          3 => "gender"
          4 => "sami"

      */
});



/****************************************** put ***********************************/


Route::get('/put', function () {

//ال push بيضيف عنصر في  الكوليكشن انت بتحدد الموقع وين عن طريق الكي
//
    $array = [1 => 'name',2 => 'age', 3 =>'gender'];

    $collection = collect($array);
    $collection->put('2', 'ali');


    dd( $collection) ;
    /*
          1 => "name"
          2 => "ali"
          3 => "gender"
      */

});



/****************************************** random ***********************************/


Route::get('/random', function () {

//ال راندوم بطلع ليك قيمة عشوائية او عدة قيم من الكوليكشن //
    $array = [1,2 , 3 ,5 ,6 ,8 ];

    $collection = collect($array);
    $collection->random(2);


    dd( $collection->random()) ;
    /*
              0 => 2
              1 => 3
      */

});

/****************************************** reject ***********************************/


Route::get('/reject', function () {

    // ال reject بترفض ليك القيم الحققت الشرط وبتجيب التانية

    $array = [1,2,3,5,6,8,10];

    $collection = collect($array);
   $final  = $collection->reject(function ($value ,$key){
        return $value < 5;
    });

   dd( $final);


    /*
              0 => 2
              1 => 3
      */

});

/****************************************** shuffle  ***********************************/
Route::get('/shuffle', function () {
    // ال شفيل يرتب الكلكشين كل مرة بصورة عشوائية
    $array = [1, 2, 3, 5, 2, 7, 9, 3];
    $collection = Collect($array);
    dd($collection->shuffle());

});

/****************************************** sort  ***********************************/
Route::get('/sort', function () {
    // ال sort يرتب الكلكشين ترتيب تصاااعدي ة
    $array = [1, 2, 8, 5, 3, 7, 9, 4];
    $collection = Collect($array);
    dd($collection->sort());

});

/****************************************** sortBy  ***********************************/
Route::get('/sortBy', function () {
    // ال sortBy يرتب الكلكشين ترتيب تصاااعدي
    $array = [
        [
          'name' =>'ali' ,
          'age' => 20
        ],
        [
            'name' =>'mohamed' ,
            'age' => 30
        ],
        [
            'name' =>'sami' ,
            'age' => 40
        ],
    ];
    $collection = Collect($array);
    dd($collection->sortBy('age'));

});


/****************************************** sortByDesc  ***********************************/
Route::get('/sortByDesc', function () {
    // ال sortBy يرتب الكلكشين ترتيب تنازلي
    $array = [
        [
            'name' =>'ali' ,
            'age' => 20
        ],
        [
            'name' =>'mohamed' ,
            'age' => 30
        ],
        [
            'name' =>'sami' ,
            'age' => 40
        ],
    ];
    $collection = Collect($array);
    dd($collection->sortByDesc('age')->take(2));

});

/********************* sum *********************/

Route::get('/sum', function () {
    // ال sum تجمع الاعداد اللي داخل  الكلكشين
    $array = [
       1,2,3,2,3,5,4,6,8,5,6,5,10
    ];
    $collection = Collect($array);
    dd($collection->sum());

});


/********************* Partition *********************/

Route::get('/Partition', function () {
    // ال Partition    تقسم  الكلكشين الي مصفوفتين واحة محققة للشرط والتانية لا
    $array = [
        1,2,3,2,3,5,4,6,8,5,6,5,10
    ];
    $collection = Collect($array);
    dd($collection->Partition(function ($value){
        return $value > 5 ;
    }));

});


/********************* prepend *********************/

Route::get('/prepend', function () {
    // ال prepend    بتضيف قيمة في اول   الكلكشينانا
    $array = [
        1,2,3,2,3,5,4,6,8,5,6,5,10
    ];
    $collection = Collect($array);
    dd($collection->prepend(0));

});


/********************* pluck *********************/

Route::get('/pluck', function () {
    // ال pluck   بتلف علي كل الامصفوفاات اللي عندك وبتجيب ليك منها  كل قيم الكي الانت اخترتوو وتختهن في مصفووفة واحدة    لا
    $array = [
        [
            'name' => 'ali',
            'age' => 20
        ],

        [
            'name' => 'ahmed',
            'age' => 20
        ],

        [
            'name' => 'sami',
            'age' => 30
        ],

        [
            'name' => 'aymen',
            'age' => 20
        ],

        [
            'name' => 'rashid',
            'age' => 30
        ],
    ];
    $collection = Collect($array);
    dd($collection->pluck('age'));

});

/********************* toJson *********************/

Route::get('/toJson', function () {
    // ال toJson          تحول الكوليكشن ل جيسون فايل
    $array = [
        [
            'name' => 'ali',
            'age' => 20
        ],

        [
            'name' => 'ahmed',
            'age' => 20
        ],

        [
            'name' => 'sami',
            'age' => 30
        ],

        [
            'name' => 'aymen',
            'age' => 20
        ],

        [
            'name' => 'rashid',
            'age' => 30
        ],
    ];
    $collection = Collect($array);
    return $collection->toJson();

});

/********************* merge *********************/

Route::get('/merge', function () {
    // ال merge    بتضيف الكوليكشن الجديد للكوليكشن  القديم     وبتعدل الفاليوو علي حسب الكي الجديد يعني تعطي الاولوية للاري الجديد
    $array = [
        'name' =>'tohami',
        'age' => 20,
    ];
    $collection = Collect($array);
    dd($collection->merge([
        'name'    =>'ali',
        'website' => 'work.com'
    ]));

    /*

    Illuminate\Support\Collection {#1356 ▼ // routes\web.php:869
          #items: array:3 [▼
            "name" => "ali"
            "age" => 20
            "website" => "work.com"
          ]
      #escapeWhenCastingToString: false
    }
     */

});

/********************* union *********************/

Route::get('/union', function () {
    // ال merge    بتضيف الكوليكشن الجديد للكوليكشن  القديم   بدون ماتعدل علي القديم علي عكس merge
    $array = [
        'name' =>'tohami',
        'age' => 20,
    ];
    $collection = Collect($array);
    dd($collection->union([
        'name'    =>'ali',
        'website' => 'work.com'
    ]));

    /*

    Illuminate\Support\Collection {#1356 ▼ // routes\web.php:869
          #items: array:3 [▼
            "name" => "tohami"
            "age" => 20
             "website" => "work.com"
          ]
      #escapeWhenCastingToString: false
    }
     */

});

/************************* when  *************************************/
Route::get('/when', function () {
    //ال when  بتفحص شرط اول حاجة لو كان true  ممكن تنفذ فنشن تانية علي الكوليكشن اما لو false  بترجع الكوليكشن زي ماهو
        $array = [
            'name' =>'tohami',
            'age' => 20,
        ];

        $collection = Collect($array);

        dd($collection->when($collection['age'] == 20,function($collection){
            $collection->push(10);
        }));
        /*
         Illuminate\Support\Collection {#1379 ▼ // routes\web.php:927
              #items: array:3 [▼
                "name" => "tohami"
                "age" => 20
                0 => 10
              ]
         */

});


/************************* whereIn *************************************/
Route::get('/whereIn', function () {
    //ال whereIn  بتبحث لي داخل  الكوليكشن عن ارري يعني انت تبااصي ارري للكوليكشن اللي هي قيم ل كي معيين وهو يرجع ليك كل الاريي اللي الكي فيها بيسااوي احد القيم الانت باصيتهاا دي
    //whereNotIn هي العكس

    $array = [
        [
        'name' =>'tohami',
        'age' => 20,
         ],
        [
            'name' =>'ali',
            'age' => 30,
        ],
        [
            'name' =>'sami',
            'age' => 20,
        ],
        [
            'name' =>'ibrahim',
            'age' => 40,
        ],
    ];

    $collection = Collect($array);

    dd($collection->whereIn('age' ,[20,30]));


});



/************************* chunk *************************************/
Route::get('/chunk', function () {
    //ال chunk  البتقسم ليك الكوليكشن الواحد لمجموعه من الكوليكشن الصغيرة علي حسب العدد الانت بتحددو ي
    //whereNotIn هي العكس

    $array = [
        [
            'name' =>'tohami',
            'age' => 20,
        ],
        [
            'name' =>'ali',
            'age' => 30,
        ],
        [
            'name' =>'sami',
            'age' => 20,
        ],
        [
            'name' =>'ibrahim',
            'age' => 40,
        ],
        [
            'name' =>'ibrahim',
            'age' => 40,
        ],
        [
            'name' =>'ibrahim',
            'age' => 40,
        ],
        [
            'name' =>'ibrahim',
            'age' => 40,
        ],
        [
            'name' =>'ibrahim',
            'age' => 40,
        ],
        [
            'name' =>'ibrahim',
            'age' => 40,
        ],
    ];

    $collection = Collect($array);

    dd($collection->chunk(3));


});



/************************* collapse *************************************/
Route::get('/collapse', function () {
    //ال collapse علي عكس ال chunk لو الكوليكشن مقسم في دااخلوو لب مجمووعةة قرووباات للاريي يعني كل مجموعه ارري في قروووب لحاالو بخلييهن كلهن في قرووب وااحد
    //whereNotIn هي العكس

    $array = [
            [
                    [
                        'name' =>'tohami',
                        'age' => 20,
                    ],
                    [
                        'name' =>'ali',
                        'age' => 30,
                    ],
            ],
        [
            [
                'name' =>'tohami',
                'age' => 20,
            ],
            [
                'name' =>'ali',
                'age' => 30,
            ],
        ],
        [
            [
                'name' =>'tohami',
                'age' => 20,
            ],
            [
                'name' =>'ali',
                'age' => 30,
            ],
        ],
        [
            [
                'name' =>'tohami',
                'age' => 20,
            ],
            [
                'name' =>'ali',
                'age' => 30,
            ],
        ],
        [
            [
                'name' =>'tohami',
                'age' => 20,
            ],
            [
                'name' =>'ali',
                'age' => 30,
            ],
        ],

    ];

    $collection = Collect($array);

    dd($collection->collapse());


});










































/*********************************** End Collections **********************************/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
