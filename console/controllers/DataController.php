<?php
declare(strict_types = 1);

namespace console\controllers;

use common\models\DataSearch;
use GuzzleHttp\Psr7\Request;
use yii\console\Controller;
use GuzzleHttp\Client;

/**
 * Class DataController
 * @package backend\commands
 */
class DataController extends Controller
{
    /**
     * @var string
     */
    private $url = 'http://api.ias.brdo.com.ua/v1_1/inspections?apiKey=360d858edaac8313a73d237f340138c097ab6304';

    /**
     * @var Client
     */
    private $client;

    /**
     * @var int
     */
    private $counter = 0;

    /**
     * {{@inheritDoc}}
     */
    public function init()
    {
        $this->client = new Client(['base_uri' => $this->url]);
        parent::init();
    }

    public function actionIndex()
    {
        foreach (json_decode($this->getResponseData()) as $key => $items) {
            if ($key === 'items') {
                $this->saveItems($items);
            }
        }
    }

    /**
     * @param $property
     * @param $items
     */
    private function sortBy($property, $items)
    {
        usort($items, function($itemOne, $itemTwo) use ($property) {
            return $itemOne->$property <=> $itemTwo->$property;
        });
    }

    /**
     * @return bool
     */
    private function checkCounter(): bool
    {
        if ($this->counter === 100) {
            return true;
        }

        return false;
    }

    /**
     * @param $items
     * @return bool|int
     */
    private function saveItems($items)
    {
        $this->sortBy('last_modify', $items);

        foreach ($items as $item) {
            if (!$this->checkCounter()) {
                $data = new DataSearch();
                $data->id = $item->id;
                $data->internal_id = $item->internal_id;
                $data->last_modify = $item->last_modify;
                $data->regulator = $item->regulator;
                $this->counter++;

                if (!$data->save()) {
                    return $this->stdout('Error!');
                }
            }
        }

        return $this->stdout('Success');
    }

    /**
     * @return Request
     */
    private function createRequest(): Request
    {
        return new Request('GET', $this->url);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function getResponseData()
    {
        return $this->client->send($this->createRequest())->getBody()->getContents();
    }
}
