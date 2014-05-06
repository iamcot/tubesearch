<?php

class HomeController extends BaseController
{

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */
    public $data = array();

    public function anyIndex()
    {
        return View::make(Config::get('home.theme') . '.start.start');
    }

    public function getSearch()
    {
        if (Input::has('s')) {
            $input = Input::get('s');
            $this->data['sSearch'] = $input;
            try {

                $youtube = new Youtube(array('key' => Config::get('home.apikey')));
                $params = array(
                    'q' => $input,
                    'type'=>'video',
                    'part' => 'id, snippet',
                    'maxResults' => Config::get('home.maxresult'),
                );
                if(Input::has('p') )
                    $params['pageToken'] = Input::get('p');
                $searchResponse = $youtube->searchAdvanced($params);
                $totalresult = $searchResponse->pageInfo->totalResults;
                $nextpage = "";
                $prevpage = "";
                if(isset($searchResponse->nextPageToken))
                    $nextpage = $searchResponse->nextPageToken;
                if(isset($searchResponse->prevPageToken))
                    $prevpage = $searchResponse->prevPageToken;
                $this->data['nextpage'] = $nextpage;
                $this->data['prevpage'] = $prevpage;
                $this->data['totalresult'] = $totalresult;
//                echo '<pre>';
//                var_dump($searchResponse);
                $result = array();

                foreach ($searchResponse->items as $searchResult) {
                    $result[] = $searchResult;
                }
                $this->data['aResult'] = $result;


            }
            catch (\Exception $e) {

            }
            return View::make(Config::get('home.theme') . '.result.result', $this->data);
        }
        else {
            return Redirect::to('/');
        }
    }

}