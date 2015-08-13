<?php

namespace App\Http\Controllers;

use App\_New;
use App\Article;
use App\Category;
use App\Services\Translit;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Validator;

class AjaxController extends Controller
{
    /**
     * Метод возвращает название банка и его идентификатор,
     * фильтруя по первым набранных символам
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBanksAutoCompleteArray(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'item' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return response()->json(['error' => true, $error]);
        }

        $term = $request->get('item');

        $query = \DB::table('banks')->select('title', 'id')->where('publish', '=', 1)->get();

        /**
         * дальше идут манипуляции с объектом ответа
         * для того, чтобы представить его
         * в нужном формате, возможно
         * можно сделать оптимальнее
         */
        foreach ($query as $q) {

            $tempArray[] = $q->title;

        }

        // Шаблон рег. выражения
        $pattern = '/'.preg_quote($term).'/iu';

        // ф-я возвращает массив совпадений
        $resultArrayBanks = preg_grep($pattern, $tempArray);

        $id = \DB::table('banks')->select('url')->where('publish', '=', 1)->whereIn('title', $resultArrayBanks)->get();


        $i = 0;
        foreach($resultArrayBanks as $resultArrayBank){

            $id[$i]->title = $resultArrayBank;
            $i++;
        }

        return \Response::json($id);

    }

    public function addArticle(Request $request){

    $validator = Validator::make($request->all(), [
        'editorArticle' => 'required|string|max:100000',
        'InputImage' => 'required|image|max:100000',
        'description' => 'required',
        'keywords' => 'required',
        'categoryId' => 'required|numeric',
        'publishTime' => 'required',
        'publish' => 'required|numeric',
        'title' => 'required|string|max:400',
        'SeeAlso' => 'required',
        'adsType' => 'required',
    ]);

    if($validator->fails())
    {
        $error = $validator->errors()->all();

        return response()->json(['error' => true, 'reason' => $error]);
    }

    if(count(json_decode($request->get('SeeAlso'))) != 3){
        return response()->json(['error' => true, 'reason' => 'Выбрано не 3 релевантных статьи']);
    }

    $title = $request->get('title');

    // изображение статьи
    $img = $request->file('InputImage');

    $adsType = $request->get('adsType');

    // транслит для урла
    $url = Translit::translit($title);

    // получение mime типа
    $mimeType = $img->getMimeType();

    $mimeTypeAvailable = [

        'image/png',
        'image/jpeg',
        'image/gif',

    ];

    // фича для получения расширения по mime types
    foreach ($mimeTypeAvailable as $v) {
        if($mimeType == $v){
            $imgName = $url . '.' . preg_replace("/.*\\/(.*)/ui", "\${1}", $v);
            break;
        }
    }
    // путь сохранения изображения
    $imgPath = '../resources/images/articles/article/' . $imgName;

    // сохраняем изображение
    Image::make($img)->resize(270, 190)->save($imgPath);

    // количество просмотров
    $views = mt_rand(100, 900);

    // пост-публикация
    $publishTime = $request->get('publishTime');

    // разбиваем массив
    $publishTimeArray = explode('-', $publishTime);

    // если не задан, то публикуем сейчас, иначе по заданному времени
    if($publishTime == 'false'){
        $publishTime = Carbon::now();
    }else{
        $publishTime = Carbon::create($publishTimeArray[0], $publishTimeArray[1], $publishTimeArray[2]);
    }

    // попытка добавить данные
    try{
        $query = Article::create([
            'text' => $request->get('editorArticle'),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'keywords' => $request->get('keywords'),
            'category_id' => $request->get('categoryId'),
            'pic_preview' => $imgName,
            'views' => $views,
            'url' => $url,
            'see_also' => $request->get('SeeAlso'),
            'published_at' => $publishTime,
            'publish' => $request->get('publish'),
            'widget_type' => $adsType,
        ]);

        return \Response::json($query);

        // если ошибка, ловим ее и возвращаем error
    } catch(\Exception $e){
        return response()->json(['error' => true, 'reason' => $e->getMessage() . ' строка ' . $e->getLine()]);
    }

}

    public function delArticle(Request $request){

        $id = $request->get('id');

        try{

            $delete = \DB::table('info')->delete($id);

        }catch(\Exception $e){

            return response()->json(['error' => true, 'reason' => $e->getMessage()]);

        }

    }

    public function editArticle(Request $request){

        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric',
            'editorArticle' => 'required|string|max:100000',
            'url' => 'required',
            //  'InputImage' => 'required|image|max:100000',
            'description' => 'required',
            'keywords' => 'required',
            'categoryId' => 'required|numeric',
            'publish' => 'required|numeric',
            'title' => 'required|string|max:400',
            'SeeAlso' => 'required',
            'adsType' => 'required',
        ]);

        if($validator->fails())
        {
            $error = $validator->errors()->all();

            return response()->json(['error' => true, 'reason' => $error]);
        }

        if(count(json_decode($request->get('SeeAlso'))) != 3){
            return response()->json(['error' => true, 'reason' => 'Выбрано не 3 релевантных статьи']);
        }

        $title = $request->get('title');

        $id = $request->get('id');

        $adsType = $request->get('adsType');

        // транслит для урла
        $url = $request->get('url');



        // количество просмотров
        $views = mt_rand(100, 900);

        // изображение статьи
        $img = $request->file('InputImage');

        // если не нужно обновлять изображение статьи
        if($img === null){

            // попытка добавить данные
            try{
                $query = Article::where('id', $id)->update([
                    'text' => $request->get('editorArticle'),
                    'title' => $request->get('title'),
                    'description' => $request->get('description'),
                    'keywords' => $request->get('keywords'),
                    'category_id' => $request->get('categoryId'),
                    'views' => $views,
                    'url' => $url,
                    'see_also' => $request->get('SeeAlso'),
                    'publish' => $request->get('publish'),
                    'widget_type' => $adsType,
                ]);

                return \Response::json(['url' => $url]);

                // если ошибка, ловим ее и возвращаем error
            } catch(\Exception $e){
                return response()->json(['error' => true, 'reason' => $e->getMessage() . ' строка ' . $e->getLine()]);
            }

        }else{

            // получение mime типа
            $mimeType = $img->getMimeType();

            $mimeTypeAvailable = [

                'image/png',
                'image/jpeg',
                'image/gif',

            ];

            // фича для получения расширения по mime types
            foreach ($mimeTypeAvailable as $v) {
                if($mimeType == $v){
                    $imgName = $url . '.' . preg_replace("/.*\\/(.*)/ui", "\${1}", $v);
                    break;
                }
            }
            // путь сохранения изображения
            $imgPath = '../resources/images/articles/article/' . $imgName;

            // если нужно изменить картинку, то изменяем, иначе нет

            // сохраняем изображение
            Image::make($img)->resize(270, 190)->save($imgPath);

            // попытка добавить данные
            try{
                $query = Article::where('id', $id)->update([
                    'text' => $request->get('editorArticle'),
                    'title' => $request->get('title'),
                    'description' => $request->get('description'),
                    'keywords' => $request->get('keywords'),
                    'category_id' => $request->get('categoryId'),
                    'pic_preview' => $imgName,
                    'views' => $views,
                    'url' => $url,
                    'see_also' => $request->get('SeeAlso'),
                    'publish' => $request->get('publish'),
                    'widget_type' => $adsType,
                ]);

                return \Response::json(['url' => $url]);

                // если ошибка, ловим ее и возвращаем error
            } catch(\Exception $e){
                return response()->json(['error' => true, 'reason' => $e->getMessage() . ' строка ' . $e->getLine()]);
            }

        }



    }


    public function addNew(Request $request){

        $validator = Validator::make($request->all(), [
            'editorArticle' => 'required|string|max:100000',
            'InputImage' => 'required|image|max:100000',
            'categoryId' => 'required|numeric',
            'publishTime' => 'required',
            'publish' => 'required|numeric',
            'title' => 'required|string|max:400',
            'SeeAlso' => 'required',
        ]);

        if($validator->fails())
        {
            $error = $validator->errors()->all();

            return response()->json(['error' => true, 'reason' => $error]);
        }

        if(count(json_decode($request->get('SeeAlso'))) != 3){
            return response()->json(['error' => true, 'reason' => 'Выбрано не 3 релевантных новости']);
        }

        $title = $request->get('title');

        // изображение статьи
        $img = $request->file('InputImage');

        // транслит для урла
        $url = Translit::translit($title);

        // получение mime типа
        $mimeType = $img->getMimeType();

        $mimeTypeAvailable = [

            'image/png',
            'image/jpeg',
            'image/gif',

        ];

        // фича для получения расширения по mime types
        foreach ($mimeTypeAvailable as $v) {
            if($mimeType == $v){
                $imgName = $url . '.' . preg_replace("/.*\\/(.*)/ui", "\${1}", $v);
                break;
            }
        }
        // путь сохранения изображения
        $imgPath = '../resources/images/news/new/' . $imgName;

        // сохраняем изображение
        Image::make($img)->resize(270, 190)->save($imgPath);

        // количество просмотров
        $views = mt_rand(100, 900);

        // пост-публикация
        $publishTime = $request->get('publishTime');

        // разбиваем массив
        $publishTimeArray = explode('-', $publishTime);

        // если не задан, то публикуем сейчас, иначе по заданному времени
        if($publishTime == 'false'){
            $publishTime = Carbon::now();
        }else{
            $publishTime = Carbon::create($publishTimeArray[0], $publishTimeArray[1], $publishTimeArray[2]);
        }

        // попытка добавить данные
        try{
            $query = _New::create([
                'text' => $request->get('editorArticle'),
                'title' => $request->get('title'),
                'category_id' => $request->get('categoryId'),
                'pic_preview' => $imgName,
                'views' => $views,
                'url' => $url,
                'see_also' => $request->get('SeeAlso'),
                'published_at' => $publishTime,
                'publish' => $request->get('publish'),
            ]);

            return \Response::json($query);

            // если ошибка, ловим ее и возвращаем error
        } catch(\Exception $e){
            return response()->json(['error' => true, 'reason' => $e->getMessage() . ' строка ' . $e->getLine()]);
        }

    }

    public function delNew(Request $request){

        $id = $request->get('id');

        try{

            $delete = \DB::table('news')->delete($id);

        }catch(\Exception $e){

            return response()->json(['error' => true, 'reason' => $e->getMessage()]);

        }

    }

    public function editNew(Request $request){

        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric',
            'editorArticle' => 'required|string|max:100000',
            'url' => 'required',
            //  'InputImage' => 'required|image|max:100000',
            'categoryId' => 'required|numeric',
            'publish' => 'required|numeric',
            'title' => 'required|string|max:400',
            'SeeAlso' => 'required',
        ]);

        if($validator->fails())
        {
            $error = $validator->errors()->all();

            return response()->json(['error' => true, 'reason' => $error]);
        }

        if(count(json_decode($request->get('SeeAlso'))) != 3){
            return response()->json(['error' => true, 'reason' => 'Выбрано не 3 релевантных новости']);
        }

        $title = $request->get('title');

        $id = $request->get('id');

        // транслит для урла
        $url = $request->get('url');



        // количество просмотров
        $views = mt_rand(100, 900);

        // изображение статьи
        $img = $request->file('InputImage');

        // если не нужно обновлять изображение статьи
        if($img === null){

            // попытка добавить данные
            try{
                $query = _New::where('id', $id)->update([
                    'text' => $request->get('editorArticle'),
                    'title' => $request->get('title'),
                    'category_id' => $request->get('categoryId'),
                    'views' => $views,
                    'url' => $url,
                    'see_also' => $request->get('SeeAlso'),
                    'publish' => $request->get('publish'),
                ]);

                return \Response::json(['url' => $url]);

                // если ошибка, ловим ее и возвращаем error
            } catch(\Exception $e){
                return response()->json(['error' => true, 'reason' => $e->getMessage() . ' строка ' . $e->getLine()]);
            }

        }else{

            // получение mime типа
            $mimeType = $img->getMimeType();

            $mimeTypeAvailable = [

                'image/png',
                'image/jpeg',
                'image/gif',

            ];

            // фича для получения расширения по mime types
            foreach ($mimeTypeAvailable as $v) {
                if($mimeType == $v){
                    $imgName = $url . '.' . preg_replace("/.*\\/(.*)/ui", "\${1}", $v);
                    break;
                }
            }
            // путь сохранения изображения
            $imgPath = '../resources/images/news/new/' . $imgName;

            // если нужно изменить картинку, то изменяем, иначе нет

            // сохраняем изображение
            Image::make($img)->resize(270, 190)->save($imgPath);

            // попытка добавить данные
            try{
                $query = _New::where('id', $id)->update([
                    'text' => $request->get('editorArticle'),
                    'title' => $request->get('title'),
                    'category_id' => $request->get('categoryId'),
                    'pic_preview' => $imgName,
                    'views' => $views,
                    'url' => $url,
                    'see_also' => $request->get('SeeAlso'),
                    'publish' => $request->get('publish'),
                ]);

                return \Response::json(['url' => $url]);

                // если ошибка, ловим ее и возвращаем error
            } catch(\Exception $e){
                return response()->json(['error' => true, 'reason' => $e->getMessage() . ' строка ' . $e->getLine()]);
            }

        }



    }

    public function addCategory(Request $request) {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'type' => 'required',
        ]);

        if($validator->fails())
        {
            $error = $validator->errors()->all();

            return response()->json(['error' => true, 'reason' => $error]);
        }

        // попытка добавить данные
        try{
            $query = Category::create([
                'title' => $request->get('title'),
                'type' => $request->get('type'),
            ]);

            return \Response::json($query);

            // если ошибка, ловим ее и возвращаем error
        } catch(\Exception $e){
            return response()->json(['error' => true, 'reason' => $e->getMessage() . ' строка ' . $e->getLine()]);
        }


    }
}
